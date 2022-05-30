@extends('layouts.app')

@section('content')
    <h1>
        Modifica il post
    </h1>
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="author">Autore</label>
        <input type="text" name="Autore" id="author" value="{{$post->Autore}}">
        @error('name')
            <div class="alert">
                {{$message}}
            </div>
        @enderror
        <br>
        @foreach ($categories as $category)
            <label for="category">{{$category->name}}</label>
            <input type="checkbox" name="category[]" id="category" value="{{$category->id}}" {{ $post->categories->contains($category) ? 'checked' : '' }}>
        @endforeach
        @error('name')
            <div class="alert">
                {{$message}}
            </div>
        @enderror
        <br>
        <label for="content">Titolo</label>
        <input type="text" name="Titolo" id="title" value="{{$post->Titolo}}">
        @error('name')
            <div class="alert">
                {{$message}}
            </div>
        @enderror
        <br>
        <label for="content">Img</label>
        <input type="text" name="img" id="image" value="{{$post->img}}">
        @error('name')
            <div class="alert">
                {{$message}}
            </div>
        @enderror
        <br>
        <label for="content">Description</label>
        <input type="text" name="Descrizione" id="title" value="{{$post->Descrizione}}">
        @error('name')
            <div class="alert">
                {{$message}}
            </div>
        @enderror
        <br>
        <label for="content">Date</label>
        <input type="text" name="Data" id="date" value="{{$post->Data}}">
        @error('name')
            <div class="alert">
                {{$message}}
            </div>
        @enderror
        <br>
        <button type="submit">Inserisci il nuovo post</button>
    </form>
@endsection
