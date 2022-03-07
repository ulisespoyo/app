{!! csrf_field() !!}
<div class="form-group">
	<label for="name">Nombre</label>
	<input type="text" name="name"  class="form-control bg-light shadow-sm border-0" value="{{ old('name',$user->name ) }}">
</div>
<div class="form-group">
	<label for="email">Correo electrónico</label>
	<input type="text" name="email" class="form-control bg-light shadow-sm border-0" value="{{ old('email',$user->email ) }}">
</div>
@unless($user->id)
<div class="form-group">
	<label for="password">Contraseña</label>
	<input type="text" name="password" class="form-control bg-light shadow-sm border-0" >
</div>
<div class="form-group">
	<label for="password_confirmation">Confirmar Contraseña</label>
	<input type="text" name="password_confirmation" class="form-control bg-light shadow-sm border-0" >
</div>
@endunless
<div class="form-group">
	<label for="roles">Roles</label>
	<div class="checkbox">
		@foreach($roles as $id => $name)
		<label>
			<input type="checkbox" class="checkbox" value='{{ $id }}' {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }} name="roles[]"> {{ $name }}
		</label>
		@endforeach
	</div>
</div>