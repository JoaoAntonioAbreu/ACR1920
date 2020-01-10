@extends('layouts.app')

@section('title', '| Edit movie')

@section('content')

<div class="row text-center">
    <div class="col-md-12">
        <h1>Update {{$movie->title}}</h1>

    <form method="POST" action="{{ route('movies.update', $movie->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div>
            <input type="text" name="title" class="form-control" value="{{$movie->title}}" >
        </div>
        <div>
            <input type="text" name="trailer" class="form-control" value="{{$movie->trailer}}" >
        </div>
        <div>
            <input  type="text"name="year" class="form-control"  value="{{$movie->year}}" >
        </div>
        <div>
            <input type="text" name="genre"  class="form-control"  value="{{$movie->genre}}" >
        </div>
        <div>
            <input type="text" name="rating" class="form-control" value="{{ $movie->rating}}" >
        </div>
        <div>
            <input type="text" name="description"  class="form-control" value="{{ $movie->description}}" >
        </div>
        <div>
            <input id="image" type="file" class="form-control" name="image" value="{{ $movie->image}}">
        </div>
        <div>
            <a href="{{ route('movies.update', $movie->id) }}" class="btn btn-success btn-block">Confirm</a>

            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-danger btn-block">Cancel</a>
        </div>
    </form>
</div>
</div>
    @if ($errors->any())
        <div class="notification is-danger">
            <ul>

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
