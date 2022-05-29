


@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            @if (session('message'))
                    <div>
                        {{ session('message') }}
                    </div>
                @endif
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>titolo</th>
                    <th>autore</th>
                    <th>Categories</th>
                    <th>descrizione</th>
                    <th>data</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @forelse ( $posts as $post)
                <tr>
                    <td>
                        <a href="{{route('admin.posts.show',$post)}}">
                        {{$post->Titolo}}
                        </a>
                    </td>
                    <td>
                        {{$post->Autore}}
                    </td>

                    <td>
                        @foreach ($post->categories as $category)
                            {{$category->name}}
                        @endforeach
                    </td>
                    <td>
                        {{$post->Descrizione}}
                    </td>

                    <td>
                        {{$post->Data}}
                    </td>
                    <td class="d-flex">
                        <a href="{{ route("admin.posts.edit", $post) }}" class="btn btn-success" >Edit</a>
                        <form action="{{route('admin.posts.destroy', $post)}}" method="POST" class="post-form-destroyer" post-title="{{$post->title}}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"  class="btn btn-danger">cancella</a>
                        </form>
                    </td>

                </tr>
                @empty

            @endforelse
    </div>
    <div class="col-12">
        {{$posts->links()}}
    </div>
</div>
<div class="col-4 mb-3">
    <div class="card " style="width: 18rem;">
        <img src="{{$post->img}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h1 class="card-title">{{$post->Titolo}}</h1>
            <h5 class="card-title">{{$post->Autore}}</h5>
            <p class="card-text">{{$post->Descrizione}}</p>
            <a href="{{route("admin.posts.show", $post)}}" class="btn btn-primary">Dettagli</a>
        </div>
    </div>
</div>

@endsection
