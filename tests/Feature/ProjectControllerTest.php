<?php

use App\Models\Project;

it('deletes a project', function () {
    $project = Project::factory()->create();

    $response = $this->actingAs($project->user)->delete("/projects/{$project->id}");

    $response->assertRedirect('/projects');
    $this->assertModelMissing($project);
});
