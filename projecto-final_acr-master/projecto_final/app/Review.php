<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    public function movies(){
      return $this->belongsTo(Movie::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
      }
}
