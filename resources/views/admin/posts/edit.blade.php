@extends('layouts.admin')

@section('content')
  <h1>Update Post</h1>

  @include('partials.errors')

  <form action="{{ route('admin.posts.update', ['post' => $post->slug]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Contenuto</label>
      <textarea class="form-control" id="content" name="content" rows="3">
            {{ old('content', $post->content) }}
        </textarea>
    </div>

    <div>
      <label for="cover_image">Immagine di copertina</label>
      <input type="file" name="cover_image" id="cover_image">
    </div>
    <div>
      <h4>Preview dell'immagine</h4>
      <img src="{{ asset('storage/' . $post->cover_image) }}" alt="">
    </div>

    <button class="btn btn-success" type="submit">Salva</button>
  </form>
@endsection
