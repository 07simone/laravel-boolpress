@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12">

                <h1>
                    Crea un nuovo post
                </h1>
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="author">Autore</label>
                    <input type="text" name="Autore" id="Autore">
                    @error('Autore')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    @foreach ($categories as $category)
                        <label for="category">{{ $category->name }}</label>
                        <input type="checkbox" name="category[]" id="category" value="{{ $category->id }}">
                    @endforeach
                    @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <label for="content">Titolo</label>
                    <input type="text" name="Titolo" id="Titolo">
                    @error('Titolo')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <label for="content">Immagine</label>
                    <input type="file" name="img" id="img">
                    @error('img')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <label for="content">Descrizione</label>
                    <input type="text" name="Descrizione" id="Descrizione">
                    @error('Descrizione')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <label for="content">Data</label>
                    <input type="text" name="Data" id="Data">
                    @error('Data')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <button type="submit">Inserisci il nuovo post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
