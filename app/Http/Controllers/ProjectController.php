<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = request()->user()->projects;

        return view('projects', ['projects' => $projects]);
    }

    public function show($id)
    {
   $project = request()->user()->projects()->findOrFail($id);

        return view('project', ['project' => $project]);
    }

    public function create()
    {
        return view('create');
    }
   
    public function edit($id)
{
    $project = request()->user()->projects()->findOrFail($id);

    return view('edit', ['project' => $project]);
}

public function update($id)
{
    $project = request()->user()->projects()->findOrFail($id);

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
    $project = request()->user()->projects()->findOrFail($id);
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
$project->user_id = request()->user()->id;
$project->title = $data['title'];
$project->description = $data['description'];
$project->save();

return redirect('/projects');
}
}