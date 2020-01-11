@extends('layouts.app')
@section('content')

    <div class="">
        <div class="row" >
            <div class="d-flex col-sm-1 align-self-start">

            </div>
            <div class=" d-flex p-2 col-sm-9  flex-fill bd-highlight justify-content-center align-self-start ">
                <iframe class="embed-responsive-item" width="95%" height="500px" src="{{$movie->trailer}}" frameborder="0" allowfullscreen></iframe>
            </div>




            <div class="d-flex flex-column bd-highlight mb-3 align-self-start justify-content-start">


                <dl class="p-2 bd-highlight">
                    <a href="{{ route('movies.index', $movie->id) }}" class="btn btn-secondary btn-block">Back</a>
                </dl>
                @can('edit',$movie)
                <div class="p-2 bd-highlight">
                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary btn-block">Edit</a>
                </div>
                @endcan
                @can('destroy',$movie)
                <div class="p-2 bd-highlight">
                    <form method="POST" action="{{ route('movies.destroy', $movie->id) }}">
                    <input type="submit" value="Delete" class="btn btn-danger btn-block">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    {{ method_field('DELETE') }}
                    </form>
                </div>
                @endcan
                <div class="p-2 bd-highlight text-truncate">
                    <dt>Featured Movie:</dt>
                    <a href="{{ route('movies.show', $featured->id)}}" class="btn btn-secondary btn-block" style="min-width:19ch; max-width: 19ch"> {{$featured->title}}</a>
                </div>
            </div>
        </div>
    </div>

<div class="d-flex justify-content-center">
    <h1 class="card-title">{{$movie->title}}</h4>
</div>
    <div class="col-sm-12 row  ">
        <div class="col-sm-2 ">
            <img class="rounded" src={{$movie->image}} alt=""width="150" height="175" >
        </div>
        <div class="col-sm-8 border border-dark rounded shadow" >
                <p class="card-text">{{$movie->description}}</p>
        </div>
        <div class="col-sm-2 border border-dark rounded shadow ">
            <p>Year: <span class="badge badge-secondary">{{$movie->year}}</span></p>
            <p>Genre: <span class="badge badge-secondary">{{$movie->genre}}</span></p>
            <p>Rating:<span class="badge badge-secondary"> {{$movie->rating}}</span></p>
        </div>



    </div>

@if (Auth()->user())
<div class="container">
    <div id="review-form" class="" >
        <form method="POST" class="  flex-column d-flex p-2 flex-grow-1 bd-highlight justify-content-center" action="{{ route('reviews.store', $movie->id) }}" >
            {{ csrf_field() }}
                <label class="d-flex p-2 flex-grow-1 bd-highlight justify-content-center"for="review">Enter a Review: </label>
                <textarea aria-describedby="emailHelp" placeholder="Enter review"  id="review" name="review"  class="form-control"  rows="3"></textarea>
                <button type="submit" class="btn btn-success btn-block">Post Review</button>
      </form>
    </div>
</div>
 @endif
<div class="container">
    <div>

        @foreach ($movie->reviews as $review)
        <div class=" d-flex flex-column d-inline-flex p-2 bd-highlight  border border-dark rounded">

                <h5>{{$review->owner->name}} Says:</h5>

        </div>

           <div class="d-flex p-2 bd-highlight border border-dark rounded justify-content-start">

            <p >{{$review->body}}</p>
           </div>
           <br>
        @endforeach

    </div>

</div>
@endsection



