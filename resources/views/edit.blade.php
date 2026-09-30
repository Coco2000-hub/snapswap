<h1>Edit project</h1>


<form method="POST" action="/projects/{{ $project->id }}">
    @csrf
    @method('PATCH')


<label for="title">Title</label>
<input type="text" id="title" name="title"
       value="{{ $project->title }}">

<label for="description">Description</label>
<textarea id="description" name="description">{{ $project->description }}</textarea>

<button type="submit">Save changes</button>
</form>

<a href="/projects">Back to all projects</a>