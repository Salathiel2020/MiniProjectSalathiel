@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Pokemons</h1>
                <a class="text-right" href="/admin/pokemons/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type 1</th>
                        <th scope="col">Type 2</th>
                        <th scope="col">Generation</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pokemons as $pokemon)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $pokemon->Name }}</td>
                        <td>{{ $pokemon->Type_1 }}</td>
                        <td>{{ $pokemon->Type_2 }}</td>
                        <td>{{ $pokemon->Generation }}</td>
                        <td>
                            <a href="/admin/pokemons/{{ $pokemon->_id }}">Details</a> |
                            <a href="/admin/pokemons/edit/{{ $pokemon->_id }}">Edit</a> |
                            <a href="/admin/pokemons/delete/{{ $pokemon->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection