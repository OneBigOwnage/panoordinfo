@extends('layouts.default')

@menuitem('Mededelingen')

@section('content')

<nav aria-label="breadcrumb" class="main-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Mededelingen</li>
  </ol>
</nav>

  <div class="d-flex">
    <a href="{{ route('announcements.create') }}" class="btn btn-primary has-icon">
      <i class="material-icons mr-2">add_circle_outline</i>Nieuwe mededeling
    </a>
  </div>

  <div class="card border-top-0 overflow-hidden mt-3">
    <div class="table-responsive">
      <table class="table table-nostretch table-striped table-align-middle announcements-table mb-0">
        <thead class="thead-primary">
          <tr>
            <th scope="col">Titel</th>
            <th scope="col" class="text-center">Acties</th>
          </tr>
        </thead>
        <tbody>

          @forelse ($announcements as $announcement)
            <tr>
              <td>
                <a href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a>
              </td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <a href="{{ route('announcements.edit', $announcement) }}" class="btn btn-link btn-icon bigger-130 text-info" title="Bewerken"><i class="material-icons">edit</i></a>
                  <a href="javascript:linkWithCustomMethod('DELETE', '{{ route('announcements.destroy', $announcement) }}')" class="btn btn-link btn-icon bigger-130 text-danger" title="Verwijderen"><i class="material-icons">delete_outline</i></a>
                </div>
              </td>
            </tr>
          @empty

            <tr>
              <td class="no-results" colspan="2">
                <div class="no-results-container">
                  <span>Er zijn nog geen mededelingen</span>
                  <br/>
                  <a href="{{ route('announcements.create') }}" class="btn btn-lg btn-outline-primary has-icon">
                    <i class="material-icons mr-2">add_circle_outline</i>Nieuwe mededeling maken
                  </a>
                </div>
              </td>
            </tr>

          @endforelse

        </tbody>
      </table>
    </div>
  </div>

@endsection
