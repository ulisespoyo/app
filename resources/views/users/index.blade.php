@extends('layout')
@section('title','Usuarios')
@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center">
	<h3>Usuarios</h3>
	<a class="btn btn-primary" href="{{ route('Usuarios.create') }}" >Crear nuevo Usuario</a>
	</div>
	<br>
	<div class="table-responsive">
		<table class="table table-hover table-bordered " style ="width: 100% !important;">
			<thead class="table-primary" style="color:black; text-align:center;">
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Correo</td>
					<td>Rol</td>
					<td>Creado</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						{{ $user->roles->pluck('display_name')->implode(' - ') }}
					</td>
					<td>{{ $user->created_at->diffForHumans() }}</td>
					<td>
						<a class="btn btn-primary btn-sm" href="{{ route('Usuarios.edit',$user->id) }}">Editar</a>
						<a class="btn btn-info btn-sm" href="{{ route('Usuarios.show',$user->id) }}">Ver</a>
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>
@endsection