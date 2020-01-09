@extends('layouts.app')



@section('content')

<div class="row text-center">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create a new movie</h1>

    <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <input type="text" name="title" class="form-control" placeholder="Movie title" required>
        </div>
        <div>
            <textarea name="trailer" class="form-control" placeholder="trailer" required></textarea>
        </div>
        <div>
            <textarea name="year" class="form-control" placeholder="year" required></textarea>
        </div>
        <div>
            <textarea name="genre"  class="form-control" placeholder="genre content" required></textarea>
        </div>
        <div>
            <textarea name="rating" class="form-control" placeholder="rating" required></textarea>
        </div>
        <div>
            <textarea name="description"  class="form-control" placeholder="description" required></textarea>
        </div>
        <div>
            <input id="image" type="file" class="form-control" name="image">
        </div>
        <div>
            <button type="submit">Insert Movie</button>
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
