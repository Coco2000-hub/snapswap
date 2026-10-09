<x-app-layout>
<x-slot name="header">
    <h1 class="text-xl font-semibold text-gray-800">
        Edit project
    </h1>
</x-slot>
<p>Signed in as {{ request()->user()->name }}</p>


<form method="POST" action="/projects/{{ $project->id }}">
    @csrf
    @method('PATCH')


<label for="title">Title</label>
<input type="text" id="title" name="title"
       value="{{ $project->title }}">
       @error('title')
    <p>{{ $message }}</p>
@enderror

<label for="description">Description</label>
<textarea id="description" name="description">{{ $project->description }}</textarea>
@error('description')
    <p>{{ $message }}</p>
@enderror
<fieldset>
    <legend>Front material</legend>

    <label>
        <input
            type="radio"
            name="front_material"
            value="white"
            @checked($project->front_material === 'white')
            required
        >
        White
    </label>

    <label>
        <input
            type="radio"
            name="front_material"
            value="oak"
            @checked($project->front_material === 'oak')
        >
        Oak
    </label>

    <label>
        <input
            type="radio"
            name="front_material"
            value="walnut"
            @checked($project->front_material === 'walnut')
        >
        Walnut
    </label>
</fieldset>
@error('front_material')
    <p>{{ $message }}</p>
@enderror
<fieldset>
    <legend>Handle style</legend>

    <label>
        <input
            type="radio"
            name="handle_style"
            value="black_bar"
            @checked($project->handle_style === 'black_bar')
            required
        >
        Black bar handle
    </label>

    <label>
        <input
            type="radio"
            name="handle_style"
            value="brass_knob"
            @checked($project->handle_style === 'brass_knob')
        >
        Brass knob
    </label>

    <label>
        <input
            type="radio"
            name="handle_style"
            value="handleless"
            @checked($project->handle_style === 'handleless')
        >
        Handleless
    </label>
</fieldset>
@error('handle_style')
    <p>{{ $message }}</p>
@enderror

<fieldset>
    <legend>Worktop</legend>

    <label>
        <input
            type="radio"
            name="worktop"
            value="light_stone"
            @checked($project->worktop === 'light_stone')
            required
        >
        Light stone
    </label>

    <label>
        <input
            type="radio"
            name="worktop"
            value="dark_stone"
            @checked($project->worktop === 'dark_stone')
        >
        Dark stone
    </label>

    <label>
        <input
            type="radio"
            name="worktop"
            value="wood"
            @checked($project->worktop === 'wood')
        >
        Wood
    </label>
</fieldset>
@error('worktop')
    <p>{{ $message }}</p>
@enderror
<button type="submit">Save changes</button>
</form>

<a href="/projects">Back to all projects</a>
</x-app-layout>