<?php

namespace CodePub\Http\Requests;

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

            $authorId = $this->route('book');

            if($authorId == Auth::getUser()->id){
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
        $id = $this->route('book');

        return [
            'title' => "required|max:255|unique:books,title,$id",
            'subtitle' => "required|max:255",
            'price' => "required|numeric",
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id'
        ];
    }

    public function messages()
    {
        $result = [];
        $categories = $this->get('categories',[]);
        $count = count($categories);
        if(is_array($categories) && $count > 0){
            foreach(range(0, $count-1) as $value){
                $field = \Lang::get('validation.attributes.categories_*',[
                    'num' => $value + 1
                ]);
                $message = \Lang::get('validation.exists',[
                    'attribute' => $field
                ]);
                $result["categories.$value.exists"] = $message;
            }
        }

        return $result;
    }
}
