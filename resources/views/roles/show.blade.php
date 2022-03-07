@extends('layout')
@section('title','Portfolio |'.$project->title)
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-8 mx-auto">
			@if($project->image)
			<img class="card-img-top" src="/storage/{{ $project->image}}" alt="{{ $project->title }}">
			@endif
			<div class="bg-white p-5 shadow rounder">
				<h1 class="mb-0"> {{ $project->title }}</h1>
				@if($project->category_id)
				<a href="{{ route('categories.show', $project->category )}}" class="badge badge-secondary">{{ $project->category->name }}</a>
				@endif
				<p class="text-secondary mb-1">{{ $project->description }}</p>
				<p class="text-black-50">{{ $project->created_at->diffForHumans() }}</p>
				<div class="d-flex justify-content-between align-items-center">
					<a href="{{ route('projects.index')}}">Regresar</a>


					<div class="btn-group btn-group-sm">
						@can('update',$project)
						<a class="btn btn-primary" href="{{ route('projects.edit',$project)}}">Editar</a>
						@endcan
						@can('delete',$project)
						<a class="btn btn-danger" href="#" onclick="document.getElementById('delete-project').submit()">Eliminar</a>
						<form method="POST" id="delete-project" action="{{ route('projects.destroy',$project) }}" class="d-none">
							@csrf @method('DELETE')
						</form>
						@endcan
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection