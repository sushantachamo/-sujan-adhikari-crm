<?php

namespace App\Http\Requests\Admin\Application;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
        $rules =[];
        foreach(config('fields.other_details') as $key=> $field)
        {
            if($key == 'reviewed_by')
            {
                $string = '';

                if($field['required'] == true)
                    $string .= 'required | ';
                elseif($field['required_if'] != false)
                    $string .= 'required_if:'.$field['required_if'].'| ';
                else
                    $string .= '';

                if($field['type'] == 'number')
                    $string .= 'integer';
                elseif($field['type'] == 'datetime')
                    $string .= 'date_format:Y-m-d';
                else
                {
                    
                }

                $rules[$key]= $string;
            }
        }

        return $rules;
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {

        $atts = [];

        foreach(config('fields.other_details') as $key=> $field)
        {
            $atts[$key] = $field['name_np'];
        }
        return $atts;

        
    }
}
