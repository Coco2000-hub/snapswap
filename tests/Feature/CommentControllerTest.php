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