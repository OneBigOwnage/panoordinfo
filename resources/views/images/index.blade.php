@extends('layouts.default')

@menuitem('Foto\'s')

@section('content')

<nav aria-label="breadcrumb" class="main-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Foto's</li>
  </ol>
</nav>

  <section class="image-upload-area">
      <input type="file" id="pond-container" name="image_file"
        accept="image/png, image/jpeg, image/gif"
        {{-- data-instant-upload="false" --}}
        data-drop-validation="true"


        {{-- Styling --}}
        {{-- data-style-panel-layout="compact circle" --}}
        data-style-load-indicator-position="center bottom"
        data-style-progress-indicator-position="right bottom"
        data-style-button-remove-item-position="left bottom"
        data-style-button-process-item-position="right bottom"
        >
  </section>


  <section class="image-list">

    @foreach ($images as $image)
      <div class="img rounded single-image-container">
        <img src="{{ $image->toShowURL() }}" alt="Image" class="img-thumbnail img-fluid">
        <div class="overlay bg-dark"></div>
        <div class="overlay-content text-center justify-content-end">
          <div class="btn-group mb-1" role="group">
            {{-- <button type="button" class="btn btn-text-light btn-icon rounded-circle shadow-none"><i class="material-icons">zoom_in</i></button> --}}
            {{-- <button type="button" class="btn btn-text-light btn-icon rounded-circle shadow-none"><i class="material-icons">edit</i></button> --}}
            <a href="javascript:linkWithCustomMethod('DELETE', '{{ route('images.destroy', $image) }}')" title="Verwijderen" class="btn btn-text-light btn-icon rounded-circle shadow-none text-danger"><i class="material-icons">delete</i></a>
          </div>
        </div>
      </div>
    @endforeach

  </section>

<script src="{{ mix('/js/fileupload.js') }}"></script>

@endsection
