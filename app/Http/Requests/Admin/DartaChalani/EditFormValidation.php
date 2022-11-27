<?php

namespace App\Http\Requests\Admin\DartaChalani;

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
            'record_type' => 'required|string',
            'register_number' => 'required|string',
            'fiscal_year' => 'required|string',
            'subject' => 'required|string',
            'office_or_person' => 'required|string',
            'registered_at'   => 'required | date_format:Y-m-d|before:tomorrow',
        ];
    }
}
