<x-app-layout>
<x-slot name="header">
    <h1 class="text-xl font-semibold text-gray-800">
        {{ $project->title }}
    </h1>
</x-slot>
<div class="mx-4 my-8 max-w-4xl rounded-lg bg-white p-6 shadow-sm sm:mx-auto">
<div class="space-y-4">
    <p class="text-gray-700">
        {{ $project->description }}
    </p>

    <div class="rounded-md border border-gray-200 p-4">
        <p>
            <span class="font-medium">Front material:</span>
            {{ $project->front_material }}
        </p>

        <p>
            <span class="font-medium">Handle style:</span>
            {{ $project->handle_style }}
        </p>

        <p>
            <span class="font-medium">Worktop:</span>
            {{ $project->worktop }}
        </p>
    </div>
</div>

<section class="mt-8">
    <h2 class="text-lg font-semibold text-gray-900">
        Comments
    </h2>

    <div class="mt-4 space-y-3">
        @foreach ($project->comments as $comment)
            <p class="rounded-md border border-gray-200 p-3">
                <span class="font-medium">{{ $comment->user->name }}:</span>
                {{ $comment->content }}
            </p>
        @endforeach
    </div>
</section>

<section class="mt-8 border-t border-gray-200 pt-6">
    <h2 class="text-lg font-semibold text-gray-900">
        Add comment
    </h2>

    <form
        method="POST"
        action="{{ route('comments.store', $project->id) }}"
        class="mt-4 space-y-4"
    >
        @csrf

        <div>
            <label for="content" class="block font-medium">
                Comment
            </label>

            <textarea
                id="content"
                name="content"
                rows="3"
                class="mt-1 w-full rounded-md border border-gray-300 p-2"
            >{{ old('content') }}</textarea>

            @error('content')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="rounded-md bg-gray-800 px-4 py-2 font-semibold text-white hover:bg-gray-700"
        >
            Add comment
        </button>
    </form>
</section>
  
@if ($project->user_id === request()->user()->id)
    <div class="mt-6 flex gap-3">
        <a
            href="/projects/{{ $project->id }}/edit"
            class="rounded-md border border-gray-300 px-4 py-2 font-medium text-gray-700 hover:bg-gray-50"
        >
            Edit
        </a>

        <form method="POST" action="/projects/{{ $project->id }}">
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="rounded-md bg-red-600 px-4 py-2 font-semibold text-white hover:bg-red-500"
            >
                Delete project
            </button>
        </form>
    </div>
@endif

<a
    href="/projects"
    class="mt-8 inline-flex text-sm font-medium text-gray-600 hover:underline"
>
    Back to all projects
</a>
</div>
</x-app-layout>
