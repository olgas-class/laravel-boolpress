@extends('layouts.admin')

@section('content')
  <h1>Create Post</h1>
  @include('partials.errors')
  <form action="{{ route('admin.posts.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Contenuto</label>
      <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
    </div>

    <button class="btn btn-success" type="submit">Salva</button>
  </form>
@endsection
