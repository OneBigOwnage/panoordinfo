@extends('layouts.default')

@menuitem('Agenda items')

@section('content')

<nav aria-label="breadcrumb" class="main-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('agenda-items.index') }}">Agenda items</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $item->title }}</li>
  </ol>
</nav>

<section id="section2" class="col-9">
  <div class="card">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h6 class="d-flex align-items-center">
          <i class="fas fa-calendar-day text-info mr-2" style="font-size: 2em;"></i>
          Agenda item
        </h6>
        <div>
          <a href="{{ route('agenda-items.edit', $item) }}" class="btn btn-sm btn-primary has-icon">
            <i class="fas fa-pencil-alt mr-2"></i>
            Bewerken
          </a>
          <a href="javascript:linkWithCustomMethod('DELETE', '{{ route('agenda-items.destroy', $item) }}')" class="btn btn-sm btn-outline-danger has-icon">
            <i class="fas fa-trash mr-2"></i>
            Verwijderen
          </a>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Titel</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          {{ $item->title }}
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Datum</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            {{ $item->date->format('d-m-Y') }}
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Tekst</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            {{ $item->contents }}
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
  flatpickr('#date', {dateFormat: 'd-m-Y'});
});
</script>

@endsection
