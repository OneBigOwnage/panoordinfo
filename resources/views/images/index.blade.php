@extends('layouts.default')

@menuitem('Foto\'s')

@section('content')

<nav aria-label="breadcrumb" class="main-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Foto's</li>
  </ol>
</nav>

<main>
  <section>
    <input type="file" id="pond-container">
  </section>

  <section>

  </section>
</main>

<script src="{{ mix('/js/fileupload.js') }}"></script>

@endsection
