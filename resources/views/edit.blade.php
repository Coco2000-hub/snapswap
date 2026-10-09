<x-app-layout>
<x-slot name="header">
    <h1 class="text-xl font-semibold text-gray-800">
        Edit project
    </h1>
</x-slot>
<div class="mx-4 my-8 max-w-4xl rounded-lg bg-white p-6 shadow-sm sm:mx-auto">
<p>Signed in as {{ request()->user()->name }}</p>


<form
    method="POST"
    action="/projects/{{ $project->id }}"
    class="space-y-6"
>
    @csrf
    @method('PATCH')


<div>
    <label for="title" class="block font-medium">
        Title
    </label>

    <input
        type="text"
        id="title"
        name="title"
        value="{{ $project->title }}"
        class="mt-1 w-full rounded-md border border-gray-300 p-2"
    >

    @error('title')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="description" class="block font-medium">
        Description
    </label>

    <textarea
        id="description"
        name="description"
        rows="4"
        class="mt-1 w-full rounded-md border border-gray-300 p-2"
    >{{ $project->description }}</textarea>

    @error('description')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
<fieldset class="rounded-md border border-gray-200 p-4">
    <legend class="px-1 font-medium">Front material</legend>

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
<fieldset class="rounded-md border border-gray-200 p-4">
    <legend class="px-1 font-medium">Handle style</legend>

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

<fieldset class="rounded-md border border-gray-200 p-4">
    <legend class="px-1 font-medium">Worktop</legend>

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
<button
    type="submit"
    class="rounded-md bg-gray-800 px-4 py-2 font-semibold text-white hover:bg-gray-700"
>
    Save changes
</button>
</form>

<a
    href="/projects"
    class="mt-6 inline-flex text-sm font-medium text-gray-600 hover:underline"
>
    Back to all projects
</a>
</div>
</x-app-layout>