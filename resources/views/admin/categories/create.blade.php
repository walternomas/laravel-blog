@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
<h1>Crear nueva Categoría</h1>
@stop

@section('content')
<div class="card">

	<div class="card-body">
		{!! Form::open(['route' => 'admin.categories.store', 'autocomplete' => 'off']) !!}

			<div class="form-group">
				{!! Form::label('name', 'Nombre') !!}
				{!! Form::text('name', null, [
					'class' => 'form-control',
					'placeholder' => 'Ingrese el nombre de la categoría'
				]) !!}

				@error('name')
					<span class="text-danger">{{ $message }}</span>
				@enderror

			</div>

			<div class="form-group">
				{!! Form::label('slug', 'Slug') !!}
				{!! Form::text('slug', null, [
					'class' => 'form-control',
					'placeholder' => 'Ingrese el slug de la categoría',
					// 'readonly'
				]) !!}

				@error('slug')
					<span class="text-danger">{{ $message }}</span>
				@enderror

			</div>

			{!! Form::submit('Crear categoría', [
				'class'=>'btn btn-primary'
			]) !!}

		{!! Form::close() !!}
	</div>

</div>
@stop

@section('js')
<script src="{{	asset('vendor/jQuery-Plugin-stringToSlug-2.1.0/dist/jquery.stringtoslug.min.js') }}">
<script>
	$(document).ready( function() {
		$("#name").stringToSlug({
			setEvents: 'keyup keydown blur',
			getPut: '#slug',
			space: '-'
		});
	});
</script>
@endsection
