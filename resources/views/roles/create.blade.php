@extends('layout')
@section('title','Rol Proyecto')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			@include('partials.validation-errors')
			<form method="POST" action="{{ route('Roles.store') }}" class="bg-white py-3 px-4 rounded" >
				<h1 class="display-4">Nuevo Rol</h1>
				<hr>
				@include('roles.form',['btnText'=>'Guardar'])
			</form>
		</div>
	</div>
</div>
@endsection