<style>
    fieldset.scheduler-border {
         border: 1px groove #ddd !important;
         padding: 0 1.4em 0 1.4em !important;
         margin: 0 0 1.5em 0 !important;
         -webkit-box-shadow: 0px 0px 0px 0px #000;
         box-shadow: 0px 0px 0px 0px #000;
         margin-top: 15px !important;
         background:#d6dfe799;
         }
         fieldset fieldset.scheduler-border {
         padding: 0.4rem 1.4em 1.4em 1.4em !important;
         }
         legend.scheduler-border {
         font-size: 1.2em !important;
         font-weight: bold !important;
         text-align: left !important;
         width: auto;
         padding: 0 10px;
         border-bottom: none;
         background-color: #006AA8;
        color: #eff8fe;
        border-radius:3px;
        }
    .form-control-sm {
            font-size: 0.8rem;
            line-height: 1.5;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered
        {
            line-height: 36px;
        }
        .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
        }

        .btn-sm {
            line-height: 1.2rem;
        }
        .form-control {
            border: 1px solid #aaaaaa;
        }
        .form-group h6 {font-weight: bold;}
</style>
<div class="card card-default">
    <div class="card-body">
        @if(isset($form_type) && $form_type == 'create')
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">ऋण आबेदकहरु</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="applicant_id"> आबेदक (आईडी)	</label> <span class="text-danger">*</span>
                        {!! Form::select('applicant_id', isset($data['applications'])?$data['applications']:[], (isset($data['applicant_id'])? $data['applicant_id'] : null),
                            ['class' => 'form-control select_to  applicant_id', 'required'=>'required' ]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group pt-4">
                    <a id="fill" class="btn btn-info btn-sm fill"> Select</a>
                    <a href="{{ route('admin.mortgage_appraisal.create') }}" class="btn btn-warning btn-sm reset"> Reset</a>
                    </div>
                </div>
            </div>
        </fieldset>
        @endif
        @if(isset($data['applicant_id']) || isset($data['row']))
        <fieldset class="scheduler-border">
            <legend class="scheduler-border"> ऋण आबेदकको बिबरण </legend>

            
            <div class="form-row form-group">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="{{ config('custom.office_fields.name_np.key') }}"> {{ config('custom.office_fields.name_np.name_np') }}	</label> 
                        <h6>
                            {{ isset($data['row'][config('custom.office_fields.name_np.key')])?$data['row'][config('custom.office_fields.name_np.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('custom.office_fields.name_np.key')] : null) }}
                        </h6>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="{{ config('fields.applicant_details.borrower_name.key') }}"> {{ config('fields.applicant_details.borrower_name.name_np') }}	</label> 
                        <h6>
                            {{ isset($data['row'][config('fields.applicant_details.borrower_name.key')])?$data['row'][config('fields.applicant_details.borrower_name.key')]:(isset($data['rawApplicant'][config('fields.applicant_details.borrower_name.key')])? $data['rawApplicant'][config('fields.applicant_details.borrower_name.key')] : null) }}
                        </h6>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="{{ config('fields.loan_details.loan_title.key') }}"> {{ config('fields.loan_details.loan_title.name_np') }}	</label>
                        <h6>
                            {{ isset($data['row'][config('fields.loan_details.loan_title.key')])?$data['row'][config('fields.loan_details.loan_title.key')]:(isset($data['rawApplicant'][config('fields.loan_details.loan_title.key')])? $data['rawApplicant'][config('fields.loan_details.loan_title.key')] : null) }}
                        </h6>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="{{ config('fields.colletral_details.subscription_id.key') }}"> {{ config('fields.colletral_details.subscription_id.name_np') }}	</label>
                        <h6>
                            {{ isset($data['row'][config('fields.colletral_details.subscription_id.key')])?$data['row'][config('fields.colletral_details.subscription_id.key')]:(isset($data['rawApplicant'][config('fields.colletral_details.subscription_id.key')])? $data['rawApplicant'][config('fields.colletral_details.subscription_id.key')] : null) }}
                        </h6>
                    </div>
                </div>
            </div>
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">धितो मूल्याङ्कन</legend>
                <div class="form-row form_row_margin_bottom">
                    <div class="col-md-3">
                        <label for="{{ config('mortgage_appraisals.fields.t_land_area.key') }}"> {{ config('mortgage_appraisals.fields.t_land_area.name_np') }}	</label> {!! config('mortgage_appraisals.fields.t_land_area.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        <div class="form-row">
                            <div class="col-md-8">
                                {!! Form::text(config('mortgage_appraisals.fields.t_land_area.key'), isset($data['row'][config('mortgage_appraisals.fields.t_land_area.key')])?$data['row'][config('mortgage_appraisals.fields.t_land_area.key')]:null, ['placeholder' => config('mortgage_appraisals.fields.t_land_area.name_np'), 'class' => 'form-control form-control-sm calc_land_area', 'id' => config('mortgage_appraisals.fields.t_land_area.key'), 'required'=>config('mortgage_appraisals.fields.t_land_area.required')]) !!}
        
                            </div>
                            <div class="col-md-4">
                                {!! Form::select(config('mortgage_appraisals.fields.land_unit.key'), isset($data['land_units'])?$data['land_units']:[], null,
                                ['class' => 'form-control select_to  '.config('mortgage_appraisals.fields.land_unit.key'), 'required'=>config('mortgage_appraisals.fields.land_unit.required') ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="{{ config('mortgage_appraisals.fields.m_land_area.key') }}"> {{ config('mortgage_appraisals.fields.m_land_area.name_np') }}	</label> {!! config('mortgage_appraisals.fields.m_land_area.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        <div class="form-row">
                            <div class="col-md-8">
                                {!! Form::text(config('mortgage_appraisals.fields.m_land_area.key'), isset($data['row'][config('mortgage_appraisals.fields.m_land_area.key')])?$data['row'][config('mortgage_appraisals.fields.m_land_area.key')]:null, ['placeholder' => config('mortgage_appraisals.fields.m_land_area.name_np'), 'class' => 'form-control form-control-sm calc_land_area', 'id' => config('mortgage_appraisals.fields.m_land_area.key'), 'required'=>config('mortgage_appraisals.fields.m_land_area.required')]) !!}
                            </div>
                            <div class="col-md-4">
                                <div class="show_land_unit"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="{{ config('mortgage_appraisals.fields.v_land_area.key') }}"> {{ config('mortgage_appraisals.fields.v_land_area.name_np') }}	</label> {!! config('mortgage_appraisals.fields.v_land_area.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        <div class="form-row">
                            <div class="col-md-8">
                                {!! Form::number(config('mortgage_appraisals.fields.v_land_area.key'), isset($data['row'][config('mortgage_appraisals.fields.v_land_area.key')])?$data['row'][config('mortgage_appraisals.fields.v_land_area.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.v_land_area.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.v_land_area.name_np'), 'class' => 'form-control form-control-sm calc_market_land_price calc_government_land_price', 'id' => config('mortgage_appraisals.fields.v_land_area.key'), 'required'=>config('mortgage_appraisals.fields.v_land_area.required')]) !!}
                            </div>
                            <div class="col-md-4">
                                <div class="show_land_unit"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">जग्गा मूल्याङ्कन</legend>
                    <div class="form-row form_row_margin_bottom">
                        <div class="col-md-2">
                            <label for=""> जग्गाको क्षेत्रफल (<span class="show_land_unit"></span>)</label> 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="h5 text-success v_land_area">N/A</div>    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="price"> जग्गाको वजार मुल्य प्रति <span class="show_land_unit"></span> </label> 
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            {!! Form::text(config('mortgage_appraisals.fields.land_market_price_per_unit.key'), isset($data['row'][config('mortgage_appraisals.fields.land_market_price_per_unit.key')])?$data['row'][config('mortgage_appraisals.fields.land_market_price_per_unit.key')]:null, ['class' => 'form-control form-control-sm calc_market_land_price', 'id' => config('mortgage_appraisals.fields.land_market_price_per_unit.key'), 'required'=>true]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="{{ config('mortgage_appraisals.fields.land_market_price.key') }}"> {{ config('mortgage_appraisals.fields.land_market_price.name_np') }}	</label> {!! config('mortgage_appraisals.fields.land_market_price.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <div class="h5 text-success land_market_price">N/A</div> 
                                            {!! Form::hidden(config('mortgage_appraisals.fields.land_market_price.key'), isset($data['row'][config('mortgage_appraisals.fields.land_market_price.key')])?$data['row'][config('mortgage_appraisals.fields.land_market_price.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.land_market_price.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.land_market_price.name_np'), 'class' => 'form-control form-control-sm', 'id' => config('mortgage_appraisals.fields.land_market_price.key'), 'required'=>config('mortgage_appraisals.fields.land_market_price.required')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="{{ config('mortgage_appraisals.fields.land_market_distinct_price.key') }}"> {{ config('mortgage_appraisals.fields.land_market_distinct_price.name_np') }}	</label> {!! config('mortgage_appraisals.fields.land_market_distinct_price.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <div class="h5 text-success land_market_distinct_price">N/A</div> 
                                            {!! Form::hidden(config('mortgage_appraisals.fields.land_market_distinct_price.key'), isset($data['row'][config('mortgage_appraisals.fields.land_market_distinct_price.key')])?$data['row'][config('mortgage_appraisals.fields.land_market_distinct_price.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.land_market_distinct_price.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.land_market_distinct_price.name_np'), 'class' => 'form-control form-control-sm calc_land_price', 'id' => config('mortgage_appraisals.fields.land_market_distinct_price.key'), 'required'=>config('mortgage_appraisals.fields.land_market_distinct_price.required')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="price"> जग्गाको सरकारी मुल्य प्रति <span class="show_land_unit"></span> </label> 
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            {!! Form::text(config('mortgage_appraisals.fields.land_government_price_per_unit.key'), isset($data['row'][config('mortgage_appraisals.fields.land_government_price_per_unit.key')])?$data['row'][config('mortgage_appraisals.fields.land_government_price_per_unit.key')]:null, ['class' => 'form-control form-control-sm calc_government_land_price', 'id' => config('mortgage_appraisals.fields.land_government_price_per_unit.key'), 'required'=>true]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="{{ config('mortgage_appraisals.fields.land_government_price.key') }}"> {{ config('mortgage_appraisals.fields.land_government_price.name_np') }}	</label> {!! config('mortgage_appraisals.fields.land_government_price.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <div class="h5 text-success land_government_price">N/A</div> 
                                            {!! Form::hidden(config('mortgage_appraisals.fields.land_government_price.key'), isset($data['row'][config('mortgage_appraisals.fields.land_government_price.key')])?$data['row'][config('mortgage_appraisals.fields.land_government_price.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.land_government_price.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.land_government_price.name_np'), 'class' => 'form-control form-control-sm', 'id' => config('mortgage_appraisals.fields.land_government_price.key'), 'required'=>config('mortgage_appraisals.fields.land_government_price.required')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="{{ config('mortgage_appraisals.fields.land_government_distinct_price.key') }}"> {{ config('mortgage_appraisals.fields.land_government_distinct_price.name_np') }}	</label> {!! config('mortgage_appraisals.fields.land_government_distinct_price.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <div class="h5 text-success land_government_distinct_price">N/A</div>
                                            {!! Form::hidden(config('mortgage_appraisals.fields.land_government_distinct_price.key'), isset($data['row'][config('mortgage_appraisals.fields.land_government_distinct_price.key')])?$data['row'][config('mortgage_appraisals.fields.land_government_distinct_price.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.land_government_distinct_price.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.land_government_distinct_price.name_np'), 'class' => 'form-control form-control-sm calc_land_price', 'id' => config('mortgage_appraisals.fields.land_government_distinct_price.key'), 'required'=>config('mortgage_appraisals.fields.land_government_distinct_price.required')]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for=""> जग्गाको चलनचल्तिको मुल्य </label> 
                            <div class="form-row">
                                <div class="col-md-12">
                                    (<span class="text-success land_market_distinct_price">N/A</span> + <span class="text-success land_government_distinct_price">N/A</span>) * 80% <br> <span class="h5 text-center text-primary land_value">N/A</span>
                                    {!! Form::hidden(config('mortgage_appraisals.fields.land_value.key'), isset($data['row'][config('mortgage_appraisals.fields.land_value.key')])?$data['row'][config('mortgage_appraisals.fields.land_value.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.land_value.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.land_value.name_np'), 'class' => 'form-control form-control-sm calc_assessment_value', 'id' => config('mortgage_appraisals.fields.land_value.key'), 'required'=>config('mortgage_appraisals.fields.land_value.required')]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">घर मूल्याङ्कन <small>(घर सहित {{ Form::checkbox('with_home', isset($data['row']['collateral_type']) && $data['row']['collateral_type'] == 'home_land' ? true : false ,isset($data['row']['collateral_type']) && $data['row']['collateral_type'] == 'home_land' ? true : false, ['id'=>'with_home']) }} )</small></legend>
                    <div class="form-row form_row_margin_bottom d-none" id="with_home_fields">
                        <div class="col-md-2">
                            <label for="{{ config('mortgage_appraisals.fields.no_of_floor.key') }}"> {{ config('mortgage_appraisals.fields.no_of_floor.name_np') }}	</label> {!! config('mortgage_appraisals.fields.no_of_floor.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            <div class="form-row">
                                <div class="col-md-12">
                                    {!! Form::text(config('mortgage_appraisals.fields.no_of_floor.key'), isset($data['row'][config('mortgage_appraisals.fields.no_of_floor.key')])?$data['row'][config('mortgage_appraisals.fields.no_of_floor.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.no_of_floor.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.no_of_floor.name_np'), 'class' => 'form-control form-control-sm calc_home_price', 'id' => config('mortgage_appraisals.fields.no_of_floor.key')]) !!}
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <label for="{{ config('mortgage_appraisals.fields.price_per_floor.key') }}"> {{ config('mortgage_appraisals.fields.price_per_floor.name_np') }}	</label> {!! config('mortgage_appraisals.fields.price_per_floor.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            <div class="form-row">
                                <div class="col-md-12">
                                    {!! Form::text(config('mortgage_appraisals.fields.price_per_floor.key'), isset($data['row'][config('mortgage_appraisals.fields.price_per_floor.key')])?$data['row'][config('mortgage_appraisals.fields.price_per_floor.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.price_per_floor.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.price_per_floor.name_np'), 'class' => 'form-control form-control-sm calc_home_price', 'id' => config('mortgage_appraisals.fields.price_per_floor.key')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="{{ config('mortgage_appraisals.fields.home_cost.key') }}"> {{ config('mortgage_appraisals.fields.home_cost.name_np') }}	</label> {!! config('mortgage_appraisals.fields.home_cost.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="h5 text-success home_cost">N/A</div> 
                                    {!! Form::hidden(config('mortgage_appraisals.fields.home_cost.key'), isset($data['row'][config('mortgage_appraisals.fields.home_cost.key')])?$data['row'][config('mortgage_appraisals.fields.home_cost.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.home_cost.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.home_cost.name_np'), 'class' => 'form-control form-control-sm calc_home_distinct_price', 'id' => config('mortgage_appraisals.fields.home_cost.key')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="{{ config('mortgage_appraisals.fields.deducted_amount.key') }}"> {{ config('mortgage_appraisals.fields.deducted_amount.name_np') }}	</label> {!! config('mortgage_appraisals.fields.deducted_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            <div class="form-row">
                                <div class="col-md-12">
                                    {!! Form::text(config('mortgage_appraisals.fields.deducted_amount.key'), isset($data['row'][config('mortgage_appraisals.fields.deducted_amount.key')])?$data['row'][config('mortgage_appraisals.fields.deducted_amount.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.deducted_amount.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.deducted_amount.name_np'), 'class' => 'form-control form-control-sm calc_home_distinct_price', 'id' => config('mortgage_appraisals.fields.deducted_amount.key')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="{{ config('mortgage_appraisals.fields.home_actual_value.key') }}"> {{ config('mortgage_appraisals.fields.home_actual_value.name_np') }}	</label> {!! config('mortgage_appraisals.fields.home_actual_value.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="h5 text-success home_actual_value">N/A</div>
                                    {!! Form::hidden(config('mortgage_appraisals.fields.home_actual_value.key'), isset($data['row'][config('mortgage_appraisals.fields.home_actual_value.key')])?$data['row'][config('mortgage_appraisals.fields.home_actual_value.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.home_actual_value.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.home_actual_value.name_np'), 'class' => 'form-control form-control-sm', 'id' => config('mortgage_appraisals.fields.home_actual_value.key')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="{{ config('mortgage_appraisals.fields.home_total_value.key') }}"> {{ config('mortgage_appraisals.fields.home_total_value.name_np') }}	</label> {!! config('mortgage_appraisals.fields.home_total_value.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            <div class="form-row">
                                <div class="col-md-12">
                                    <span class="text-success home_actual_value">N/A</span> * 80% :<br>
                                    <div class="h5 text-primary home_total_value">N/A</div> 
                                    {!! Form::hidden(config('mortgage_appraisals.fields.home_total_value.key'), isset($data['row'][config('mortgage_appraisals.fields.home_total_value.key')])?$data['row'][config('mortgage_appraisals.fields.home_total_value.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.home_total_value.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.home_total_value.name_np'), 'class' => 'form-control form-control-sm calc_land_price calc_assessment_value', 'id' => config('mortgage_appraisals.fields.home_total_value.key')]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="col-md-2">
                    <label for="{{ config('mortgage_appraisals.fields.total_assessment_value.key') }}"> {{ config('mortgage_appraisals.fields.total_assessment_value.name_np') }}	</label> {!! config('mortgage_appraisals.fields.total_assessment_value.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    <div class="form-row">
                        <div class="col-md-12">
                            <span class="h5 text-primary total_assessment_value">N/A</span> 
                            {!! Form::hidden(config('mortgage_appraisals.fields.total_assessment_value.key'), isset($data['row'][config('mortgage_appraisals.fields.total_assessment_value.key')])?$data['row'][config('mortgage_appraisals.fields.total_assessment_value.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('mortgage_appraisals.fields.total_assessment_value.key')] : null), ['placeholder' => config('mortgage_appraisals.fields.total_assessment_value.name_np'), 'class' => 'form-control form-control-sm', 'id' => config('mortgage_appraisals.fields.total_assessment_value.key'), 'required'=>config('mortgage_appraisals.fields.total_assessment_value.required')]) !!}
                        </div>
                    </div>
                </div>
            </fieldset>
            
        </fieldset>
        <div class="row">
            <div class="col-md-6">
                <button type="submit" name="submit"  class="btn btn-sm btn-success"> {{ $button }} </button>
                <a type="button" href="{{ route($base_route.'.index') }}"
                   class="btn btn-sm btn-danger row-edit">
                     Cancel
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@section('post_scripts')
<script type="text/javascript">
$(document).ready(function () {
    $('.select2').select2();
    $('.select_to').select2();
    
    $('body').on('click', '#fill', function () {
        s_id = $('.applicant_id').val();
        var url = '{{ route('admin.mortgage_appraisal.create') }}';

        if (s_id) {
            url = url + '?applicant_id=' + s_id;
        }
        location.href = url;
    });

    if($('#v_land_area').val())
        $('.v_land_area').text($('#v_land_area').val());

    if($('#land_market_price').val())
        $('.land_market_price').text($('#land_market_price').val());

    if($('#land_market_distinct_price').val())
        $('.land_market_distinct_price').text($('#land_market_distinct_price').val());

    if($('#land_government_price').val())
        $('.land_government_price').text($('#land_government_price').val());

    if($('#land_government_distinct_price').val())
        $('.land_government_distinct_price').text($('#land_government_distinct_price').val());
    
    if($('#land_value').val())
        $('.land_value').text($('#land_value').val());
    
    if($('#home_cost').val())
        $('.home_cost').text($('#home_cost').val());

    if($('#home_actual_value').val())
        $('.home_actual_value').text($('#home_actual_value').val());

    if($('#home_total_value').val())
        $('.home_total_value').text($('#home_total_value').val());

    if($('#total_assessment_value').val())
        $('.total_assessment_value').text($('#total_assessment_value').val());


    


    $('.land_unit').change(function () {
        $value = $('.land_unit option:selected').text();
        $('.show_land_unit').text($value);
    });


    $('.calc_land_area').keyup(function () {
        $t_land_area = parseFloat($('#t_land_area').val());
        $m_land_area = parseFloat($('#m_land_area').val());
        if($t_land_area  && $m_land_area )
        {
            $v_land_area = $t_land_area - $m_land_area;
            $('#v_land_area').val($v_land_area);
            $('#v_land_area').keyup();
            $('.v_land_area').text($v_land_area);
        }
        else{
            $('#v_land_area').val('');
            $('#v_land_area').keyup();
            $('.v_land_area').text('N/A');
        }
    });

    $('.calc_market_land_price').keyup(function () {

        
        $v_land_area = parseFloat($('#v_land_area').val());
        $land_market_price_per_unit = parseFloat($('#land_market_price_per_unit').val());

        if($v_land_area && $land_market_price_per_unit )
        {
            $land_market_price = $v_land_area * $land_market_price_per_unit;
            $('#land_market_price').val($land_market_price);
            $('#land_market_price').keyup();
            $('.land_market_price').html($land_market_price);
            $land_market_distinct_price = $land_market_price * 0.7;
            $('#land_market_distinct_price').val($land_market_distinct_price);
            $('#land_market_distinct_price').keyup();
            $('.land_market_distinct_price').html($land_market_distinct_price);
        }
        else{
            $('#land_market_price').val('');
            $('#land_market_price').keyup();
            $('.land_market_price').html('N/A');
            $('#land_market_distinct_price').val('');
            $('#land_market_distinct_price').keyup();
            $('.land_market_distinct_price').html('N/A');
        }
    });

    $('.calc_government_land_price').keyup(function () {

        $v_land_area = parseFloat($('#v_land_area').val());
        $land_government_price_per_unit = parseFloat($('#land_government_price_per_unit').val());

        if($v_land_area && $land_government_price_per_unit )
        {
            $land_government_price = $v_land_area * $land_government_price_per_unit;
            $('#land_government_price').val($land_government_price);
            $('.land_government_price').html($land_government_price);
            $land_government_distinct_price = $land_government_price * 0.3;
            $('#land_government_distinct_price').val($land_government_distinct_price);
            $('#land_government_distinct_price').keyup();
            $('.land_government_distinct_price').html($land_government_distinct_price);
        }
        else{
            $('#land_government_price').val('');
            $('#land_government_price').keyup();
            $('.land_government_price').html('N/A');
            $('#land_government_distinct_price').val('');
            $('#land_government_distinct_price').keyup();
            $('.land_government_distinct_price').html('N/A');
        }
    });

    $('.calc_land_price').keyup(function () {

        $land_market_distinct_price = parseFloat($('#land_market_distinct_price').val());
        $land_government_distinct_price = parseFloat($('#land_government_distinct_price').val());

        if($land_market_distinct_price && $land_government_distinct_price )
        {
            $land_distinct_price = $land_market_distinct_price + $land_government_distinct_price;
            $land_value = $land_distinct_price * 0.8;
            $('.land_distinct_price').html($land_distinct_price);
            $('#land_value').val($land_value);
            $('#land_value').keyup();
            $('.land_value').html($land_value);

        }
        else{
            $('.land_distinct_price').html('N/A');
            $('#land_value').val('');
            $('#land_value').keyup();
            $('.land_value').html('N/A');
        }
    });
    $('.calc_home_price').keyup(function () {

        $no_of_floor = parseFloat($('#no_of_floor').val());
        $price_per_floor = parseFloat($('#price_per_floor').val());

        if($no_of_floor && $price_per_floor )
        {
            $home_cost = $no_of_floor * $price_per_floor;
            $('#home_cost').val($home_cost);
            $('#home_cost').keyup();
            $('.home_cost').html($home_cost); 
        }
        else{
            $('#home_cost').val('');
            $('#home_cost').keyup();
            $('.home_cost').html('N/A'); 
        }
    });
    $('.calc_home_distinct_price').keyup(function () {
        $home_cost = parseFloat($('#home_cost').val());
        $deducted_amount = parseFloat($('#deducted_amount').val());
        if($home_cost && $deducted_amount )
        {
            $home_actual_value = $home_cost - $deducted_amount
            $('#home_actual_value').val($home_actual_value);
            $('#home_actual_value').keyup();
            $('.home_actual_value').html($home_actual_value); 
            $home_total_value = $home_actual_value * 0.8;
            $('#home_total_value').val($home_total_value);
            $('#home_total_value').keyup();
            $('.home_total_value').html($home_total_value); 
        }
        else{
            $('#home_actual_value').val('');
            $('#home_actual_value').keyup();
            $('.home_actual_value').html('N/A'); 
            $('#home_total_value').val('');
            $('#home_total_value').keyup();
            $('.home_total_value').html('N/A'); 
        }
    });
    $('.calc_assessment_value').keyup(function () {
        $land_value = parseFloat($('#land_value').val());
        $home_total_value = parseFloat($('#home_total_value').val());
        if($land_value)
        {
            if($('#with_home').is(":checked"))
            {
                $home_total_value = parseFloat($('#home_total_value').val());
            }
            else{
                $home_total_value = 0;
            }
            $total_assessment_value = $land_value + $home_total_value
            $('#total_assessment_value').val($total_assessment_value);
            $('#total_assessment_value').keyup();
            $('.total_assessment_value').html($total_assessment_value); 
        }
        else{
            $('#total_assessment_value').val('');
            $('#total_assessment_value').keyup();
            $('.total_assessment_value').html('N/A'); 
        }
    });

    if ($('#with_home').is(":checked"))
    {
        $('#with_home_fields').removeClass('d-none');
    }

    $('body').on('change', '#with_home', function () {
        if ($('#with_home').is(":checked"))
        {
            $('#with_home_fields').removeClass('d-none');
        }
        else
        {
            $('#with_home_fields').addClass('d-none');
        }
    });

});
</script>
@endsection