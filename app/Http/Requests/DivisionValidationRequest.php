<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DivisionValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:division',
            'student_count' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nebol zadaný názov',
            'name.unique' => 'Odbor s týmto názvom už existuje',
            'student_count' => 'Nebol zadaný počet študentov',
        ];
    }
}
