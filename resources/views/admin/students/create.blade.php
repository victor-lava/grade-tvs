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
    <h1>Student (Creating)</h1>

    <form action="{{ route('students.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
      </div>
      <div class="form-group">
        <label for="name">Surname</label>
        <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}">
      </div>
      <div class="form-group">
        <label for="name">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
      </div>
      <div class="form-group">
        <label for="name">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
  </div>
</div>

@endsection
