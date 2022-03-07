@extends('layout')
@section('title','Editar Usuario')
@section('content')
<div class="container">
	<h3>Editar Usuario</h3>
	@include('partials.validation-errors')
	<form method="POST" action="{{ route('Usuarios.update', $user->id ) }}"  class="bg-white py-3 px-4 rounded" enctype="multipart/form-data">
		{!! method_field('PUT') !!}
		@include('users.form')
		<button class="btn btn-primary btn-lg btn-block">Actualizar</button>
	</form>
</div>
@endsection