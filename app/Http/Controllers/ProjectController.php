<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
    $user = request()->user();

    if ($user->isAdvisor()) {
        $projects = Project::all();
    } else {
        $projects = $user->projects;
    }
        return view('projects', ['projects' => $projects]);
    }

    public function show($id)
    {
  $user = request()->user();

  
    if ($user->isAdvisor()) {
        $project = Project::findOrFail($id);
    } else {
        $project = $user->projects()->findOrFail($id);
    }
    $project->load('comments.user');
        return view('project', ['project' => $project]);
    }

    public function create()
    {
        if (request()->user()->isAdvisor()) {
            abort(403, 'Advisors cannot create projects.');
        }

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
    if (request()->user()->isAdvisor()) {
        abort(403, 'Advisors cannot store projects.');
    }
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