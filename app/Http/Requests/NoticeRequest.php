<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'post_title' => 'required|string|max:255',
            'post_category' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'group' => 'required|string|max:255',
            'date' => 'required|date|max:255',
        ];
    }
}
