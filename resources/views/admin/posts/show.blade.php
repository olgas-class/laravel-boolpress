@extends('layouts.admin')

@section('content')
  @include('partials.message-success')
  <h1>{{ $post->title }}</h1>
  <img src="{{ asset('storage/' . $post->cover_image) }}" alt="">
  <p>{{ $post->content }}</p>
  <p>Slug: {{ $post->slug }}</p>
@endsection
