<?php

namespace App\Http\Requests\Admin\Application;

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
        $rules =[];
        foreach(config('fields.applicant_details') as $key=> $field)
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
                if($key == 'b_son_name' || $key == 'b_daughter_name' )
                    $string .= 'array';
                
            }

            $rules[$key]= $string;
        }
        if (isset($this->b_same_as_permanent) && $this->b_same_as_permanent == 'on') 
        {
            unset($rules['b_t_province']);
            unset($rules['b_t_district']);
            unset($rules['b_t_localgovt']);
            unset($rules['b_t_ward']);
            unset($rules['b_t_tole']);
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

        foreach(config('fields.applicant_details') as $key=> $field)
        {
            $atts[$key] = $field['name_np'];
        }
        return $atts;

        
    }
}
