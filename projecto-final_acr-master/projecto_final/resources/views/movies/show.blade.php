@extends('layouts.app')
@section('content')
<div class="row text-center">
<div class="container">
    <div >
      <div class="row" >
         <div class="row col-lg-10">
            <iframe width="100%" height="450px" src="{{$movie->trailer}}" frameborder="0" allowfullscreen></iframe>
         </div>
         <div class="col-lg-2 ">
            <dl class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{$movie->created_at}}</dd>
            </dl>
            <dl class="dl-horizontal">
               <dt>Last Updated At:</dt>
               <dd>{{$movie->created_at}}</dd>
           </dl>
            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary btn-block">Edit</a>

            <a href="{{ route('movies.destroy', $movie->id) }}" class="btn btn-danger btn-block">Delete</a>

        </div>
        </div>

        <div class="card-body">
          <h4 class="card-title">{{$movie->title}}</h4>
          <div class="row col-log-10">
            <div class="col-lg-2">
                <img class="" src={{$movie->image}} alt=""width="150" height="175" >
            </div>
            <div class="col-lg-6 dl-horizontal text-left" >
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


 @foreach($movie->reviews as $review)
<div>{{$review->$body}}</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <th>$review->creator</th>
            <th>$review->body</th>
            <a href="{{ route('review.edit', $movie->id, $review->id) }}" class="btn btn-default">edit </a>
            <a href="{{ route('review.destroy', $movie->id, $review->id) }}" class="btn btn-default">delete</a>
            </thead>
        </table>
    </div>
</div>
@endforeach






@endsection
