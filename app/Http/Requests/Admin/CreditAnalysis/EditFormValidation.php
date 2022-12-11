<?php

namespace App\Http\Requests\Admin\CreditAnalysis;

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
        foreach (config('credit_analysis') as $analysis_option) {

            foreach($analysis_option['fields'] as $key => $field)
            {
                $string = '';

                if($field['required'] == true)
                    $string .= 'required | ';
                elseif($field['required_if'] != false)
                    $string .= 'required_if:'.$field['required_if'].'| ';
                else
                    $string .= '';

                if($field['type'] == 'number')
                    $string .= 'numeric';
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

        foreach (config('credit_analysis') as $analysis_option) {

            foreach($analysis_option['fields'] as $key => $field)
            {
                $atts[$key] = $field['name_np'];
            }
        }
        return $atts;

        
    }
}
