<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //Mass assignment

    protected $fillable = [
        'title',
        'author',
        'slug',
        'content',
    ];
}
