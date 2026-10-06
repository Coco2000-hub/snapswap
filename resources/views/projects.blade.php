<h1>My kitchen projects</h1>

<p>Signed in as {{ request()->user()->name }}</p>

@if (! request()->user()->isAdvisor())
    <p><a href="/projects/create">Create project</a></p>
@endif

@foreach ($projects as $project)
<p>
    <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
</p>

<p>{{ $project->description }}</p>
@if ($project->user_id === request()->user()->id)
<p>
    <a href="/projects/{{ $project->id }}/edit">Edit</a>
</p>
@endif
@endforeach

