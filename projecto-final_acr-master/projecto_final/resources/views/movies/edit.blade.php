@extends('layouts.app')

@section('title', '| Edit movie')

@section('content')

<div class="row text-center">
    <div class="col-md-12">
        <h1>Update {{$movie->title}}</h1>

    <form method="POST" action="{{ route('movies.update', $movie->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <input type="text" name="title" class="form-control" value="{{ old('title', $movie->title) }}" required>
        </div>
        <div>
            <input name="trailer" class="form-control" value="{{ old('trailer',$movie->trailer) }}" required>
        </div>
        <div>
            <input name="year" class="form-control"  value="{{ old('year',$movie->year) }}" required>
        </div>
        <div>
            <input name="genre"  class="form-control"  value="{{ old('genre',$movie->genre) }}" required>
        </div>
        <div>
            <input name="rating" class="form-control" value="{{ old('rating',$movie->rating) }}" required>
        </div>
        <div>
            <input name="description"  class="form-control" value="{{ old('description',$movie->description)}}" required>
        </div>
        <div>
            <input id="image" type="file" class="form-control" name="image">
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
