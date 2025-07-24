<?php

use App\Models\Category;

test('check if edit category page works fine', function () {
    $category = Category::factory()->create();

    asUser()->get(route('categories.edit', $category))
        ->assertStatus(200)
        ->assertViewIs('categories.edit')
        ->assertSee($category->name)
        ->assertSee($category->description);
});


test('updating category', function () {
    $category = Category::factory()->create();
    $updatedCategory = [
        'name' => 'updated name',
        'description' => 'updated description',
    ];

    asUser()->patch(route('categories.update', $category), $updatedCategory)
        ->assertStatus(302)
        ->assertRedirect(route('categories.index'))
        ->assertSessionHas('success', 'Category updated successfully');

    $this->assertDatabaseHas('categories', $updatedCategory);
});


test('Check if description field is optional', function () {
    $category = Category::factory()->create();
    $updatedCategory = [
        'name' => 'name'
    ];

    asUser()->patch(route('categories.update', $category), $updatedCategory)
        ->assertStatus(302)
        ->assertRedirect(route('categories.index'))
        ->assertSessionHas('success', 'Category updated successfully');

    $this->assertDatabaseHas('categories', $updatedCategory);
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


test('Validate creating category points', function ($updatedCategory, $error_key) {
    $category = Category::factory()->create();

    asUser()->patch(route('categories.update', $category), $updatedCategory)
        ->assertStatus(302)
        ->assertSessionHasErrors($error_key);

    $this->assertDatabaseMissing('categories', $updatedCategory);
})->with('invalid_categories')->only();