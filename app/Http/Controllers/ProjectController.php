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
}