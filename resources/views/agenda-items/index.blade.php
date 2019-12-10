@extends('layouts.default')

@menuitem('Agenda items')

@section('content')

<nav aria-label="breadcrumb" class="main-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Agenda items</li>
  </ol>
</nav>

  <div class="d-flex">
    <a href="{{ route('agenda-items.create') }}" class="btn btn-primary has-icon">
      <i class="material-icons mr-2">add_circle_outline</i>Nieuw agenda-item
    </a>
  </div>

  <div class="card border-top-0 overflow-hidden mt-3">
    <div class="table-responsive">
      <table class="table table-nostretch table-striped table-align-middle mb-0">
        <thead class="thead-primary">
          <tr>
            <th scope="col">Titel</th>
            <th scope="col">Datum</th>
            <th scope="col" class="text-center">Acties</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($items as $item)
            <tr>
              <td>
                <a href="{{ route('agenda-items.show', $item) }}">{{ $item->title }}</a>
              </td>
              <td>{{ $item->date->format('d-m-Y') }}</td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <a href="{{ route('agenda-items.edit', $item) }}" class="btn btn-link btn-icon bigger-130 text-info" title="Bewerken"><i class="material-icons">edit</i></a>
                  <a href="javascript:linkWithCustomMethod('DELETE', '{{ route('agenda-items.destroy', $item) }}')" class="btn btn-link btn-icon bigger-130 text-danger" title="Verwijderen"><i class="material-icons">delete_outline</i></a>
                </div>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>

@endsection
