<?php

use App\Models\Project;
use App\Models\User;

it('allows the project owner to create a comment', function () {
    $owner = User::factory()->create();
    $project = Project::factory()->for($owner)->create();

    $response = $this->actingAs($owner)->post(
        "/projects/{$project->id}/comments",
        ['content' => 'Please use the dark worktop.'],
    );

    $response->assertRedirect("/projects/{$project->id}");

    $this->assertDatabaseHas('comments', [
        'project_id' => $project->id,
        'user_id' => $owner->id,
        'content' => 'Please use the dark worktop.',
    ]);
});
it('allows an advisor to create a comment', function () {
    $owner = User::factory()->create();
    $advisor = User::factory()->create([
        'role' => 'advisor',
    ]);
    $project = Project::factory()->for($owner)->create();

    $response = $this->actingAs($advisor)->post(
        "/projects/{$project->id}/comments",
        ['content' => 'This material works well.'],
    );

    $response->assertRedirect("/projects/{$project->id}");

    $this->assertDatabaseHas('comments', [
        'project_id' => $project->id,
        'user_id' => $advisor->id,
        'content' => 'This material works well.',
    ]);
});

it('prevents another customer from creating a comment', function () {
    $owner = User::factory()->create();
    $otherCustomer = User::factory()->create();
    $project = Project::factory()->for($owner)->create();

    $response = $this->actingAs($otherCustomer)->post(
        "/projects/{$project->id}/comments",
        ['content' => 'I should not be allowed to post this.'],
    );

    $response->assertNotFound();

    $this->assertDatabaseMissing('comments', [
        'project_id' => $project->id,
        'user_id' => $otherCustomer->id,
        'content' => 'I should not be allowed to post this.',
    ]);
});