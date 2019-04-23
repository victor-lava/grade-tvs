@extends('layouts/app')

@section('content')

<div class="container">
  <div class="row">
    @if(session('message'))
      {{ session('message') }}
    @endif
    <div class="col-12">
      <h1>Grades
        <a href="{{ route('grades.create') }}" class="btn btn-success ml-2">Pridėti</a>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      @foreach($grades as $grade)
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">

            <span class="badge badge-success">
              {{ $grade->created_at }}
            </span>
          </h5>
          <a href="{{ route('grades.edit', $grade->id)   }}" class="btn btn-primary">Redaguoti</a>

          <form action="{{ route('grades.destroy', $grade->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit">Trinti</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
