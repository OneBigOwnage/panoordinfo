@extends('layouts.default')

@menuitem('Mededelingen')

@section('content')

<nav aria-label="breadcrumb" class="main-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('announcements.index') }}">Mededelingen</a></li>
    <li class="breadcrumb-item"><a href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Bewerken</li>
  </ol>
</nav>

<section id="section2" class="col-9">
  <form action="{{ route('announcements.update', $announcement) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset class="form-fieldset">
      <legend>Pas mededeling aan</legend>
      <div class="form-group">
        <label for="title">Titel</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ $announcement->title }}" placeholder="Titel van het agenda item...">
      </div>
      <div class="form-group">
        <label for="contents">Tekst</label>
        <textarea class="form-control" name="contents" id="contents" rows="4" placeholder="Tekst..." spellcheck="false">{{ $announcement->contents }}</textarea>
      </div>
      <button class="btn btn-primary" type="submit">Opslaan</button>
    </fieldset>
  </form>
</section>

@endsection
