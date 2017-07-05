<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class feesRequest extends FormRequest
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
            'studentid' => 'required|string|max255',
            'term' => 'required|text|max255',
            'academicyear' => 'required|string|max255',
            'amt_due' => 'required|integer|max255',
            'amt_rem' => 'required|integer|max255',
            'amt_paid' => 'required|integer|max255',
        ];
    }
}
