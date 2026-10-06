<h1>{{ $project->title }}</h1>
<p>{{ $project->description }}</p>
<p>Signed in as {{ request()->user()->name }}</p>
@if ($project->user_id === request()->user()->id)
<p>
    <a href="/projects/{{ $project->id }}/edit">Edit</a>
</p>

<form method="POST" action="/projects/{{ $project->id }}">
    @csrf
    @method('DELETE')

    <button type="submit">Delete project</button>
</form>

@endif

<h2><a href="/projects">Back to all projects</a></h2>