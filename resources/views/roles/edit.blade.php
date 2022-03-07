@extends('layout')
@section('title','Editar Rol')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">

			@include('partials.validation-errors')
			<form method="POST" action="{{ route('Roles.update', $rol->id ) }}"  class="bg-white py-3 px-4 rounded" >
				@method('PATCH')
				<h1 class="display-4">Editar Rol</h1>
				<hr>
				@include('roles.form',['btnText'=>'Actualizar'])
			</form>
		</div>
	</div>
</div>
@endsection