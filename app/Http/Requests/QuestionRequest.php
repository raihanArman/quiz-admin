<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            //
            'question' => 'required|max:255',
            'a' => 'required|max:255',
            'b' => 'required|max:255',
            'c' => 'required|max:255',
            'd' => 'required|max:255',
            'answer' => 'required|max:255'
        ];
    }
}