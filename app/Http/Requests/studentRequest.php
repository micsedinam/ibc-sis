<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentRequest extends FormRequest
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
            'firstname'  => 'required|string', 
            'surname' => 'required|string', 
            'othername'  , 
            'dob' => 'required|date', 
            'gender' => 'required', 
            'phone' => 'required|numeric|min:10', 
            'email' => 'required|unique:users', 
            'address' => 'required', 
            'class'=> 'required', 
            'studentid' => 'required|unique:users',
        ];
    }
}
