@extends('layout')
@section('title','Contact')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			<form method="POST" action="{{ route('messages.store') }}" class="bg-white shadow rounded py-3 px-4">
				<h1 class="display-4">{{ __('Contact')}}</h1>
				<hr>
				@include('messages.form',['btnText'=>'Guardar', 'mensaje'=> new App\Message])
			</form>
		</div>
	</div>
</div>
@endsection