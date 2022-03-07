@extends('layout')
@section('title','Mensajes')
@section('content')
<div class="container">
	<h3>Mensajes</h3>
	<div class="table-responsive">
		<table class="table table-hover table-bordered " style ="width: 100% !important;">
			<thead class="table-primary" style="color:black; text-align:center;">
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Correo</td>
					<td>Mensaje</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($mensajes as $mensaje)
				<tr>
					<td>{{ $mensaje->id }}</td>
					@if($mensaje->user_id)
						<td><a href="{{ route('Usuarios.show', $mensaje->user_id) }}">{{ $mensaje->user->name }}</a></td>
						<td>{{ $mensaje->user->email }}</td>
					@else
						<td>{{ $mensaje->nombre }}</td>
						<td>{{ $mensaje->email }}</td>
					@endif

					<td><a  href="{{ route('messages.show',$mensaje->id)}}">{{ $mensaje->mensaje }}</a></td>
					<td>
						<a class="btn btn-primary btn-sm" href="{{ route('messages.edit',$mensaje->id)}}">Editar</a>
						<a class="btn btn-danger btn-sm" href="{{ route('messages.destroy',$mensaje->id)}}">Eliminar</a>
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>
@endsection