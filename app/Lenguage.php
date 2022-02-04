<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lenguage extends Model
{
    //Relation with books
    public function books() {
        return $this->belongsToMany('App\Book',);
    }
}
