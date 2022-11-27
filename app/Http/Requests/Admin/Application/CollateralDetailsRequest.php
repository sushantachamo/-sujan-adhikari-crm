<?php

namespace App\Http\Requests\Admin\Application;

use Illuminate\Foundation\Http\FormRequest;

class CollateralDetailsRequest extends FormRequest
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
        foreach(config('fields.collateral_details') as $key=> $field)
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
        
        if(isset($this->land_lander_same_as_borrower) && $this->land_lander_same_as_borrower == 'on') 
        {
            unset($rules['land_lander_name']);
            unset($rules['land_lander_name_en']);
            unset($rules['land_lander_father_name']);
            unset($rules['land_lander_grand_father_name']);
            unset($rules['land_lander_spouse_name']);
            unset($rules['land_lander_dob']);
            unset($rules['land_lander_dob_bs']);
            unset($rules['land_lander_contact_number']);
            unset($rules['land_lander_citizenship_number']);
            unset($rules['land_lander_citizenship_issue_date']);
            unset($rules['land_lander_citizenship_issue_date_bs']);
            unset($rules['land_lander_citizenship_issue_district']);
            unset($rules['land_lander_former_address']);
            unset($rules['land_lander_p_province']);
            unset($rules['land_lander_p_district']);
            unset($rules['land_lander_p_localgovt']);
            unset($rules['land_lander_p_ward']);
            unset($rules['land_lander_p_tole']);
            unset($rules['land_lander_t_province']);
            unset($rules['land_lander_t_district']);
            unset($rules['land_lander_t_localgovt']);
            unset($rules['land_lander_t_ward']);
            unset($rules['land_lander_t_tole']);
        }
        elseif(isset($this->land_lander_same_as_permanent) && $this->land_lander_same_as_permanent == 'on') 
        {
            unset($rules['land_lander_t_province']);
            unset($rules['land_lander_t_district']);
            unset($rules['land_lander_t_localgovt']);
            unset($rules['land_lander_t_ward']);
            unset($rules['land_lander_t_tole']);
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

        foreach(config('fields.collateral_details') as $key=> $field)
        {
            $atts[$key] = $field['name_np'];
        }
        return $atts;

        
    }
}
