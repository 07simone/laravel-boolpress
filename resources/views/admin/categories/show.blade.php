@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 18rem;">
                <img src="{{ $category ->img}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title"> {{ $category->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

