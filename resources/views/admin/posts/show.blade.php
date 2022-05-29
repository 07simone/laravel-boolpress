@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 18rem;">
                <img src="{{$post ->img}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title">{{$post ->Titolo}}</h1>
                    <h5 class="card-title">{{$post ->Autore}}</h5>
                    <p class="card-text">{{$post ->Descrizione}}</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

