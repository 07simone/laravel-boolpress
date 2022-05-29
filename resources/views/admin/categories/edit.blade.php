@extends('layouts.app')

@section('content')
    <h1>
        Edit nuovo post
    </h1>
    <div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                        <div>
                            {{ session('message') }}
                        </div>
                    @endif
            </div>
        </div>
    </div>

    <form action="{{ route("admin.categories.update",$category) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">
        <br>
        <label for="img">immagine</label>
        <input type="text" name="img" id="img" value="{{ $category->img }}">
        <br>
        <button type="submit">modifica la categoria</button>

    </form>

@endsection

