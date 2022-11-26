<div class="form-group">
  {!! Form::label('name', 'Nombre:') !!}
  {!! Form::text('name', null, [
      'class' => 'form-control',
      'placeholder' => 'Ingrese el nombre del post',
  ]) !!}

  @error('name')
      <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  {!! Form::label('slug', 'Slug') !!}
  {!! Form::text('slug', null, [
      'class' => 'form-control disabled',
      'placeholder' => 'Ingrese el slug del post',
      // 'readonly'
  ]) !!}

  @error('slug')
      <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  {!! Form::label('category_id', 'Categoría') !!}
  {!! Form::select('category_id', $categories, null, [
      'class' => 'form-control',
  ]) !!}

  @error('category_id')
      <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  <p class="font-weight-bold">Etiquetas</p>
  @foreach ($tags as $tag)
      <label class="mr-2">
          {!! Form::checkbox('tags[]', $tag->id, null) !!}
          {{ $tag->name }}
      </label>
  @endforeach

  @error('tags')
      <br>
      <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  <p class="font-weight-bold">Estado</p>
  <label>
      {!! Form::radio('status', 1, true) !!}
      Borrador
  </label>
  <label>
      {!! Form::radio('status', 2) !!}
      Publicado
  </label>

  @error('status')
      <br>
      <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="row mb-3">
<div class="col">
  <img
    id="picture"
    src="https://cdn.pixabay.com/photo/2017/04/16/18/08/test-tube-2235388_960_720.png"
    alt=""
  >
</div>
<div class="col">
  <div class="form-group">
    {!! Form::label('file', 'imagen se se mostratá') !!}
    {!! Form::file('file', [
      'class' => 'form-control-file',
      'accept' => 'image/*',
    ]) !!}
    @error('file')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem laboriosam doloremque fugit impedit ea tenetur vitae a et. Voluptates laudantium dolor maiores, repudiandae sit sequi illo dicta quaerat. Consectetur, tempora?</p>
</div>
</div>

<div class="form-group">
  {!! Form::label('stract', 'Extracto:') !!}
  {!! Form::textarea('stract', null, [
      'class' => 'form-control',
  ]) !!}

  @error('stract')
      <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  {!! Form::label('body', 'Cuerpo del post:') !!}
  {!! Form::textarea('body', null, [
      'class' => 'form-control',
  ]) !!}

  @error('body')
      <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
