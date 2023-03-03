<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class PersonalValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "division" => 'required',
            "first_name" => 'required',
            "last_name" => 'required',
            "date_of_birth" => 'required',
            "email" => 'required|unique:applicant',
        ];
    }
    public function messages(){
        
        return [
            'division.required' => 'Odbor nebol zvolený',
            'first_name.required' => 'Meno nebolo zadané',
            'last_name.required' => 'Priezvisko nebolo zadané',
            'date_of_birth.required' => 'Dátum narodenia nebol zadaný',
            'email.required' => 'E-mail nebol zadaný',
            'email.unique' => 'Tento E-mail sa už používa'
        ];
    }
}
