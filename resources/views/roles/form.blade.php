@csrf
<div class="form-group">
	<label for="name">Nombre del Rol</label>
	<input type="text" name="name"  class="form-control bg-light shadow-sm border-0" value="{{ old('name',$rol->name ) }}">
	{!! $errors->first('name','<small>:message</small><br>') !!}
</div>
<div class="form-group">
	<label for="display_name">Nombre a mostrar</label>
	<input type="text" name="display_name" class="form-control bg-light shadow-sm border-0" value="{{ old('display_name',$rol->display_name ) }}">
	{!! $errors->first('display_name','<small>:message</small><br>') !!}
</div>
<div class="form-group">
	<label for="description">Descripción del proyecto</label>
	<textarea type="text" name="description" class="form-control bg-light shadow-sm border-0"> {{ old('description',$rol->description ) }}</textarea>
	{!! $errors->first('description','<small>:message</small><br>') !!}
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('Roles.index')}}">Regresar</a>