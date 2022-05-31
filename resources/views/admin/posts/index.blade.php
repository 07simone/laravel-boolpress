


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
                    <th>
                        <a href="{{route('admin.posts.create')}}">
                            <button class="btn btn-warning">
                                Crea Nuovo Post
                            </button>
                        </a>
                    </th>
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
                        <form action="{{route("admin.posts.destroy", $post)}}" method="POST" class="post-form-destroyer" post-title="{{$post->title}}">
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

@endsection
