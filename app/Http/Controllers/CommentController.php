<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   public function store(Request $request, int $id): RedirectResponse
{
    $user = $request->user();

    if ($user->isAdvisor()) {
        $project = Project::findOrFail($id);
    } else {
        $project = $user->projects()->findOrFail($id);
    }

    $data = $request->validate([
        'content' => 'required|string',
    ]);

    $comment = new Comment();
    $comment->project_id = $project->id;
    $comment->user_id = $user->id;
    $comment->content = $data['content'];
    $comment->save();

    return redirect("/projects/{$project->id}");
}
}
