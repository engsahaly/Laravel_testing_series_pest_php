<?php

use App\Models\Category;

test('deleting category', function () {
    $category = Category::factory()->create();

    asUser()->delete(route('categories.destroy',  $category))
        ->assertStatus(302)
        ->assertRedirect(route('categories.index'))
        ->assertSessionHas('success', 'Category deleted successfully');

    $this->assertDatabaseMissing('categories', $category->toArray());
});