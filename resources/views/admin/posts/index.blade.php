@extends('layouts.admin')

@section('content')
    <h1>Lista dei Posts</h1>

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
                    <td>  </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
