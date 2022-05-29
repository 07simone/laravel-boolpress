
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
        <div class="col-12">
            <a href="{{route('admin.categories.create')}}">nuovo post</a>
        </div>
            @forelse ( $categories as $category)
                <div class="col-4 mb-3">
                    <div class="card " style="width: 18rem;">
                        <img src="{{$category->img}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h1 class="card-title">{{$category->name}}</h1>
                            <a href="{{route("admin.categories.edit", $category)}}" class="btn btn-secondary">modifica</a>
                            <a href="{{route("admin.categories.show", $category)}}" class="btn btn-primary">Dettagli</a>
                            <form action="{{route("admin.categories.destroy", $category)}}" method="POST" class="btn btn-danger">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">cancella</button>
                            </form>

                        </div>
                    </div>
                </div>
                @empty

            @endforelse
    </div>
    <div class="col-12">
        {{-- {{$category->links()}} --}}
    </div>
</div>


@endsection

