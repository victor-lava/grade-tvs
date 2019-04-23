@extends('layouts/app')

@section('content')

<div class="container">
  <div class="row">
    @if(session('message'))
      {{ session('message') }}
    @endif
    <div class="col-12">
      <h1>Grades ({{ $student->name }} {{ $student->surname }})</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      @foreach($grades as $grade)
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            {{-- {{ $student->surname }} --}}
            {{ $grade->grade }}
            {{ $grade->lecture->name }}

            <span class="badge badge-success">
              {{ $grade->created_at }}
            </span>
          </h5>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
