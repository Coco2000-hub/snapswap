<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects', ['projects' => $projects]);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('project', ['project' => $project]);
    }

    public function create()
    {
        return view('create');
    }
   
    public function edit($id)
{
    $project = Project::findOrFail($id);

    return view('edit', ['project' => $project]);
}

public function update($id)
{
    $project = Project::findOrFail($id);

    $data = request()->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $project->title = $data['title'];
    $project->description = $data['description'];
    $project->save();

    return redirect('/projects/' . $project->id);
}

public function destroy($id)
{
    $project = Project::findOrFail($id);
    $project->delete();

    return redirect('/projects');
}


public function store()
{
 $data = request()->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
]);

$project = new Project();
$project->title = $data['title'];
$project->description = $data['description'];
$project->save();

return redirect('/projects');
}
}