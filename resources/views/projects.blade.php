<h1>My kitchen projects</h1>

@foreach ($projects as $project)
<p>
    <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
</p>

<p>{{ $project->description }}</p>

<p>
    <a href="/projects/{{ $project->id }}/edit">Edit</a>
</p>
@endforeach

