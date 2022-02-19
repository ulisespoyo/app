@extends('layout')
@section('title','Portfolio')
@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center">
		@isset($category)
		<div>
			<h1 class="display-4">{{ $category->name }}</h1>
			<a href="{{ route ('projects.index') }}" >Regresar al Portafolio</a>
		</div>
		@else
		<h1 class="display-4">Portfolio</h1>
		@endisset
		@can('create', $newProject)
		<a class="btn btn-primary" href="{{ route('projects.create')}}">Crear proyecto</a>
		@endcan
	</div>
	<hr>
	<div class="d-flex flex-wrap justify-content-between align-items-start">
		@forelse($projects as $project)
		<div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem;">
			@if($project->image)
			<img class="card-img-top" src="/storage/{{ $project->image}}" alt="{{ $project->title }}" style="height:150px; object-fit: cover;" >
			@endif
			<div class="card-body">
				<h5 class="card-title">
					<a href="{{ route('projects.show',$project)}}">{{ $project->title }}</a>
				</h5>
				<h6 class="card-subtitle">{{ $project->created_at->format('d/m/y') }}</h6>
				<p class="card-text text-truncate">{{ $project->description }}</p>
				<div class="d-flex justify-content-between align-items-center">
					<a class="btn btn-primary btn-sm" href="{{ route('projects.show',$project)}}">Ver mas...</a>
					@if($project->category_id)
					<a href="{{ route('categories.show', $project->category )}}" class="badge badge-secondary">{{ $project->category->name }}</a>
					@endif
				</div>
			</div>
		</div>
		@empty
		<div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">
					<a href="#">NO HAY PROYECTOS</a>
				</h5>
			</div>
		</div>
		@endforelse
	</div>
	<div class="mt-4">
		{{ $projects->links() }}
	</div>


	@can('view-deleted-projects')
	<h4>PAPELERA</h4>
		<ul class="list-group">
			@foreach($deletedProjects as $deletedProject)
			<li class=" list-group-item">
				{{ $deletedProject->title }}
				@can('restore',$deletedProject)
				<form method="POST" class="d-inline" action="{{ route('projects.restore',$deletedProject)}}" >
					@csrf @method('PATCH')
					<button class="btn btn-sm btn-success">Restaurar</button>
					</form>
				@endcan
				@can('forceDelete',$deletedProject)
				<form method="POST" class="d-inline" action="{{ route('projects.forceDelete',$deletedProject)}}" onsubmit="return confirm('Esta acción no se puede deshacer, ¿Estas seguro de querer elimiar este proyecto?')">
					@csrf @method('DELETE')
					<button class="btn btn-sm btn-danger">Eliminar</button>
					</form>
				@endcan
			</li>
			@endforeach
		</ul>
	@endcan




</div>


@endsection