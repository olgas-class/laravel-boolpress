@extends('layouts.admin')

@section('content')
<h1>Create Post</h1>

<form action="{{ route('admin.posts.update', ['post'=>$post->slug]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenuto</label>
        <textarea class="form-control" id="content" name="content" rows="3">
            {{ $post->content }}
        </textarea>
    </div>

    <button class="btn btn-success" type="submit">Salva</button>
</form>
@endsection