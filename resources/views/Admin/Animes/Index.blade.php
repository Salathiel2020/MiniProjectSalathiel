@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Animes</h1>
                <a class="text-right" href="/admin/animes/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Type</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($animes as $anime)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $anime->name }}</td>
                        <td>{{ $anime->genre }}</td>
                        <td>{{ $anime->type }}</td>
                        <td>
                            <a href="/admin/animes/{{ $anime->_id }}">Details</a> |
                            <a href="/admin/animes/edit/{{ $anime->_id }}">Edit</a> |
                            <a href="/admin/animes/delete/{{ $anime->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection