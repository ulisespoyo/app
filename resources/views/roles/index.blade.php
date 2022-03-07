@extends('layout')
@section('title','Roles')
@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center">
		<h1 class="display-4">Roles</h1>
		<a class="btn btn-primary" href="{{ route('Roles.create')}}">Crear Rol</a>
	</div>
	<div class="d-flex flex-wrap justify-content-between align-items-start">
		<table class="table">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre Id</th>
					<th>Nombre </th>
					<th>Descripción</th>
					<th>Creación</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $rol)
				<tr>
					<td>{{ $rol->id }}</td>
					<td><a href="{{ route('Roles.show',$rol->id)}}">{{ $rol->name }}</a></td>
					<td>{{ $rol->display_name }}</td>
					<td>{{ $rol->description }}</td>
					<td>{{ $rol->created_at->diffForHumans() }}</td>
					<td>
						<a href="{{ route('Roles.show',$rol->id)}}" class="btn btn-primary btn-sm">Ver </a>
					</td>

				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection