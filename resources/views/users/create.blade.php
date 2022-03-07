@extends('layout')
@section('title','Crear Usuario')
@section('content')
<div class="container">
		<h1>Crear nuevo usuario</h1>
		@include('partials.validation-errors')
		<form method="POST" action="{{ route('Usuarios.store') }}"  class="bg-white py-3 px-4 rounded" enctype="multipart/form-data">
		@include('users.form',['user'=> new App\User])
		<button class="btn btn-primary btn-lg btn-block">Guardar</button>
	</form>
</div>
@endsection