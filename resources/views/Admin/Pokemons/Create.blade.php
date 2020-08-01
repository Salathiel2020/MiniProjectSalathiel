@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/pokemons/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input class="form-control" type="text" name="Name" id="Name">
                    </div>
                    <div class="form-group">
                        <label for="Type_1">Type_1</label>
                        <input class="form-control" type="text" name="Type_1" id="Type_1">
                    </div>
                    <div class="form-group">
                        <label for="Type_2">Type_2</label>
                        <input class="form-control" type="text" name="Type_2" id="Type_2">
                    </div>
                    <div class="form-group">
                        <label for="Generation">Generation</label>
                        <input class="form-control" type="text" name="Generation" id="Generation">
                    </div>
                    <a href="/admin/pokemons/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection