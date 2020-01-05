@extends('layouts.default')

@menuitem('Maintenance')

@section('content')

<nav aria-label="breadcrumb" class="main-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Maintenance</li>
  </ol>
</nav>


<div class="d-flex">
  <a href="{{ route('maintenance.db-migrate') }}" class="btn btn-primary has-icon mr-3">
    <span class="fas fa-database"></span>&nbsp;Migrate database
  </a>
  <a href="{{ route('maintenance.db-migrate-fresh') }}" class="btn btn-primary has-icon">
    <span class="fas fa-database"></span>&nbsp;Migrate database fresh
  </a>
</div>



@if (session('artisan-output', false))
  <div class="alert alert-warning mt-5" role="alert">
    <h4 class="alert-heading mb-0">Artisan output:</h4>
    <hr class="mt-0">
    <p>{!! str_replace("\n", '<br>', e(session('artisan-output'))) !!}</p>
  </div>
@endif

@endsection
