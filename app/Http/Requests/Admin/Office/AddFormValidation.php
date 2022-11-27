<?php

namespace App\Http\Requests\Admin\Office;

use Illuminate\Foundation\Http\FormRequest;

class AddFormValidation extends FormRequest
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
            'registration_number' => 'required | max:100',
            'registration_date' => 'required | date_format:Y-m-d',
            'registration_date_bs' => 'required | max:100',
            'register_nikaye' => 'required | max:100',
            'name_en' => 'required | max:100',
            'name_np' => 'required | max:100',
            'province' => 'required | integer',
            'district' => 'required | integer',
            'localgovt' => 'required | integer',
            'ward' => 'required | max:100',
            'tole' => 'required | max:100',
            'former_address' => 'max:100',
            'phone' => '',
            'email' => '',
            'head_office' => 'max:100',
            
            'president_name' => 'required | max:100',
            'manager_name' => 'required | max:100',
            'vice_president_name' => 'required | max:100',
            'secretary' => 'required | max:100',
            'treasurer' => 'required | max:100',
            'loan_coordinator' => 'required | max:100',
            'loan_member_1' => 'required | max:100',
            'loan_member_2' => 'required | max:100',

            'expiration_date' => 'required |date_format:Y-m-d',
            'expiration_date_bs' => 'required | max:100',
            'remarks' => 'max:50',
        ];
    }
}