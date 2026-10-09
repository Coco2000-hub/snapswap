<x-app-layout>
<x-slot name="header">
    <h1 class="text-xl font-semibold text-gray-800">
        Create a new project
    </h1>
</x-slot>
<div class="mx-4 my-8 max-w-4xl rounded-lg bg-white p-6 shadow-sm sm:mx-auto">
<p>Signed in as {{ request()->user()->name }}</p>



<form method="POST" action="/projects" class="space-y-6">
    @csrf
    <div>
    <label for="title" class="block font-medium">
        Title
    </label>

    <input
        type="text"
        id="title"
        name="title"
        value="{{ old('title') }}"
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
    >{{ old('description') }}</textarea>

    @error('description')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
<fieldset class="rounded-md border border-gray-200 p-4">
    <legend class="px-1 font-medium">Front material</legend>

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
<fieldset class="rounded-md border border-gray-200 p-4">
    <legend class="px-1 font-medium">Handle style</legend>

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

<fieldset class="rounded-md border border-gray-200 p-4">
    <legend class="px-1 font-medium">Worktop</legend>

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
<button
    type="submit"
    class="rounded-md bg-gray-800 px-4 py-2 font-semibold text-white hover:bg-gray-700"
>
    Create project
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