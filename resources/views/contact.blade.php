@extends('layout')
@section('title','Contact')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			<form method="POST" action="{{ route('messages.store') }}" class="bg-white shadow rounded py-3 px-4">
				<h1 class="display-4">{{ __('Contact')}}</h1>
				<hr>
				@csrf
				<div class="form-group">
					<label for="name">Nombre</label>
					<input name="name" id="name" class="form-control bg-light shadow-sm border-0 @error('name') is- invalid  @enderror" placeholder="Nombre..." value="{{ old('name')}}">
					{!! $errors->first('name','<small>:message</small><br>') !!}
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>Hola</strong>
					</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="email">Corrreo Electronico</label>
					<input type="email" id="email" class="form-control bg-light shadow-sm border-0" name="email" placeholder="Email..." value="{{ old('email')}}">
					{!! $errors->first('email','<small>:message</small><br>') !!}
				</div>
				<div class="form-group">
					<label for="subject">Asunto</label>
					<input name="subject" id="subject" class="form-control bg-light shadow-sm border-0" placeholder="Asunto..." value="{{ old('subject')}}">
					{!! $errors->first('subject','<small>:message</small><br>') !!}
				</div>
				<div class="form-group">
					<label for="content">Mensaje</label>
					<textarea name='content' id="content" class="form-control bg-light shadow-sm border-0" placeholder="Mensaje...">{{ old('content')}} </textarea>
					{!! $errors->first('content','<small>:message</small><br>') !!}
				</div>
				<button class="btn btn-primary btn-lg btn-block">@lang('Send')</button>
			</form>
		</div>
	</div>
</div>
@endsection