<?php

namespace App\Http\Requests\Admin\Application;

use Illuminate\Foundation\Http\FormRequest;

class GuarantorDetailsRequest extends FormRequest
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
        foreach(config('fields.guarantor_details') as $key=> $field)
        {
            $string = '';

            if($field['required'] == true)
                $string .= 'required | ';
            elseif($field['required_if'] != false)
                $string .= 'required_if:'.$field['required_if'].'| ';
            else
                $string .= '';

            if($field['type'] == 'number' && $field['required'] == true)
                $string .= 'integer';
            elseif($field['type'] == 'datetime' && $field['required'] == true)
                $string .= 'date_format:Y-m-d';
            else
            {
                
            }

            $rules[$key]= $string;
        }
        
        if (isset($this->g1_same_as_permanent) && $this->g1_same_as_permanent == 'on') 
        {
            unset($rules['g1_t_province']);
            unset($rules['g1_t_district']);
            unset($rules['g1_t_localgovt']);
            unset($rules['g1_t_ward']);
            unset($rules['g1_t_tole']);
        }

        if (isset($this->g2_same_as_permanent) && $this->g2_same_as_permanent == 'on') 
        {
            unset($rules['g2_t_province']);
            unset($rules['g2_t_district']);
            unset($rules['g2_t_localgovt']);
            unset($rules['g2_t_ward']);
            unset($rules['g2_t_tole']);
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

        foreach(config('fields.loan_details') as $key=> $field)
        {
            $atts[$key] = $field['name_np'];
        }
        return $atts;

        
    }
}
