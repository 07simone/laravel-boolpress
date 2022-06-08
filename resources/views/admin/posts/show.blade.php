@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 alert-success">
                @if (session('message'))
                    {{-- questo message è quello presente nel controller con la with --}}
                    <div>
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="col-12">
                <div class="card" style="width: 18rem;">
                    @if (str_starts_with($post->img, 'http://') || str_starts_with($post->img, 'https://'))
                        {{-- controlla se l'url presente all'interno del post inizia con http se è cosi allora è un immagine con lo storage, altrimenti se iniza con https è un link --}}
                        <img src="{{ $post->img }}" class="card-img-top" alt="...">
                    @else
                        <img src=" {{ asset('/storage') . '/' . $post->img }}" class="card-img-top" alt="...">
                        {{-- inseriamo l'immagine nuova nel singolo post --}}
                    @endif
                    <div class="card-body">
                        <h1 class="card-title">{{ $post->Titolo }}</h1>
                        <h5 class="card-title">{{ $post->Autore }}</h5>
                        <p class="card-text">{{ $post->Descrizione }}</p>
                        @foreach ($post->categories as $category)
                            <span class="text">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
