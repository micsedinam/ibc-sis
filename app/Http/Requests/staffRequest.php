<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class staffRequest extends FormRequest
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
            'dob' => 'required|string|date|before:20 years ago',
            'gender' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:staff',
            'address' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'staffid' => 'required|string|max:255',
        ];
    }
}
