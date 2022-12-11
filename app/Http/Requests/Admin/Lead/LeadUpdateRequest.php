<?php

namespace App\Http\Requests\Admin\Lead;

use Illuminate\Foundation\Http\FormRequest;

class LeadUpdateRequest extends FormRequest
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
            'loan_account_number' => ['required'],
            'follow_up_at_bs' => ['required', 'date'],
            'user_id' => ['nullable'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'loan_account_number.required' => 'The Loan Account Number field is required',
            'follow_up_at_bs.required' => 'The Follow Up date field is required',
            'follow_up_at_bs.date' => 'The Follow Up date field must be in date',
        ];
    }
}
