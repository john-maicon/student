<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

    function rules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|max:200|unique:students,email,'. $this->student->id,
            'image' => 'image|nullable',
            'school_classes_id' => 'required',
        ];
    }
}
