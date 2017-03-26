<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'desirable_price',
        'status'
    ];

    public function courses() {
        return $this->belongsToMany('App\Course');
    }
}
