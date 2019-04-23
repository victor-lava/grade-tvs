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
    <h1>Grade (Creating)</h1>

    <form action="{{ route('grades.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="grade">Grade</label>
        <input type="text" class="form-control" id="grade" name="grade" value="{{ old('grade') }}">
      </div>
      <div class="form-group">
        <label for="name">Students</label>
        <select class="" name="student_id">
          @foreach($students as $student)
          <option value="{{ $student->id }}"{{ $student->id == old('student_id') ? ' selected' : '' }}>
            {{ $student->name }}
            {{ $student->surname }}
          </option>
          @endforeach
        </select>
        {{-- <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}"> --}}
      </div>
      <div class="form-group">
        <label for="name">Lectures</label>
        <select class="" name="lecture_id">
          @foreach($lectures as $lecture)
          <option value="{{ $lecture->id }}"{{ $lecture->id == old('lecture_id') ? ' selected' : '' }}>
            {{ $lecture->name }}
          </option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
  </div>
</div>

@endsection
