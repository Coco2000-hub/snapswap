<x-app-layout>
<x-slot name="header">
    <h1 class="text-xl font-semibold text-gray-800">
        My kitchen projects
    </h1>
</x-slot>

<div class="mx-4 my-8 max-w-4xl rounded-lg bg-white p-6 shadow-sm sm:mx-auto">

<p>Signed in as {{ request()->user()->name }}</p>

@if (! request()->user()->isAdvisor())
    <p><a href="/projects/create">Create project</a></p>
@endif

@foreach ($projects as $project)
<p>
    <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
</p>

<p>{{ $project->description }}</p>
@if ($project->user_id === request()->user()->id)
<p>
    <a href="/projects/{{ $project->id }}/edit">Edit</a>
</p>
@endif
@endforeach
</div>
</x-app-layout>
