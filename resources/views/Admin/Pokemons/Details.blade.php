@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $pokemon->Name}}</b></h4>
                        <p class="card-text"><b>Generation: </b> {{ $pokemon->Generation }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Type 1: </b> {{ $pokemon->Type_1 }}</li>
                        <li class="list-group-item"><b>Type 2: </b> {{ $pokemon->Type_1 }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/pokemons/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/pokemons/edit/{{ $pokemon->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/pokemons/delete/{{ $pokemon->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
