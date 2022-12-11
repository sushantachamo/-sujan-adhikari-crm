<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class EditFormValidation extends FormRequest
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
            'caption_title' => 'required | max:100',
            'caption_body' => 'max:100',
            'status' => 'required | integer',
            // 'image'   => 'required | image',
            'alt_text' => '',
        ];
    }
}
