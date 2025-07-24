<?php

use App\Models\Category;

test('check if create category page works fine', function () {
    asUser()->get(route('categories.create'))
        ->assertStatus(200)
        ->assertViewIs('categories.create')
        ->assertSeeText('Name')
        ->assertSeeText('Description');
});


test('creating new category', function () {
    $category = Category::factory()->make();

    asUser()->post(route('categories.store', parameters: $category->toArray()))
        ->assertStatus(302)
        ->assertRedirect(route('categories.index'))
        ->assertSessionHas('success', 'Category created successfully');

    $this->assertDatabaseHas('categories', $category->toArray());
});


test('Check if name field is required when creating new category', function () {
    $category = [
        'description' => 'description',
    ];

    asUser()->post(route('categories.store', parameters: $category))
        ->assertStatus(302)
        ->assertSessionHasErrors('name');

    $this->assertDatabaseMissing('categories', $category);
});


test('Check if name field must be at least 3 characters long', function () {
    $category = [
        'name' => 'ab',
        'description' => 'description',
    ];

    asUser()->post(route('categories.store', parameters: $category))
        ->assertStatus(302)
        ->assertSessionHasErrors('name');

    $this->assertDatabaseMissing('categories', $category);
});


test('Check if name field must be at most 255 characters long', function () {
    $category = [
        'name' => str_repeat('a', 256),
        'description' => 'description',
    ];

    asUser()->post(route('categories.store', parameters: $category))
        ->assertStatus(302)
        ->assertSessionHasErrors('name');

    $this->assertDatabaseMissing('categories', $category);
});


test('Check if description field is optional', function () {
    $category = [
        'name' => 'name'
    ];

    asUser()->post(route('categories.store', parameters: $category))
        ->assertStatus(302)
        ->assertRedirect(route('categories.index'))
        ->assertSessionHas('success', 'Category created successfully');

    $this->assertDatabaseHas('categories', $category);
});


test('Check if description field must be at most 1000 characters long', function () {
    $category = [
        'name' => 'name',
        'description' => str_repeat('a', 1001),
    ];

    asUser()->post(route('categories.store', parameters: $category))
        ->assertStatus(302)
        ->assertSessionHasErrors('description');

    $this->assertDatabaseMissing('categories', $category);
});



// DATASETS
// dataset('invalid_categories', [
//     'name is required' => [
//         ['description' => 'description'],
//         'name'
//     ],
//     'name must be at least 3 characters long' => [
//         ['name' => 'ab', 'description' => 'description'],
//         'name'
//     ],
//     'name must be at most 255 characters long' => [
//         ['name' => str_repeat('a', 256), 'description' => 'description'],
//         'name'
//     ],
//     'description must be at most 1000 characters long' => [
//         ['name' => 'name', 'description' => str_repeat('a', 1001)],
//         'description'
//     ]
// ]);


test('Validate creating category points', function ($category, $error_key) {
    asUser()->post(route('categories.store', parameters: $category))
        ->assertStatus(302)
        ->assertSessionHasErrors($error_key);

    $this->assertDatabaseMissing('categories', $category);
})->with('invalid_categories')->only();
