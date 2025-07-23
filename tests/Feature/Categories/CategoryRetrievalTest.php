<?php

use App\Models\User;
use App\Models\Category;

// beforeEach(function () {
//     $user = User::factory()->create();

//     $this->actingAs($user);
// });


test('Check if categories page works fine', function () {
    asUser()->get(route('categories.index'))
        ->assertStatus(200)
        ->assertViewIs('categories.index')
        ->assertSeeText('Categories');
});


test('Check if categories page contains categories data', function () {
    $categories = Category::factory()->count(5)->create();

    asUser()->get(route('categories.index'))
        ->assertStatus(200)
        ->assertSeeText('Categories')
        ->assertViewHas('categories', function ($categories) {
            return count($categories) === 5;
        });
});


test('Check if pagination works fime in categories page', function () {
    $categories = Category::factory()->count(15)->create();

    asUser()->get(route('categories.index'))
        ->assertStatus(200)
        ->assertSeeText('Categories')
        ->assertViewHas('categories', function ($categories) {
            return count($categories) === 10;
        });

    asUser()->get(route('categories.index', ['page' => 2]))
        ->assertStatus(200)
        ->assertSeeText('Categories')
        ->assertViewHas('categories', function ($categories) {
            return count($categories) === 5;
        });
});


test('Check if correct category details shows on show category page', function () {
    $category = Category::factory()->create();

    asUser()->get(route('categories.show', $category))
        ->assertStatus(200)
        ->assertSeeText($category->name)
        ->assertSeeText($category->description);
});
