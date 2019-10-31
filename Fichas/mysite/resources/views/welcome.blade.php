@extends("layout")

@section('title','home')

@section('content')
<h1>Welcome to {{ $text }} newbs<h1>

    <ul>
        <h1>You have to: </h1>
        @foreach ($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>
@endsection

