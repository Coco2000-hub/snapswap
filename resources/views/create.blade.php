<h1>Create a new project </h1>
<p>Signed in as {{ request()->user()->name }}</p>

<form method="POST" action="/projects">
    @csrf
    <Label for="title">Title</Label>
    <input type="text" id="title" name="title" value="{{ old('title') }}">
    @error('title')
    <p>{{ $message }}</p>
@enderror

    <label for="description">Description</label>
<textarea id="description" name="description">{{ old('description') }}</textarea>
@error('description')
    <p>{{ $message }}</p>
@enderror
<button type="submit">Submit</button>
</form>
<h2><a href="/projects">Back to all projects</a></h2>