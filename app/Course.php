<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'crn',
        'subject',
        'course',
        'title',
        'instructor',
        'book_dependence'
    ];

    public function books() {
        return $this->belongsToMany('App\Book');
    }
}
