@extends('layouts.app')

@section('content')
<!-- Jumbotron Header -->
<header class="jumbotron my-4">
    <h1 class="display-3">Movie Central</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
  </header>

<div class="row text-center">
@foreach ($movies as $movie)

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="{{$movie->image}}" alt="" width="500" height="325">
            <div class="card-body">
              <h4 class="card-title">{{$movie->title}}</h4>
            </div>
            <div class="card-footer">
              <a href="movies/{{$movie->id}}" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
        @endforeach
    </div>







@endsection

