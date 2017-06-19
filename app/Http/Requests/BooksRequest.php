<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BooksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->route()->getAction()['as'] == 'books.store'){
            return true;
        }

        if($this->route()->getAction()['as'] == 'books.update'){

            $book = $this->route('book');

            if($book->author_id == Auth::getUser()->id){
                return true;
            }
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $book = $this->route('book');
        $id = $book ? $book->id : NULL;

        return [
            'title' => "required|max:255|unique:books,title,$id",
            'subtitle' => "required|max:255",
            'price' => "required|numeric"
        ];
    }
}
