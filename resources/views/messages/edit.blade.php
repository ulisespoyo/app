@extends('layout')
@section('title','Contact')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			<form method="POST" action="{{ route('messages.update',$mensaje->id) }}" class="bg-white shadow rounded py-3 px-4">
				<h1 class="display-4">{{ __('Contact')}}</h1>
				<hr>
				{!! method_field('PUT') !!}
				@include('messages.form',['btnText'=>'Actualizar'])
			</form>
		</div>
	</div>
</div>
@endsection