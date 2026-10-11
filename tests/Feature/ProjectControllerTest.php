<?php

use App\Models\Project;

it('shows the selected project images', function () {
    $project = Project::factory()->create([
        'front_material' => 'oak',
        'handle_style' => 'black_bar',
        'worktop' => 'dark_stone',
    ]);

    $response = $this->actingAs($project->user)->get("/projects/{$project->id}");

    $response->assertSee('images/front-materials/oak.jpg');
    $response->assertSee('images/handle-styles/black_bar.jpg');
    $response->assertSee('images/worktops/dark_stone.jpg');
});

it('deletes a project', function () {
    $project = Project::factory()->create();

    $response = $this->actingAs($project->user)->delete("/projects/{$project->id}");

    $response->assertRedirect('/projects');
    $this->assertModelMissing($project);
});
