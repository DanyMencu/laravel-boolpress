<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //Mass assignment
    protected $fillable = [
        'title',
        'genre_id',
        'author',
        'slug',
        'content',
    ];

    //Relation with genres
    public function genre() {
        return $this->belongsTo('App\Genre');
    }

    //Relation with languages
    public function languages() {
        return $this->belongsToMany('App\Language');
    }
}
