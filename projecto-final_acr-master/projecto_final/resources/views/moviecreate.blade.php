@extends('layouts.app')

@section('content')
<h1>Create a new movie</h1>

    <form method="POST" action="/moviecreate/store" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
        <input type="text" name="title" class="form-control" placeholder="Movie title" required>
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
            <button type="submit">Create Article</button>
        </div>
    </form>
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
