<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class electiveSubjectRequest extends FormRequest
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
            'subjectid' => 'required|string|max255',
            'subject_title' => 'required|string|max255',
            'class' => 'required|string|max255',
            'programme' => 'required|string|max255',
        ];
    }
}
