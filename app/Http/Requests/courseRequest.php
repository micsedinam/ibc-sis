<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class courseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'c_code' => 'required|string|max:3|unique',
            'c_name' => 'required|string|max:30',
            'credit_hrs' => 'required|string|max:2',
            'semester' => 'required|string|max:10',
            'year' => 'required|string|max:3'
        ];
    }
}
