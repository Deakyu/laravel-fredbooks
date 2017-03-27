<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public $directory = "/images/";

    protected $fillable = [
        'user_id',
        'isbn',
        'title',
        'author',
        'desirable_price',
        'status',
        'photo'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getPhotoAttribute($value) {
        return $this->directory . $value;
    }
}
