@csrf
@if($project->image)
<img class="card-img-top mb-2" src="/storage/{{ $project->image}}" alt="{{ $project->title }}" style="height:250px; object-fit: cover;">
@endif
<div class="custom-file mb-2">
	<input type="file" name="image" class="custom-file-input" id="customFile" >
	<label class="custom-file-label">Choose file</label>
</div>
<div class="form-group">
	<label>Cateogria</label>
	<select class="form-control bg-light shadow-sm border-0" id="category_id" name="category_id">
		<option value="">Seleccione</option>
		@foreach($categories as $id=>$nombre)
		<option value="{{ $id }}" @if($id == old('category_id', $project->category_id)) selected @endif >{{ $nombre}}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<label for="title">Titulo del proyecto</label>
	<input type="text" name="title"  class="form-control bg-light shadow-sm border-0" value="{{ old('title',$project->title ) }}">
	{!! $errors->first('title','<small>:message</small><br>') !!}
</div>
<div class="form-group">
	<label for="url">URL del Proyecto</label>
	<input type="text" name="url" class="form-control bg-light shadow-sm border-0" value="{{ old('url',$project->url ) }}">
	{!! $errors->first('url','<small>:message</small><br>') !!}
</div>
<div class="form-group">
	<label for="description">Descripción del proyecto</label>
	<textarea type="text" name="description" class="form-control bg-light shadow-sm border-0"> {{ old('description',$project->description ) }}</textarea>
	{!! $errors->first('description','<small>:message</small><br>') !!}
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('projects.index')}}">Regresar</a>