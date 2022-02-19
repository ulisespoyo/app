@extends('layout')
@section('title','Editar Proyecto')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">

			@include('partials.validation-errors')
			<form method="POST" action="{{ route('projects.update', $project ) }}"  class="bg-white py-3 px-4 rounded" enctype="multipart/form-data">
				@method('PATCH')
				<h1 class="display-4">Editar proyecto</h1>
				<hr>
				@include('projects.form',['btnText'=>'Actualizar'])
			</form>
		</div>
	</div>
</div>
@endsection