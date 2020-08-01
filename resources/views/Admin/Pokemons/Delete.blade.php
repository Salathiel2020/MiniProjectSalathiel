@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/pokemons/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="pokemonid" id="pokemonid" value="{{ $pokemon->_id }}">
                <div class="form-group">
                        <label for="Name">Name</label>
                        <input class="form-control" type="text" name="Name" id="Name" value="{{ $pokemon->Name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Type_1">Type_1</label>
                        <input class="form-control" type="int" name="Type_1" id="Type_1" value="{{ $pokemon->Type_1 }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Type_2">Type_2</label>
                        <input class="form-control" type="int" name="Type_2" id="Type_2" value="{{ $pokemon->Type_2 }}" disabled>
                    </div>
                    <a href="/admin/pokemons/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection