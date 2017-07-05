<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'othername' => 'required|string|max:255',
            'dob' => 'required|string|date',
            'gender' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'programme' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'studentid' => 'required|string|max:255',
        ];
    }
}
