@extends('layouts.admin')

@section('content')
    <h1>Lista dei Posts</h1>
    <a class="btn btn-success" href="{{ route('admin.posts.create') }}">Crea</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Azione</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postsArray as $curPost)
                <tr>
                    <th scope="row">{{ $curPost->id }}</th>
                    <td>{{ $curPost->title }}</td>
                    <td>{{ $curPost->slug }}</td>
                    <td> <a class='btn btn-info' href="{{ route('admin.posts.show',['post'=>$curPost->slug])}}">Dettagli</a>
                     <a class='btn btn-info' href="{{ route('admin.posts.edit',['post'=>$curPost->slug])}}">Modifica</a>
                        <form action="{{route('admin.posts.destroy', ['post'=>$curPost->slug])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
