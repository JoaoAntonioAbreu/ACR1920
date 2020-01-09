<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = []; # colocar campos com excepcoes (nao podem ser preenchidos),


    public function reviews(){
      return $this->hasMany(Review::class);
    }
    public function current(){
        return $this;
    }
}
