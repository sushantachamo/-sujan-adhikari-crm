<?php

namespace App\Http\Requests\Admin\Application;

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
        $rules =[];
        foreach(config('fields') as $key=> $field)
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
        if(isset($this->land_lander_same_as_borrower) && $this->land_lander_same_as_borrower == 'on') 
        {
            unset($rules['land_lander_name']);
            unset($rules['land_lander_name_en']);
            unset($rules['land_lander_father_name']);
            unset($rules['land_lander_grand_father_name']);
            unset($rules['land_lander_dob']);
            unset($rules['land_lander_dob_bs']);
            unset($rules['land_lander_contact_number']);
            unset($rules['land_lander_citizenship_number']);
            unset($rules['land_lander_citizenship_issue_date']);
            unset($rules['land_lander_citizenship_issue_date_bs']);
            unset($rules['land_lander_citizenship_issue_district']);
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

        foreach(config('fields') as $key=> $field)
        {
            $atts[$key] = $field['name_en'];
        }
        return $atts;

        
    }
}
