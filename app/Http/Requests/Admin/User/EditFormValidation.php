<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

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
        $user = User::findOrFail($this->id);
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'.($this->email === $user->email ? '' : '|unique:users'),
            'roles' => 'required',
            'office_id' => 'required',
        ];

        if ($this->request->get('password')) {
            $rules = array_merge($rules, [
                'password' => 'min:6 | confirmed',
            ]);
        }
        return $rules;
    }
}
