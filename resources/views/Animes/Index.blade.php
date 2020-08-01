@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Animes</h1>
                <div class="row">
                        @foreach($animes as $anime)
                        <div class="card col-md-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $anime->name }}</h5>
                                <p class="card-text">Genre: {{ $anime->genre }}</p>
                                <p class="card-text">{{ $anime->type }}</p>
                                <a href="/animes/{{ $anime->_id }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12 ">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mx-auto" role="group" aria-label="First group">
                                    @php 
                                        $cpage = request('pg') == 0 ? 1 : request('pg');
                                    @endphp

                                    <a href ="/animes?pg={{ $cpage - 1 }}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : '' }}">&lt</a>
                                    @for ($i = 1; $i <= ceil($animeCount/500); $i++)
                                    <a href="/animes?pg={{$i}}" class="btn btn-secondary {{ $cpage == $i ? 'disabled' : ''}}">{{$i}}</a>
                                    @endfor
                                    <a href="/animes?pg={{ $cpage + 1}}" class="btn btn-secondary {{$cpage == ceil($animeCount/500) ? 'disabled' : '' }}">&gt</a>
                                </div>
                          </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
