<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class ResultValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [         
            'subjects.*' => 'required',
            'tests.*' => 'required',
        ];
    }
    public function messages(){
        
        return [
            'subjects.*.required' => 'Vyplň všetky polia',
            'tests.*.required' => 'Vyplň všetky polia',
        ];
    }
}
