@extends('layouts/app')

@section('content')

<div class="container">
  <div class="row">
    @if(session('message'))
      {{ session('message') }}
    @endif
    <div class="col-12">
      <h1>Students
        <a href="{{ route('students.create') }}" class="btn btn-success ml-2">Pridėti</a>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      @foreach($students as $student)
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            {{ $student->name }}
            {{ $student->surname }}
            {{ $student->email }}
            {{ $student->phone }}

            <span class="badge badge-success">
              {{ $student->created_at }}
            </span>
          </h5>
          <a href="{{ route('students.edit', $student->id)   }}" class="btn btn-primary">Redaguoti</a>

          <form action="{{ route('students.destroy', $student->id) }}" method="post">
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
