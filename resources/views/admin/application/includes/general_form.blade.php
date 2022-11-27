<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">
           
        <a  data-toggle="collapse" href="#collapsebusiness" role="button" aria-expanded="false" aria-controls="collapsebusiness">
            <span> सामुहिक जमानीमा लगानी गर्दा भर्ने विवरण</span>
            <span class="group-icon">
                <i class="fi fi-arrow-end-slim"></i>
                <i class="fi fi-arrow-down-slim"></i>
            </span>
        </a>
        
        </legend>
        <div class="{{ isset($data['row']['business_register_office']) && $data['row']['business_register_office']!=null ? '': 'collapse' }}" id="collapsebusiness">
            <div class="form-row form-group mb-3">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="{{ config('fields.collateral_details.business_register_office.key') }}">{{ config('fields.collateral_details.business_register_office.name_np') }}</label> {!! config('fields.collateral_details.business_register_office.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.collateral_details.business_register_office.key'), isset($data['request'][config('fields.collateral_details.business_register_office.key')])?$data['request'][config('fields.collateral_details.business_register_office.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.business_register_office.key')] : null), ['placeholder' => config('fields.collateral_details.business_register_office.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.business_register_office.key'), 'required'=>config('fields.collateral_details.business_register_office.required')]) !!}
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group">
                        <label for="{{ config('fields.collateral_details.business_register_number.key') }}"> {{ config('fields.collateral_details.business_register_number.name_np') }}	</label> {!! config('fields.collateral_details.business_register_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.collateral_details.business_register_number.key'), isset($data['request'][config('fields.collateral_details.business_register_number.key')])?$data['request'][config('fields.collateral_details.business_register_number.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.business_register_number.key')] : null), ['placeholder' => config('fields.collateral_details.business_register_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.business_register_number.key'), 'required'=>config('fields.collateral_details.business_register_number.required')]) !!}
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="{{ config('fields.collateral_details.business_register_date.key') }}"> {{ config('fields.collateral_details.business_register_date.name_np') }}	</label> {!! config('fields.collateral_details.business_register_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        <div class="input-group">
                            {!! Form::text('business_register_date_bs', isset($data['row']['business_register_date_bs'])?$data['row']['business_register_date_bs']:(isset($rawApplicant)? $rawApplicant['business_register_date_bs'] : null), ['placeholder' => config('fields.collateral_details.business_register_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'business_register_date_bs']) !!}
                            {!! Form::text('business_register_date', isset($data['row']['business_register_date']) ? $data['row']['business_register_date']->format('Y-m-d') : (isset($rawApplicant['business_register_date'])? $rawApplicant['business_register_date']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'business_register_date']) !!}
                            <span class="input-group-btn">
                                <button class="btn  btn-sm btn-danger" type="button" id="business_register_date_clear"><i class="fi fi-close"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group">
                        <label for="{{ config('fields.collateral_details.business_pan_number.key') }}"> {{ config('fields.collateral_details.business_pan_number.name_np') }}</label> {!! config('fields.collateral_details.business_pan_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.collateral_details.business_pan_number.key'), isset($data['request'][config('fields.collateral_details.business_pan_number.key')])?$data['request'][config('fields.collateral_details.business_pan_number.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.business_pan_number.key')] : null), ['placeholder' => config('fields.collateral_details.business_pan_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.business_pan_number.key'), 'required'=>config('fields.collateral_details.business_pan_number.required')]) !!}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="{{ config('fields.collateral_details.business_estimated_cost.key') }}"> {{ config('fields.collateral_details.business_estimated_cost.name_np') }}</label> {!! config('fields.collateral_details.business_estimated_cost.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.collateral_details.business_estimated_cost.key'), isset($data['request'][config('fields.collateral_details.business_estimated_cost.key')])?$data['request'][config('fields.collateral_details.business_estimated_cost.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.business_estimated_cost.key')] : null), ['placeholder' => config('fields.collateral_details.business_estimated_cost.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.business_estimated_cost.key'), 'required'=>config('fields.collateral_details.business_estimated_cost.required')]) !!}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="{{ config('fields.collateral_details.business_proprietor.key') }}"> {{ config('fields.collateral_details.business_proprietor.name_np') }}</label> {!! config('fields.collateral_details.business_proprietor.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.collateral_details.business_proprietor.key'), isset($data['request'][config('fields.collateral_details.business_proprietor.key')])?$data['request'][config('fields.collateral_details.business_proprietor.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.business_proprietor.key')] : null), ['placeholder' => config('fields.collateral_details.business_proprietor.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.business_proprietor.key'), 'required'=>config('fields.collateral_details.business_proprietor.required')]) !!}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="{{ config('fields.collateral_details.business_proprietor_relation.key') }}"> {{ config('fields.collateral_details.business_proprietor_relation.name_np') }}</label> {!! config('fields.collateral_details.business_proprietor_relation.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.collateral_details.business_proprietor_relation.key'), isset($data['request'][config('fields.collateral_details.business_proprietor_relation.key')])?$data['request'][config('fields.collateral_details.business_proprietor_relation.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.business_proprietor_relation.key')] : null), ['placeholder' => config('fields.collateral_details.business_proprietor_relation.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.business_proprietor_relation.key'), 'required'=>config('fields.collateral_details.business_proprietor_relation.required')]) !!}
                    </div>
                </div>
            </div>
            @include('admin.application.includes.samuhikbankinfo')
            @include('admin.application.includes.samuhikdocs')
        </div>
       
    </fieldset>
</div>