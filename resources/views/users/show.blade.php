@extends('layout')
@section('title','Usuarios')
@section('content')
<div class="container">
	<h1>{{ $user->name }}</h1>
	<table class="table">
		<tr>
			<th>Nombre</th>
			<td>{{ $user->name }}	</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<th>Roles</th>
			<td>@foreach($user->roles as $role)
				{{ $role->display_name }}<br>
				@endforeach
			</td>
		</tr>
	</table>
	@can('edit',$user)
	<a class="btn btn-primary btn-sm" href="{{ route('Usuarios.edit',$user->id)}}">Editar</a>
	@endcan
	@can('destroy',$user)
	<a class="btn btn-danger btn-sm" href="#" onclick="document.getElementById('delete-user').submit()">Eliminar</a>
	<form method="POST" id="delete-user" action="{{ route('Usuarios.destroy',$user->id) }}" class="d-none">
		@csrf @method('DELETE')
	</form>
	@endcan
</div>
@endsection