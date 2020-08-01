@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/animes/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="animeid" id="animeid" value="{{ $anime->_id }}">
                <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $anime->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input class="form-control" type="int" name="genre" id="genre" value="{{ $anime->genre }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input class="form-control" type="int" name="type" id="type" value="{{ $anime->type }}" disabled>
                    </div>
                    <a href="/admin/animes/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection