<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $category = $this->route('category');
        $id = $category ? $category->id : NULL;
        return [
            'name' => "required|max:255|unique:categories,name,$id"
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O :attribute é requerido',
            'unique' => 'O :attribute digitado está em uso'
        ];
    }

    public function attributes()
    {
        return [
            'name' => "nome"
        ];
    }
}
