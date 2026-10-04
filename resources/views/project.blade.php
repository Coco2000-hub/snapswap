<h1>{{ $project->title }}</h1>
<p>{{ $project->description }}</p>

<p>
    <a href="/projects/{{ $project->id }}/edit">Edit</a>
</p>

<h2><a href="/projects">Back to all projects</a></h2>