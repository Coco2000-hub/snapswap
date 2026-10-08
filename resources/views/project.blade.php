<x-app-layout>
<h1>{{ $project->title }}</h1>
<p>{{ $project->description }}</p>
<p>Front material: {{ $project->front_material }}</p>
<p>Handle style: {{ $project->handle_style }}</p>
<p>Worktop: {{ $project->worktop }}</p>
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
<h2>Comments</h2>
@foreach ($project->comments as $comment)
    <p>
        {{ $comment->user->name }}:
        {{ $comment->content }}
    </p>
@endforeach

<h2>Add comment</h2>

<form method="POST" action="{{ route('comments.store', $project->id) }}">
    @csrf

    <label for="content">Comment</label>
    <textarea id="content" name="content">{{ old('content') }}</textarea>

    @error('content')
        <p>{{ $message }}</p>
    @enderror

    <button type="submit">Add comment</button>
</form>

<h2><a href="/projects">Back to all projects</a></h2>
</x-app-layout>