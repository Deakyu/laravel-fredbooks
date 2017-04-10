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
        'photo',
        'subject',
        'course',
        'course_title',
        'instructor',
        'book_dependancy',
        'edition'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getPhotoAttribute($value) {
        return $this->directory . $value;
    }

    public function statusInWords() {
        $result = "";
        switch ($this->status) {
            case '1':
                $result = "Very Bad";
                break;
            case '2':
                $result = "Bad";
                break;
            case '3':
                $result = "Okay";
                break;
            case '4':
                $result = "Good";
                break;
            case '5':
                $result = "Very Good";
                break;
            default:
                $result = "error";
        }
        return $result;
    }
}
