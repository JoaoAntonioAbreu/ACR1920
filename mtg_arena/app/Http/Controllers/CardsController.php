<?php

namespace App\Http\Controllers;

use App\Cards;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function show(){
        $allCards = Cards::all();
        return view('cards',['allCards'=>$allCards]);
    }

    public function sortCost(){
        $costCards = Cards::all();
        return view('cards',['allCards'=>$costCards->sortBy('manaCost')]);
    }
}
