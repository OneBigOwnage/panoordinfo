@extends('layouts.default')

@menuitem('Maintenance')

@section('content')

<nav aria-label="breadcrumb" class="main-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Maintenance</li>
  </ol>
</nav>


<div class="row">
  <section class="col-9">
    <form action="{{ route('users.create') }}" method="POST">
      @csrf
      <fieldset class="form-fieldset">
        <legend>Voeg nieuwe gebruiker toe</legend>
        <div class="form-group">
          <label for="title">Naam</label>
          <input type="text" name="name" class="form-control" placeholder="John Smith">
        </div>
        <div class="form-group">
          <label for="date">Email</label>
          <input type="text" name="email" class="form-control" placeholder="John@example.com">
        </div>
        <div class="form-group">
          <label for="contents">Password</label>
          <input type="password" name="password" class="form-control" placeholder="John@example.com">
        </div>
        <button class="btn btn-primary" type="submit">Opslaan</button>

        @if(session('msg', false))
          <div class="alert alert-success mt-5" role="alert">
            <p class="mb-0">{{ session('msg') }}</p>
          </div>
        @endif

      </fieldset>
    </form>
  </section>

  <section class="col-3">
    <form action="#" method="GET">
      <fieldset class="form-fieldset">
        <legend>Database onderhoud</legend>
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
      </fieldset>
    </form>
  </section>
</div>

@endsection
