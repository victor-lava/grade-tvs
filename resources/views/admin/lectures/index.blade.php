@extends('layouts/app')

@section('content')

<div class="container">
  <div class="row">
    @if(session('message'))
      {{ session('message') }}
    @endif
    <div class="col-12">
      <h1>Lectures
        <a href="{{ route('lectures.create') }}" class="btn btn-success ml-2">Pridėti</a>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      @foreach($lectures as $lecture)
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            {{ $lecture->name }}
            <span class="badge badge-success">
              {{ $lecture->created_at }}
            </span>
          </h5>
          <p class="card-text">
            {!! $lecture->description !!}
            
            {{-- XSS --}}
            {{-- leidžia atspausdinti html tagus --}}
          </p>
          <a href="{{ route('lectures.edit', $lecture->id)   }}" class="btn btn-primary">Redaguoti</a>

          <form action="{{ route('lectures.destroy', $lecture->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit">Trinti</button>
          </form>
          {{-- <a href="{{ route('lectures.destroy', $lecture->id) }}">Trinti</a> --}}
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
