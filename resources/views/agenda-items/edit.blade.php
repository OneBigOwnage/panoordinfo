@extends('layouts.default')

@menuitem('Agenda items')

@section('content')

<nav aria-label="breadcrumb" class="main-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('agenda-items.index') }}">Agenda items</a></li>
    <li class="breadcrumb-item"><a href="{{ route('agenda-items.show', $item) }}">{{ $item->title }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Bewerken</li>
  </ol>
</nav>

<section id="section2" class="col-9">
  <form action="{{ route('agenda-items.update', $item) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset class="form-fieldset">
      <legend>Pas agenda item aan</legend>
      <div class="form-group">
        <label for="title">Titel</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ $item->title }}" placeholder="Titel van het agenda item...">
      </div>
      <div class="form-group">
        <label for="date">Datum</label>
        <input type="text" name="date" class="form-control datepicker" id="date" value="{{ $item->date->format('d-m-Y') }}" placeholder="Datum van het item...">
      </div>
      <div class="form-group">
        <label for="contents">Tekst</label>
        <textarea class="form-control" name="contents" id="contents" rows="4" placeholder="Tekst..." spellcheck="false">{{ $item->contents }}</textarea>
      </div>
      <button class="btn btn-primary" type="submit">Opslaan</button>
    </fieldset>
  </form>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
  flatpickr('#date', {dateFormat: 'd-m-Y'});
});
</script>

@endsection
