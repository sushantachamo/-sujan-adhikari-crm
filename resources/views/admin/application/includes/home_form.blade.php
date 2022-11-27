<div>
    <fieldset class="scheduler-border">
       <legend class="scheduler-border">घर जग्गा धितो राखी ऋण लिदा भर्नुपर्ने फारम</legend>
       <div class="form-row form-group">
          <!-- <legend> Temporary Address </legend> -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for=" ">{{ config('fields.collateral_details.home_province.name_np') }}</label>
                    {!! Form::select('home_province', isset($data['provinces'])?$data['provinces']:[], (isset($rawApplicant)? $rawApplicant['home_province'] : null),
                    ['class' => 'form-control select_to  home_province']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for=" ">{{ config('fields.collateral_details.home_district.name_np') }}</label>
                    {!! Form::select('home_district',isset($data['home_districts'])?$data['home_districts']:[], (isset($rawApplicant)? $rawApplicant['home_district'] : null),
                    ['class' => 'form-control select_to home_district']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_local_govt.key') }}"> {{ config('fields.collateral_details.home_local_govt.name_np') }}	</label> {!! config('fields.collateral_details.home_local_govt.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.home_local_govt.key'), isset($data['row'][config('fields.collateral_details.home_local_govt.key')])?$data['row'][config('fields.collateral_details.home_local_govt.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.home_local_govt.key')] : null), ['placeholder' => config('fields.collateral_details.home_local_govt.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.home_local_govt.key'), 'required'=>config('fields.collateral_details.home_local_govt.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_ward.key') }}"> {{ config('fields.collateral_details.home_ward.name_np') }}	</label> {!! config('fields.collateral_details.home_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!!Form::text('home_ward', (isset($data['rawLander']['home_ward'])? $data['rawLander']['home_ward'] : null),
                    ['class' => 'form-control form-control-sm home_ward']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_tole.key') }}"> {{ config('fields.collateral_details.home_tole.name_np') }}	</label> {!! config('fields.collateral_details.home_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.home_tole.key'), isset($data['row'][config('fields.collateral_details.home_tole.key')])?$data['row'][config('fields.collateral_details.home_tole.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.home_tole.key')] : null), ['placeholder' => config('fields.collateral_details.home_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.home_tole.key'), 'required'=>config('fields.collateral_details.home_tole.required')]) !!}
                </div>
            </div>
            <div class="col-md-3">
                {{-- <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_kitta_number.key') }}"> {{ config('fields.collateral_details.home_kitta_number.name_np') }}	</label> {!! config('fields.collateral_details.home_kitta_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.home_kitta_number.key'), isset($data['row'][config('fields.collateral_details.home_kitta_number.key')])?$data['row'][config('fields.collateral_details.home_kitta_number.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.home_kitta_number.key')] : null), ['placeholder' => config('fields.collateral_details.home_kitta_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.home_kitta_number.key'), 'required'=>config('fields.collateral_details.home_kitta_number.required')]) !!}
                </div> --}}

                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_kitta_number.key') }}"> {{ config('fields.collateral_details.home_kitta_number.name_np') }}	</label> {!! config('fields.collateral_details.home_kitta_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    <select name="{{config('fields.collateral_details.home_kitta_number.key')}}[]" multiple='multiple' class="form-control form-control-sm select2tags" id={{config('fields.collateral_details.home_kitta_number.key')}} >
                       @php $options = isset($data['row'][config('fields.collateral_details.home_kitta_number.key')])?$data['row'][config('fields.collateral_details.home_kitta_number.key')]:null; 
                       @endphp
                       @if($options)
                        @foreach ($options as $option) 
                            <option value="{{$option}}" selected> {{$option}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>


            </div>
            <div class="col-md-3">
                {{-- <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_sn_number.key') }}"> {{ config('fields.collateral_details.home_sn_number.name_np') }}	</label> {!! config('fields.collateral_details.home_sn_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.home_sn_number.key'), isset($data['row'][config('fields.collateral_details.home_sn_number.key')])?$data['row'][config('fields.collateral_details.home_sn_number.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.home_sn_number.key')] : null), ['placeholder' => config('fields.collateral_details.home_sn_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.home_sn_number.key'), 'required'=>config('fields.collateral_details.home_sn_number.required')]) !!}
                </div> --}}
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_sn_number.key') }}"> {{ config('fields.collateral_details.home_sn_number.name_np') }}	</label> {!! config('fields.collateral_details.home_sn_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    <select name="{{config('fields.collateral_details.home_sn_number.key')}}[]" multiple='multiple' class="form-control form-control-sm select2tags" id={{config('fields.collateral_details.home_sn_number.key')}} >
                       @php $options = isset($data['row'][config('fields.collateral_details.home_sn_number.key')])?$data['row'][config('fields.collateral_details.home_sn_number.key')]:null; 
                       @endphp
                       @if($options)
                        @foreach ($options as $option) 
                            <option value="{{$option}}" selected> {{$option}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                {{-- <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_area.key') }}"> {{ config('fields.collateral_details.home_area.name_np') }}	</label> {!! config('fields.collateral_details.home_area.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.home_area.key'), isset($data['row'][config('fields.collateral_details.home_area.key')])?$data['row'][config('fields.collateral_details.home_area.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.home_area.key')] : null), ['placeholder' => config('fields.collateral_details.home_area.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.home_area.key'), 'required'=>config('fields.collateral_details.home_area.required')]) !!}
                </div> --}}
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_area.key') }}"> {{ config('fields.collateral_details.home_area.name_np') }}	</label> {!! config('fields.collateral_details.home_area.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    <select name="{{config('fields.collateral_details.home_area.key')}}[]" multiple='multiple' class="form-control form-control-sm select2tags" id={{config('fields.collateral_details.home_area.key')}} >
                       @php $options = isset($data['row'][config('fields.collateral_details.home_area.key')])?$data['row'][config('fields.collateral_details.home_area.key')]:null; 
                       @endphp
                       @if($options)
                        @foreach ($options as $option) 
                            <option value="{{$option}}" selected> {{$option}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                {{-- <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_charkilla.key') }}"> {{ config('fields.collateral_details.home_charkilla.name_np') }}	</label> {!! config('fields.collateral_details.home_charkilla.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.home_charkilla.key'), isset($data['row'][config('fields.collateral_details.home_charkilla.key')])?$data['row'][config('fields.collateral_details.home_charkilla.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.home_charkilla.key')] : null), ['placeholder' => config('fields.collateral_details.home_charkilla.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.home_charkilla.key'), 'required'=>config('fields.collateral_details.home_charkilla.required')]) !!}
                </div> --}}
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_charkilla.key') }}"> {{ config('fields.collateral_details.home_charkilla.name_np') }}	</label> {!! config('fields.collateral_details.home_charkilla.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    <select name="{{config('fields.collateral_details.home_charkilla.key')}}[]" multiple='multiple' class="form-control form-control-sm select2tags" id={{config('fields.collateral_details.home_charkilla.key')}} >
                       @php $options = isset($data['row'][config('fields.collateral_details.home_charkilla.key')])?$data['row'][config('fields.collateral_details.home_charkilla.key')]:null; 
                       @endphp
                       @if($options)
                        @foreach ($options as $option) 
                            <option value="{{$option}}" selected> {{$option}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">{{ config('fields.collateral_details.home_blocked_date.name_np') }}</label>
                        <div class="input-group">
                            {!! Form::text('home_blocked_date_bs', isset($data['row']['home_blocked_date_bs'])?$data['row']['home_blocked_date_bs']:(isset($rawApplicant)? $rawApplicant['home_blocked_date_bs'] : null), ['placeholder' => config('fields.collateral_details.home_blocked_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'home_blocked_date_bs']) !!}
                            {!! Form::text('home_blocked_date', isset($data['row']['home_blocked_date']) ? $data['row']['home_blocked_date']->format('Y-m-d') : (isset($rawApplicant['home_blocked_date'])? $rawApplicant['home_blocked_date']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'home_blocked_date']) !!}
                            <span class="input-group-btn">
                                <button class="btn  btn-sm btn-danger" type="button" id="home_blocked_date_clear"><i class="fi fi-close"></i></button>
                            </span>
                        </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.home_invoice_number.key') }}"> {{ config('fields.collateral_details.home_invoice_number.name_np') }}	</label> {!! config('fields.collateral_details.home_invoice_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.home_invoice_number.key'), isset($data['row'][config('fields.collateral_details.home_invoice_number.key')])?$data['row'][config('fields.collateral_details.home_invoice_number.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.home_invoice_number.key')] : null), ['placeholder' => config('fields.collateral_details.home_invoice_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.home_invoice_number.key'), 'required'=>config('fields.collateral_details.home_invoice_number.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.malpot_representative.key') }}"> {{ config('fields.collateral_details.malpot_representative.name_np') }}	</label> {!! config('fields.collateral_details.malpot_representative.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.malpot_representative.key'), isset($data['row'][config('fields.collateral_details.malpot_representative.key')])?$data['row'][config('fields.collateral_details.malpot_representative.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.malpot_representative.key')] : null), ['placeholder' => config('fields.collateral_details.malpot_representative.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.malpot_representative.key'), 'required'=>config('fields.collateral_details.malpot_representative.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.malpot_representative_c_info.key') }}"> {{ config('fields.collateral_details.malpot_representative_c_info.name_np') }}	</label> {!! config('fields.collateral_details.malpot_representative_c_info.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.malpot_representative_c_info.key'), isset($data['row'][config('fields.collateral_details.malpot_representative_c_info.key')])?$data['row'][config('fields.collateral_details.malpot_representative_c_info.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.malpot_representative_c_info.key')] : null), ['placeholder' => config('fields.collateral_details.malpot_representative_c_info.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.malpot_representative_c_info.key'), 'required'=>config('fields.collateral_details.malpot_representative_c_info.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.malpot_name.key') }}"> {{ config('fields.collateral_details.malpot_name.name_np') }}	</label> {!! config('fields.collateral_details.malpot_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.malpot_name.key'), isset($data['row'][config('fields.collateral_details.malpot_name.key')])?$data['row'][config('fields.collateral_details.malpot_name.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.malpot_name.key')] : null), ['placeholder' => config('fields.collateral_details.malpot_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.malpot_name.key'), 'required'=>config('fields.collateral_details.malpot_name.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.h_collateral_valuator.key') }}"> {{ config('fields.collateral_details.h_collateral_valuator.name_np') }}	</label> {!! config('fields.collateral_details.h_collateral_valuator.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.h_collateral_valuator.key'), isset($data['row'][config('fields.collateral_details.h_collateral_valuator.key')])?$data['row'][config('fields.collateral_details.h_collateral_valuator.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.h_collateral_valuator.key')] : null), ['placeholder' => config('fields.collateral_details.h_collateral_valuator.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.h_collateral_valuator.key'), 'required'=>config('fields.collateral_details.h_collateral_valuator.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.h_collateral_amount.key') }}"> {{ config('fields.collateral_details.h_collateral_amount.name_np') }}	</label> {!! config('fields.collateral_details.h_collateral_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.h_collateral_amount.key'), isset($data['row'][config('fields.collateral_details.h_collateral_amount.key')])?$data['row'][config('fields.collateral_details.h_collateral_amount.key')]:(isset($rawApplicant)? $rawApplicant[config('fields.collateral_details.h_collateral_amount.key')] : null), ['placeholder' => config('fields.collateral_details.h_collateral_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.h_collateral_amount.key'), 'required'=>config('fields.collateral_details.h_collateral_amount.required')]) !!}
                </div>
            </div>
        </div>
        @include('admin.application.includes.homedocs')
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">जग्गा धितो दिनेको विवरण <small>( स्वयमं {{ Form::checkbox('land_lander_same_as_borrower',null,null, ['id'=>'land_lander_same_as_borrower']) }} )</small></legend>
            @if($data['row'][config('fields.collateral_details.land_lander_name.key')] == '')
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">पुरानो रेकडहरु</legend>
                <div class="form-row form-gorup">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="suggestion_type"> रेकडको किसिम	</label>
                            {!! Form::select('lander_suggestion_type', isset($data['suggestion_types'])?$data['suggestion_types']:[], (isset($data['lander_suggestion_type'])? $data['lander_suggestion_type'] : null),
                                ['class' => 'form-control select_to lander_suggestion_type' ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lander_suggestion_id"> नामहरु	</label>
                            {!! Form::select('lander_suggestion_id', isset($data['lander_suggestions'])?$data['lander_suggestions']:[], (isset($data['lander_suggestion_id'])? $data['lander_suggestion_id'] : null),
                                ['class' => 'form-control select_to lander_suggestion_id' ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group pt-4">
                        <a id="lander_fill" class="btn btn-info btn-sm lander_fill"> Fill</a>
                        <a href="{{  isset($data['row'])? route($base_route.'.edit', ['application' =>  $data['row']->application_id, 'form-name'=>'guarantor_details']) : '#' }}" class="btn btn-warning btn-sm reset"> Reset</a>
                        </div>
                    </div>
                </div>
            </fieldset>
            @endif
            <div id="land_lander_same_as_borrower_div">
                <div class="form-row form_row_margin_bottom">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="{{ config('fields.collateral_details.land_lander_name.key') }}"> {{ config('fields.collateral_details.land_lander_name.name_np') }}	</label> {!! config('fields.collateral_details.land_lander_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.collateral_details.land_lander_name.key'), isset($data['row'][config('fields.collateral_details.land_lander_name.key')])?$data['row'][config('fields.collateral_details.land_lander_name.key')]:(isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_name.key')] : null), ['placeholder' => config('fields.collateral_details.land_lander_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.land_lander_name.key')]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="{{ config('fields.collateral_details.land_lander_name_en.key') }}"> {{ config('fields.collateral_details.land_lander_name_en.name_np') }}	</label> {!! config('fields.collateral_details.land_lander_name_en.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.collateral_details.land_lander_name_en.key'), isset($data['row'][config('fields.collateral_details.land_lander_name_en.key')])?$data['row'][config('fields.collateral_details.land_lander_name_en.key')]:(isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_name_en.key')] : null), ['placeholder' => config('fields.collateral_details.land_lander_name_en.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.land_lander_name_en.key')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>{{ config('fields.collateral_details.land_lander_dob.name_np') }}</label>{!! config('fields.collateral_details.land_lander_dob.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            <div class="input-group">
                                {!! Form::text('land_lander_dob_bs', isset($data['row']['land_lander_dob_bs'])?$data['row']['land_lander_dob_bs']:(isset($data['rawLander'])? $data['rawLander']['land_lander_dob_bs'] : null), ['placeholder' => config('fields.collateral_details.land_lander_dob.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'land_lander_dob_bs']) !!}
                                {!! Form::text('land_lander_dob', isset($data['row']['land_lander_dob']) ? $data['row']['land_lander_dob']->format('Y-m-d') : (isset($data['rawLander']['land_lander_dob'])? $data['rawLander']['land_lander_dob']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'land_lander_dob']) !!}
                                <span class="input-group-btn">
                                    <button class="btn  btn-sm btn-danger" type="button" id="land_lander_dob_clear"><i class="fi fi-close"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="{{ config('fields.collateral_details.land_lander_contact_number.key') }}"> {{ config('fields.collateral_details.land_lander_contact_number.name_np') }}	</label> {!! config('fields.collateral_details.land_lander_contact_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.collateral_details.land_lander_contact_number.key'), isset($data['row'][config('fields.collateral_details.land_lander_contact_number.key')])?$data['row'][config('fields.collateral_details.land_lander_contact_number.key')]:(isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_contact_number.key')] : null), ['placeholder' => config('fields.collateral_details.land_lander_contact_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.land_lander_contact_number.key')]) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="{{ config('fields.collateral_details.land_lander_relation.key') }}"> {{ config('fields.collateral_details.land_lander_relation.name_np') }}	</label> {!! config('fields.collateral_details.land_lander_relation.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::select(config('fields.collateral_details.land_lander_relation.key'), isset($data['relations'])?$data['relations']:[], (isset($data['rawLander'][config('fields.collateral_details.land_lander_relation.key')])? $data['rawLander'][config('fields.collateral_details.land_lander_relation.key')] : null),
                        ['class' => 'form-control select_to  '.config('fields.collateral_details.land_lander_relation.key'), 'id'=>'land_lander_relation', 'required'=>config('fields.collateral_details.land_lander_relation.required') ]) !!}
                
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="{{ config('fields.collateral_details.land_lander_father_name.key') }}"> {{ config('fields.collateral_details.land_lander_father_name.name_np') }}	</label> {!! config('fields.collateral_details.land_lander_father_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.collateral_details.land_lander_father_name.key'), isset($data['row'][config('fields.collateral_details.land_lander_father_name.key')])?$data['row'][config('fields.collateral_details.land_lander_father_name.key')]:(isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_father_name.key')] : null), ['placeholder' => config('fields.collateral_details.land_lander_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.land_lander_father_name.key')]) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="{{ config('fields.collateral_details.land_lander_grand_father_name.key') }}"> {{ config('fields.collateral_details.land_lander_grand_father_name.name_np') }}	</label> {!! config('fields.collateral_details.land_lander_grand_father_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.collateral_details.land_lander_grand_father_name.key'), isset($data['row'][config('fields.collateral_details.land_lander_grand_father_name.key')])?$data['row'][config('fields.collateral_details.land_lander_grand_father_name.key')]:(isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_grand_father_name.key')] : null), ['placeholder' => config('fields.collateral_details.land_lander_grand_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.land_lander_grand_father_name.key')]) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="{{ config('fields.collateral_details.land_lander_spouse_name.key') }}"> {{ config('fields.collateral_details.land_lander_spouse_name.name_np') }}	</label> {!! config('fields.collateral_details.land_lander_spouse_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.collateral_details.land_lander_spouse_name.key'), isset($data['row'][config('fields.collateral_details.land_lander_spouse_name.key')])?$data['row'][config('fields.collateral_details.land_lander_spouse_name.key')]:(isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_spouse_name.key')] : null), ['placeholder' => config('fields.collateral_details.land_lander_spouse_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.land_lander_spouse_name.key')]) !!}
                        </div>
                    </div>
                    
                </div>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">स्थायी ठेगाना</legend>
                    <div class="form-row form_row_margin_bottom">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for=" ">{{ config('fields.collateral_details.land_lander_p_province.name_np') }}</label>  {!! config('fields.collateral_details.land_lander_p_province.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::select('land_lander_p_province', isset($data['provinces'])?$data['provinces']:[], (isset($data['rawLander'])? $data['rawLander']['land_lander_p_province'] : null),
                                ['class' => 'form-control select_to  land_lander_p_province']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=" ">{{ config('fields.collateral_details.land_lander_p_district.name_np') }}</label>  {!! config('fields.collateral_details.land_lander_p_district.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::select('land_lander_p_district',isset($data['land_lander_p_districts'])?$data['land_lander_p_districts']:[], (isset($data['rawLander'])? $data['rawLander']['land_lander_p_district'] : null),
                                ['class' => 'form-control select_to land_lander_p_district']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=" ">{{ config('fields.collateral_details.land_lander_p_localgovt.name_np') }}</label>  {!! config('fields.collateral_details.land_lander_p_localgovt.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!!Form::select('land_lander_p_localgovt',isset($data['land_lander_p_localgovts'])?$data['land_lander_p_localgovts']:[], (isset($data['rawLander'])? $data['rawLander']['land_lander_p_localgovt'] : null),
                                ['class' => 'form-control  select_to land_lander_p_localgovt']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="{{ config('fields.collateral_details.land_lander_p_ward.key') }}"> {{ config('fields.collateral_details.land_lander_p_ward.name_np') }} </label> {!! config('fields.collateral_details.land_lander_p_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!!Form::select('land_lander_p_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'), (isset($data['rawLander'])? $data['rawLander']['land_lander_p_ward'] : null),
                                ['class' => 'form-control  select_to land_lander_p_ward', 'id'=> 'land_lander_p_ward']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="{{ config('fields.collateral_details.land_lander_p_tole.key') }}"> {{ config('fields.collateral_details.land_lander_p_tole.name_np') }} </label> {!! config('fields.collateral_details.land_lander_p_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.collateral_details.land_lander_p_tole.key'), isset($data['row'][config('fields.collateral_details.land_lander_p_tole.key')])?$data['row'][config('fields.collateral_details.land_lander_p_tole.key')]:(isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_p_tole.key')] : null), ['placeholder' => config('fields.collateral_details.land_lander_p_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.land_lander_p_tole.key')]) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="{{ config('fields.collateral_details.land_lander_former_address.key') }}"> {{ config('fields.collateral_details.land_lander_former_address.name_np') }} </label> {!! config('fields.collateral_details.land_lander_former_address.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.collateral_details.land_lander_former_address.key'), isset($data['row'][config('fields.collateral_details.land_lander_former_address.key')])?$data['row'][config('fields.collateral_details.land_lander_former_address.key')]:(isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_former_address.key')] : null), ['placeholder' => config('fields.collateral_details.land_lander_former_address.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.land_lander_former_address.key')]) !!}
                            </div>
                        </div>

                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">अस्थायी ठेगाना <small>( स्थायी जस्तै {{ Form::checkbox('land_lander_same_as_permanent',null,null, ['id'=>'land_lander_same_as_permanent']) }} )</small></legend>
                    <div class="form-row form_row_margin_bottom" id="land_lander_same_as_permanent_text">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for=" ">{{ config('fields.collateral_details.land_lander_t_province.name_np') }}</label> {!! config('fields.collateral_details.land_lander_t_province.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::select('land_lander_t_province', isset($data['provinces'])?$data['provinces']:[], (isset($data['rawLander'])? $data['rawLander']['land_lander_t_province'] : null),
                                ['class' => 'form-control select_to  land_lander_t_province']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=" ">{{ config('fields.collateral_details.land_lander_t_district.name_np') }}</label> {!! config('fields.collateral_details.land_lander_t_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::select('land_lander_t_district',isset($data['land_lander_t_districts'])?$data['land_lander_t_districts']:[], (isset($data['rawLander'])? $data['rawLander']['land_lander_t_district'] : null),
                                ['class' => 'form-control select_to land_lander_t_district']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=" ">{{ config('fields.collateral_details.land_lander_t_localgovt.name_np') }}</label> {!! config('fields.collateral_details.land_lander_t_localgovt.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!!Form::select('land_lander_t_localgovt',isset($data['land_lander_t_localgovts'])?$data['land_lander_t_localgovts']:[], (isset($data['rawLander'])? $data['rawLander']['land_lander_t_localgovt'] : null),
                                ['class' => 'form-control  select_to land_lander_t_localgovt']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="{{ config('fields.collateral_details.land_lander_t_ward.key') }}"> {{ config('fields.collateral_details.land_lander_t_ward.name_np') }} </label> {!! config('fields.collateral_details.land_lander_t_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!!Form::select('land_lander_t_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'), (isset($data['rawLander'])? $data['rawLander']['land_lander_t_ward'] : null),
                                ['class' => 'form-control  select_to land_lander_t_ward', 'id'=>'land_lander_t_ward']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="{{ config('fields.collateral_details.land_lander_t_tole.key') }}"> {{ config('fields.collateral_details.land_lander_t_tole.name_np') }} </label> {!! config('fields.collateral_details.land_lander_t_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.collateral_details.land_lander_t_tole.key'), isset($data['row'][config('fields.collateral_details.land_lander_t_tole.key')])?$data['row'][config('fields.collateral_details.land_lander_t_tole.key')]:(isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_t_tole.key')] : null), ['placeholder' => config('fields.collateral_details.land_lander_t_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.land_lander_t_tole.key')]) !!}
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">नागरिकता विवरण</legend>
                    <div class="form-row form_row_margin_bottom">
                
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="{{ config('fields.collateral_details.land_lander_citizenship_number.key') }}"> {{ config('fields.collateral_details.land_lander_citizenship_number.name_np') }}	</label> {!! config('fields.collateral_details.land_lander_citizenship_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.collateral_details.land_lander_citizenship_number.key'), isset($data['row'][config('fields.collateral_details.land_lander_citizenship_number.key')])?$data['row'][config('fields.collateral_details.land_lander_citizenship_number.key')]:(isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_citizenship_number.key')] : null), ['placeholder' => config('fields.collateral_details.land_lander_citizenship_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.land_lander_citizenship_number.key')]) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ config('fields.collateral_details.land_lander_citizenship_issue_date.name_np') }}</label> {!! config('fields.collateral_details.land_lander_citizenship_issue_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                <div class="input-group">
                                    {!! Form::text('land_lander_citizenship_issue_date_bs', isset($data['row']['land_lander_citizenship_issue_date_bs'])?$data['row']['land_lander_citizenship_issue_date_bs']:(isset($data['rawLander'])? $data['rawLander']['land_lander_citizenship_issue_date_bs'] : null), ['placeholder' => config('fields.collateral_details.land_lander_citizenship_issue_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'land_lander_citizenship_issue_date_bs']) !!}
                                    {!! Form::text('land_lander_citizenship_issue_date', isset($data['row']['land_lander_citizenship_issue_date']) ? $data['row']['land_lander_citizenship_issue_date']->format('Y-m-d') : (isset($data['rawLander']['land_lander_citizenship_issue_date'])? $data['rawLander']['land_lander_citizenship_issue_date']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'land_lander_citizenship_issue_date']) !!}
                                    <span class="input-group-btn">
                                        <button class="btn  btn-sm btn-danger" type="button" id="land_lander_citizenship_issue_date_clear"><i class="fi fi-close"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ config('fields.collateral_details.land_lander_citizenship_issue_district.name_np') }}</label> {!! config('fields.collateral_details.land_lander_citizenship_issue_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::select(config('fields.collateral_details.land_lander_citizenship_issue_district.key'), isset($data['districts'])?$data['districts']:[], (isset($data['rawLander'])? $data['rawLander'][config('fields.collateral_details.land_lander_citizenship_issue_district.key')] : null),
                                ['class' => 'form-control select_to  '.config('fields.collateral_details.land_lander_citizenship_issue_district.key'), 'id'=>config('fields.collateral_details.land_lander_citizenship_issue_district.key') ]) !!}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label> अगाडिको फोटो </label>
                            @if(isset($data['row']['land_lander_citizenship_front']) && $data['row']['land_lander_citizenship_front'])
                            <a fileType="land_lander_citizenship_front" fileName="{{ $data['row']['land_lander_citizenship_front']}}" data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                                <?php $pathinfo = pathinfo($data['row']['land_lander_citizenship_front']); ?>
                                @if($data['row']['land_lander_citizenship_front'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                                    <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['land_lander_citizenship_front']]) }}" class='img-responsive' style="max-height:100px;">
                                @elseif($data['row']['land_lander_citizenship_front'] && ($pathinfo['extension']=='pdf'))
                                    <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['land_lander_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                                @endif
                            @else
                            <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                            <input type="file" name="land_lander_citizenship_front" id="land_lander_citizenship_front_image">
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label> पछाडिको फोटो </label>
                            
                            @if(isset($data['row']['land_lander_citizenship_back']) && $data['row']['land_lander_citizenship_back'])
                                <a fileType="land_lander_citizenship_back" fileName="{{ $data['row']['land_lander_citizenship_back']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                                <?php $pathinfo = pathinfo($data['row']['land_lander_citizenship_back']); ?>
                                @if($data['row']['land_lander_citizenship_back'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                                    <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['land_lander_citizenship_back']]) }}" class='img-responsive' style="max-height:100px;">
                                @elseif($data['row']['land_lander_citizenship_back'] && ($pathinfo['extension']=='pdf'))
                                    <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['land_lander_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                                @endif
                            @else
                            <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                            <input type="file" name="land_lander_citizenship_back" id="land_lander_citizenship_back_image">
                            @endif
            
                        </div>  
                    </div>
                </fieldset>
            </div>
        </fieldset>
        @include('admin.application.includes.anshiyar1')
        @include('admin.application.includes.anshiyar2')
    </fieldset>
</div>