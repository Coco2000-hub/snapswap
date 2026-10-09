<x-app-layout>
<x-slot name="header">
    <h1 class="text-xl font-semibold text-gray-800">
        Create a new project
    </h1>
</x-slot>
<div class="mx-4 my-8 max-w-4xl rounded-lg bg-white p-6 shadow-sm sm:mx-auto">
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
<fieldset>
    <legend>Front material</legend>

    <label>
        <input type="radio" name="front_material" value="white" required>
        White
    </label>

    <label>
        <input type="radio" name="front_material" value="oak">
        Oak
    </label>

    <label>
        <input type="radio" name="front_material" value="walnut">
        Walnut
    </label>
    @error('front_material')
    <p>{{ $message }}</p>
@enderror
</fieldset>
<fieldset>
    <legend>Handle style</legend>

    <label>
        <input type="radio" name="handle_style" value="black_bar" required>
        Black bar handle
    </label>

    <label>
        <input type="radio" name="handle_style" value="brass_knob">
        Brass knob
    </label>

    <label>
        <input type="radio" name="handle_style" value="handleless">
        Handleless
    </label>
</fieldset>
@error('handle_style')
    <p>{{ $message }}</p>
@enderror

<fieldset>
    <legend>Worktop</legend>

    <label>
        <input type="radio" name="worktop" value="light_stone" required>
        Light stone
    </label>

    <label>
        <input type="radio" name="worktop" value="dark_stone">
        Dark stone
    </label>

    <label>
        <input type="radio" name="worktop" value="wood">
        Wood
    </label>
</fieldset>
@error('worktop')
    <p>{{ $message }}</p>
@enderror
<button type="submit">Submit</button>
</form>

<h2><a href="/projects">Back to all projects</a></h2>
</div>
</x-app-layout>