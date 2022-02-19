@extends('layout')
@section('title','About')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-lg-6">
			<img src="/img/about.svg" alt="Desarrollo Web" class="img-fluid mb-4">
		</div>
		<div class="col-12 col-lg-6">
			<h1 class="display-4 text-primary">Quien soy</h1>
			<p class="lead text-secondary">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
			<a class="btn btn-primary" href="{{ route('contact') }}">Contactame</a>
			<a class="btn btn-outline-primary" href="{{ route('projects.index') }}">Portafolio</a>
		</div>

	</div>
</div>
@endsection