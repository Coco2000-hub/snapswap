<?php

use App\Models\User;

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertOk()->assertViewIs('welcome');
});

it('redirects guests from the dashboard to login', function () {
    $response = $this->get('/dashboard');

    $response->assertRedirect('/login');
});

it('shows the dashboard to an authenticated user', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertOk()->assertViewIs('userzone.dashboard');
});
