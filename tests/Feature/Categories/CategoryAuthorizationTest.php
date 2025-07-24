<?php

use App\Models\Category;

test('guest user cannot access categories page', function () {
    $this->get(route('categories.index'))
        ->assertStatus(302)
        ->assertRedirect(route('login'));
});

test('guest user cannot access create categories page', function () {
    $this->get(route('categories.create'))
        ->assertStatus(302)
        ->assertRedirect(route('login'));
});

test('guest user cannot access show categories page', function () {
    $category = Category::factory()->create();
    
    $this->get(route('categories.show', $category))
        ->assertStatus(302)
        ->assertRedirect(route('login'));
});

test('guest user cannot access edit categories page', function () {
    $category = Category::factory()->create();
    
    $this->get(route('categories.edit', $category))
        ->assertStatus(302)
        ->assertRedirect(route('login'));
});


dataset('categories_routes', [
    'index page' => ['categories.index', false],
    'create page' => ['categories.create', false],
    'show page' => ['categories.show', true],
    'edit page' => ['categories.edit', true],
]);

test('guest user cannot access categories routes', function ($routeName, $parameter) {
    $parameter = $parameter ? Category::factory()->create() : null;
    
    $this->get(route($routeName, $parameter))
        ->assertStatus(302)
        ->assertRedirect(route('login'));

})->with('categories_routes');


test('guest user cannot create new category', function () {
    $category = Category::factory()->make();

    $this->post(route('categories.store',  $category->toArray()))
        ->assertStatus(302)
        ->assertRedirect(route('login'));
});


test('guest user cannot update category', function () {
    $category = Category::factory()->create();
    $updatedCategory = [
        'name' => 'updated name',
        'description' => 'updated description',
    ];

    $this->patch(route('categories.update', $category), $updatedCategory)
        ->assertStatus(302)
        ->assertRedirect(route('login'));
});


test('guest user cannot delete category', function () {
    $category = Category::factory()->create();

    $this->delete(route('categories.destroy',  $category))
        ->assertStatus(302)
        ->assertRedirect(route('login'));
})->only();