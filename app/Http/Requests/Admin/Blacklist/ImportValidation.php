<?php

namespace App\Http\Requests\Admin\Blacklist;

use Illuminate\Foundation\Http\FormRequest;

class ImportValidation extends FormRequest
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
            'import_file'=> 'mimes:xlsx, xls'
        ];
    }
}
