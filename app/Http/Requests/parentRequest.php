<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class parentRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'othername' => 'string|max:255',
            'dob' => 'required|date|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'required|email|max:1000',
            'phone' => 'required',
            'address' => 'required|string|max:255',
        ];
    }
}
