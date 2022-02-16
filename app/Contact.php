<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //Massassignament
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}
