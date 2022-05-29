@extends('layouts.app')

@section('content')
<h1>
    creazione nuova auto
</h1>
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
<form action="{{ route('admin.categories.store') }}" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    @error('name')
        <div class="alert">
            {{$message}}
        </div>
    @enderror
    <br>
    <label for="img">Immagine da inserire</label>
    <input type="text" name="img" id="img">
    @error('name')
        <div class="alert">
            {{$message}}
        </div>
    @enderror
    <br>
    <button type="submit">Inserisci la nuova categoria</button>
</form>
@endsection
