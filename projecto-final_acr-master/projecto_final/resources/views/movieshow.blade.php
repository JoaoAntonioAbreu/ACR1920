@extends('layouts.app')
@section('content')
<div class="row text-center">
<div class="container">
    <div class="col-lg-12">
      <div >
         <div >
            {{-- <iframe width="1000" height="450" src="{{$movie->trailer}}" frameborder="0" allowfullscreen></iframe> --}}
            <img src={{$movie->image}} alt="" width="1000" height="450">
        </div>
        <div class="card-body">
          <h4 class="card-title">{{$movie->title}}</h4>
          <div class="row">
            <div class="col-lg-3">
                <img class="" src={{$movie->image}} alt=""width="150" height="175" >
            </div>
            <div class="col-lg-7 text-left" >
                 <p class="card-text">{{$movie->description}}</p>
            </div>
            <div class="col-lg-2 text-left">
                <p>Year: {{$movie->year}}</p>
                <p>Genre: {{$movie->genre}}</p>
                <p>Rating: {{$movie->rating}}</p>

            </div>
            </div>
        </div>
      </div>
    </div>
</div>
<div>
{{-- <form method="POST" action="{{ route('review-store'), $movie->id }}">
        {{ csrf_field() }}
        <div>
        <input type="text" name="body" class="form-control" placeholder="Comment" required>
        </div>
        <div>
            <button type="submit">submit</button>
        </div>
    </form>
</div> --}}
{{ Form::open(array('route' => array('movieshow.$movie.review.store', $movie_id))) }}
{{ Form::close() }}
 @foreach($movie->reviews as $review)
<div>{{$review->$body}}</div>
@endforeach





{{-- <form action="{{ route('movie) }}" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
        <div class="col-md-6">
            <input id="title" type="text" class="form-control" name="title" value="{{ old('title', movie()->title) }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="year" class="col-md-4 col-form-label text-md-right">Year</label>
        <div class="col-md-6">
            <input id="year" type="text" class="form-control" name="year" value="{{ old('year', movie()->year) }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="genre" class="col-md-4 col-form-label text-md-right">Year</label>
        <div class="col-md-6">
            <input id="genre" type="text" class="form-control" name="genre" value="{{ old('genre', movie()->genre) }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="rating" class="col-md-4 col-form-label text-md-right">Year</label>
        <div class="col-md-6">
            <input id="rating" type="text" class="form-control" name="rating" value="{{ old('rating', movie()->rating) }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">description</label>
        <div class="col-md-6">
            <input id="description" type="text" class="form-control" name="description" value="{{ old('description', movie()->description) }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
        <div class="col-md-6">
            <input id="image" type="file" class="form-control" name="image">
            @if (movie()->image)
                <code>{{ movie()->image }}</code>
            @endif
        </div>
    </div>
    <div class="form-group row mb-0 mt-5">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
    </div>
</form> --}}
@endsection
