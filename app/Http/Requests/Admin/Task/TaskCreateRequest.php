<?php

namespace App\Http\Requests\Admin\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
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
            'description' => ['required'],
            'follow_up_at_bs' => ['required', 'date'],
            'file' => ['nullable', 'file', 'mimes:doc,pdf,docx']
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
            'follow_up_at_bs.required' => 'The Follow Up date field is required',
            'follow_up_at_bs.date' => 'The Follow Up date field must be in date',
        ];
    }
}
