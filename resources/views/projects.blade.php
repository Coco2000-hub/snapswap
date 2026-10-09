<x-app-layout>
<x-slot name="header">
    <h1 class="text-xl font-semibold text-gray-800">
        My kitchen projects
    </h1>
</x-slot>

<div class="mx-4 my-8 max-w-4xl rounded-lg bg-white p-6 shadow-sm sm:mx-auto">

<p>Signed in as {{ request()->user()->name }}</p>

@if (! request()->user()->isAdvisor())
    <a
    href="/projects/create"
    class="mt-6 inline-flex rounded-md bg-gray-800 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700"
>
    Create project
</a>
@endif

<div class="mt-8 space-y-4">
    @foreach ($projects as $project)
        <article class="rounded-md border border-gray-200 p-4">
            <h2 class="text-lg font-semibold text-gray-900">
                <a
                    href="/projects/{{ $project->id }}"
                    class="hover:underline"
                >
                    {{ $project->title }}
                </a>
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                {{ $project->description }}
            </p>

            @if ($project->user_id === request()->user()->id)
                <a
                    href="/projects/{{ $project->id }}/edit"
                    class="mt-4 inline-flex text-sm font-medium text-gray-700 hover:underline"
                >
                    Edit
                </a>
            @endif
        </article>
    @endforeach
</div>
</div>
</x-app-layout>
