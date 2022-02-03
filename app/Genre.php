<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //Relation with books
    public function books() {
        return $this->hasMany('App\Genre');
    }
}
