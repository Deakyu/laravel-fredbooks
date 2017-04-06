<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title'=>'required',
            'author'=>'required',
            'isbn'=>'required',
            'desirable_price'=>'required',
            'status'=>'required',
            'subject'=>'required',
            'course'=>'required',
            'course_title'=>'required',
            'instructor'=>'required',
            'book_dependancy'=>'required'
        ];
    }
}
