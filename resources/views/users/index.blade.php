@extends('layout')
@section('title','Usuarios')
@section('content')
<div class="container">
	<h3>Usuarios</h3>
	<div class="table-responsive">
		<table class="table table-hover table-bordered " style ="width: 100% !important;">
			<thead class="table-primary" style="color:black; text-align:center;">
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Correo</td>
					<td>Rol</td>
					<td>Creado</td>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->role }}</td>
					<td>{{ $user->created_at->diffForHumans() }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection