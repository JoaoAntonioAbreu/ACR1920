<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('welcome')->withTasks([
            'insert the cards',
            'show the cards',
            'sort the cards',
            'set the users',
            'make decks',
            'cry in a corner'
        ]);
    }

    public function cards(){
        return view('cards');
    }

    public function about(){
        return view('about');
    }
}
