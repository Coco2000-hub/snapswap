<h1>My kitchen projects</h1>

@foreach ($projects as $project)
<p>{{$project->title}}</p>
<p>{{ $project->description }}</p>
@endforeach