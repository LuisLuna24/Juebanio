<?php

use App\Models\Category;
use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('dashboard'));
    $response->assertOk();
});

test('the category api route is defined', function () {
    expect(route('api.category.index'))->toBe('/api/category');
});

test('the category api returns available categories', function () {
    Category::factory()->count(3)->create();

    $this->getJson(route('api.category.index'))
        ->assertOk()
        ->assertJsonCount(3);
});
