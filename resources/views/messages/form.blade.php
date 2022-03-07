{!! csrf_field('') !!}
@unless($mensaje->user_id)
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input name="nombre" id="nombre" required class="form-control bg-light shadow-sm border-0 @error('nombre') is- invalid  @enderror" placeholder="Nombre..." value="{{ $mensaje->nombre or old('nombre') }}">
		{!! $errors->first('nombre','<small>:message</small><br>') !!}
		@error('nombre')
		<span class="invalid-feedback" role="alert">
			<strong>Hola</strong>
		</span>
		@enderror
	</div>
	<div class="form-group">
		<label for="email">Corrreo Electronico</label>
		<input type="email" id="email" required class="form-control bg-light shadow-sm border-0" name="email" placeholder="Email..." value="{{ $mensaje->email or old('email') }}">
		{!! $errors->first('email','<small>:message</small><br>') !!}
	</div>
@endunless
<div class="form-group">
	<label for="mensaje">Mensaje</label>
	<textarea name='mensaje' id="mensaje" required class="form-control bg-light shadow-sm border-0" placeholder="Mensaje...">{{ $mensaje->mensaje or old('mensaje') }} </textarea>
	{!! $errors->first('mensaje','<small>:message</small><br>') !!}
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>