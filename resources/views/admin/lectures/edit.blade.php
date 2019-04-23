@extends('layouts/app')

@section('content')

<div class="container">
  <div class="row">
    @if(session('message'))
      {{ session('message') }}
    @endif
    <div class="col-12">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
    <div class="col-12">
    <h1>Lectures (Editing)</h1>

    <form action="{{ route('lectures.update', $lecture->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name"
        value="{{ old('name', $lecture->name) }}">
      </div>
      <div class="form-group">
        <label for="name">Description</label>
        <textarea name="description" class="form-control" rows="8" cols="30">{{ old('description', $lecture->description)}}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
  </div>
</div>

@endsection
