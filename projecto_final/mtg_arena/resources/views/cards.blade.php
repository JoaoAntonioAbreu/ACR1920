
@extends('layout')
@section('content')
<h1>all cards</h1>
<div >


@foreach ($allCards as $card)

<div class="container">

        <div class="col-lg-4" style="">
                <img src={{ $card->image }}>
        <ul>
            <li> {{ $card->name }} </li>
        </ul>
        </div>

</div>
    @endforeach
@endsection
</div>
