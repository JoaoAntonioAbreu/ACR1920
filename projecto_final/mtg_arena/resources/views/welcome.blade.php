
@extends('layout')

@section('title')
        first page
@endsection



@section('content')
    <h1>card stuff</h1>

    @foreach ($tasks as $task)
        <li>{{$task}}</li>
    @endforeach
@endsection
