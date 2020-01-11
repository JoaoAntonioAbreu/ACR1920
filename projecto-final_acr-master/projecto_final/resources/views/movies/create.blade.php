@extends('layouts.app')

@section('title', '| Edit movie')

@section('content')
<div class="container">
<div class="d-flex justify-content-center p-2 bd-highlight flex-column">
        <div class="p-2 bd-highlight">
             <h1>Insert a Movie :</h1>
        </div>


    <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="p-2 bd-highlight">
            <label class="font-weight-bold" for="">Title: </label>
            <input type="text" name="title" class="form-control" value="Title" >
        </div>
        <div  class="p-2 bd-highlight">
            <label class="font-weight-bold" for="">Trailer: </label>
            <input type="text" name="trailer" class="form-control" value="Trailer" >
        </div>
        <div  class="p-2 bd-highlight">
            <label class="font-weight-bold" for="">Year: </label>
            <input type="number"name="year" class="form-control"  value="Year" >
        </div>
        <div  class="p-2 bd-highlight">
            <label class="font-weight-bold" for="">Genre: </label>
            <select  name="genre" class="form-control" id="exampleFormControlSelect1">
                <option>Action</option>
                <option>Drama</option>
                <option>Comedy</option>
                <option>Sci-fi</option>
                <option>Psychological</option>
              </select>
        </div>
        <div  class="p-2 bd-highlight">
            <label class="font-weight-bold" for="">Rating: </label>
            <input type="number" name="rating" class="form-control" value="Movie" >
        </div>
        <div  class="p-2 bd-highlight">
            <label class="font-weight-bold" for="">Description: </label>
            <input type="text" name="description"  class="form-control" value="Description" >
        </div >
        <div class="p-2 bd-highlight">
            <input id="image" type="file" class="form-control" name="image" value="Image">
        </div>
        <div class="p-2 bd-highlight">
            <button type="submit" class="btn btn-outline-success btn-lg btn-block">Insert Movie</button>
        </div>
    </form>
</div>
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
