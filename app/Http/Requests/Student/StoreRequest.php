<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|max:200|unique:students,email',
            'image' => 'image|nullable',
            'school_classes_id' => 'required',
        ];
    }
}
