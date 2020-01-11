@extends('layouts.app')
@section('title', '| All movies')
@section('content')
<!-- Jumbotron Header -->

<div class="jumbotron shadow jumbotron-fluid bg-light text-dark border border-black rounded-pill">
  <div class="container">
    <h1 class="display-4">Movie_Central</h1>

  </div>
</div>
<!-- Page Content -->
<div class="container">


  <!-- Page Features -->

  <div class="d-flex justify-content-center">
    @foreach ($movies ?? '' as $movie)
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
        <img class=" rounded card-img-top" src="{{$movie->image}}" width="500" height="325">
        <div class="card-body">
          <h4 class="card-title">{{$movie->title}}</h4>
          <p class="card-text text-truncate">{{$movie->description}}</p>
        </div>
        <div class="d-flex justify-content-center card-footer">
          <a href="{{ route('movies.show', $movie->id)}}" class="btn btn-primary">Find Out More!</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="d-flex justify-content-center py-5 bg-dark">
    <div class="d-flex flex-column bd-highlight mb-1 align-self-start justify-content-start">


    @can('create',$movie)
    <a href="{{ route('movies.create')}}" class="btn btn-lg btn-block btn-primary">Create</a>
    @endcan
    <div class="d-flex justify-content-center">
      {!! $movies->links(); !!}
    </div>

  <!-- /.container -->
</footer>

@endsection
