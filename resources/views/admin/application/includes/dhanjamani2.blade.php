<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border"> 
            <a  data-toggle="collapse" href="#collapseguarantor2" role="button" aria-expanded="false" aria-controls="collapseguarantor2">
                <span>धनजमानी फारम (2)</span>
                <span class="group-icon">
                    <i class="fi fi-arrow-end-slim"></i>
                    <i class="fi fi-arrow-down-slim"></i>
                </span>
            </a>
        </legend>
        
        <div class="{{ (isset($data['row']['guarantor2_name']) && $data['row']['guarantor2_name']!=null) || isset($data['g2_suggestion_id']) ? '': 'collapse' }}" id="collapseguarantor2">
            @if($data['row'][config('fields.guarantor_details.guarantor2_name.key')] == '')
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">पुरानो रेकडहरु</legend>
                <div class="form-row form-gorup">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="suggestion_type"> रेकडको किसिम	</label>
                            {!! Form::select('g2_suggestion_type', isset($data['suggestion_types'])?$data['suggestion_types']:[], (isset($data['g2_suggestion_type'])? $data['g2_suggestion_type'] : null),
                                ['class' => 'form-control select_to g2_suggestion_type' ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="g2_suggestion_id"> खोज्नुहोस्	</label>
                            {!! Form::select('g2_suggestion_id', isset($data['g2_suggestions'])?$data['g2_suggestions']:[], (isset($data['g1_suggestion_id'])? $data['g2_suggestion_id'] : null),
                                ['class' => 'form-control select_to  '.'g2_suggestion_id' ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group pt-4">
                        <a id="guaranter2_fill" class="btn btn-info btn-sm guaranter2_fill"> Fill</a>
                        <a href="{{  isset($data['row'])? route($base_route.'.edit', ['application' =>  $data['row']->application_id, 'form-name'=>'guarantor_details']) : '#' }}" class="btn btn-warning btn-sm reset"> Reset</a>
                        </div>
                    </div>
                </div>
            </fieldset>
            @endif
            <div class="form-row form_row_margin_bottom">
                <div class="col-md-3 ">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor2_name.key') }}"> {{ config('fields.guarantor_details.guarantor2_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor2_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.guarantor2_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor2_name.key')])?$data['row'][config('fields.guarantor_details.guarantor2_name.key')] : null, ['placeholder' => config('fields.guarantor_details.guarantor2_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor2_name.key'), 'required'=>config('fields.guarantor_details.guarantor2_name.required')]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor2_father_name.key') }}"> {{ config('fields.guarantor_details.guarantor2_father_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor2_father_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.guarantor2_father_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor2_father_name.key')])?$data['row'][config('fields.guarantor_details.guarantor2_father_name.key')] : null, ['placeholder' => config('fields.guarantor_details.guarantor2_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor2_father_name.key'), 'required'=>config('fields.guarantor_details.guarantor2_father_name.required')]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="{{ config('fields.guarantor_details.guarantor2_grand_father_name.key') }}"> {{ config('fields.guarantor_details.guarantor2_grand_father_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor2_grand_father_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.guarantor_details.guarantor2_grand_father_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor2_grand_father_name.key')])?$data['row'][config('fields.guarantor_details.guarantor2_grand_father_name.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor2_grand_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor2_grand_father_name.key'), 'required'=>config('fields.guarantor_details.guarantor2_grand_father_name.required')]) !!}
                </div>
                <div class="col-md-3 ">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor2_dob.key') }}"> {{ config('fields.guarantor_details.guarantor2_dob.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor2_dob.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        <div class="input-group">
                            {!! Form::text('guarantor2_dob_bs', isset($data['row']['guarantor2_dob_bs'])?$data['row']['guarantor2_dob_bs']: null, ['placeholder' => config('fields.guarantor_details.guarantor2_dob.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'guarantor2_dob_bs']) !!}
                            {!! Form::text('guarantor2_dob', isset($data['row']['guarantor2_dob']) ? $data['row']['guarantor2_dob']->format('Y-m-d') :null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'guarantor2_dob']) !!}
                            <span class="input-group-btn">
                                <button class="btn  btn-sm btn-danger" type="button" id="guarantor2_dob_clear"><i class="fi fi-close"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor2_spouse_name.key') }}"> {{ config('fields.guarantor_details.guarantor2_spouse_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor2_spouse_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.guarantor2_spouse_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor2_spouse_name.key')])?$data['row'][config('fields.guarantor_details.guarantor2_spouse_name.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor2_spouse_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor2_spouse_name.key'), 'required'=>config('fields.guarantor_details.guarantor2_spouse_name.required')]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor2_contact_number.key') }}"> {{ config('fields.guarantor_details.guarantor2_contact_number.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor2_contact_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.guarantor2_contact_number.key'), isset($data['row'][config('fields.guarantor_details.guarantor2_contact_number.key')])?$data['row'][config('fields.guarantor_details.guarantor2_contact_number.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor2_contact_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor2_contact_number.key'), 'required'=>config('fields.guarantor_details.guarantor2_contact_number.required')]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor2_relation.key') }}"> {{ config('fields.guarantor_details.guarantor2_relation.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor2_relation.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select(config('fields.guarantor_details.guarantor2_relation.key'), isset($data['relations'])?$data['relations']:[], null,
                    ['class' => 'form-control select_to  '.config('fields.guarantor_details.guarantor2_relation.key'), 'required'=>config('fields.guarantor_details.guarantor2_relation.required') ]) !!}
            
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor2_subscription_id.key') }}"> {{ config('fields.guarantor_details.guarantor2_subscription_id.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor2_subscription_id.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.guarantor2_subscription_id.key'), isset($data['row'][config('fields.guarantor_details.guarantor2_subscription_id.key')])?$data['row'][config('fields.guarantor_details.guarantor2_subscription_id.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor2_subscription_id.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor2_subscription_id.key'), 'required'=>config('fields.guarantor_details.guarantor2_subscription_id.required')]) !!}
                    </div>
                </div>
            </div>


            <fieldset class="scheduler-border">
                <legend class="scheduler-border">स्थायी ठेगाना </legend>
                <div class="form-row   form_row_margin_bottom">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g2_p_province.key') }}">{{ config('fields.guarantor_details.g2_p_province.name_np') }}</label> {!! config('fields.guarantor_details.g2_p_province.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('g2_p_province', isset($data['provinces'])?$data['provinces']:[], null,
                        ['class' => 'form-control select_to  g2_p_province']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g2_p_district.key') }}">{{ config('fields.guarantor_details.g2_p_district.name_np') }}</label> {!! config('fields.guarantor_details.g2_p_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('g2_p_district',isset($data['g2_p_districts'])?$data['g2_p_districts']:[], null,
                        ['class' => 'form-control select_to g2_p_district']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g2_p_localgovt.key') }}">{{ config('fields.guarantor_details.g2_p_localgovt.name_np') }}</label> {!! config('fields.guarantor_details.g2_p_localgovt.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('g2_p_localgovt',isset($data['g2_p_localgovts'])?$data['g2_p_localgovts']:[], null,
                        ['class' => 'form-control  select_to g2_p_localgovt']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g2_p_ward.key') }}">{{ config('fields.guarantor_details.g2_p_ward.name_np') }}</label> {!! config('fields.guarantor_details.g2_p_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('g2_p_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'), null,
                        ['class' => 'form-control  select_to g2_p_ward', 'id'=>'g2_p_ward']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g2_p_tole.key') }}">{{ config('fields.guarantor_details.g2_p_tole.name_np') }}</label> {!! config('fields.guarantor_details.g2_p_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.g2_p_tole.key'), isset($data['row'][config('fields.guarantor_details.g2_p_tole.key')])?$data['row'][config('fields.guarantor_details.g2_p_tole.key')]: null, ['placeholder' => config('fields.guarantor_details.g2_p_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.g2_p_tole.key'), 'required'=>config('fields.guarantor_details.g2_p_tole.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="{{ config('fields.guarantor_details.g2_former_address.key') }}"> {{ config('fields.guarantor_details.g2_former_address.name_np') }} </label> {!! config('fields.guarantor_details.g2_former_address.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.guarantor_details.g2_former_address.key'), isset($data['row'][config('fields.guarantor_details.g2_former_address.key')])?$data['row'][config('fields.guarantor_details.g2_former_address.key')]: null, ['placeholder' => config('fields.guarantor_details.g2_former_address.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.g2_former_address.key')]) !!}
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border">
                <legend class="scheduler-border">अस्थायी ठेगाना <small>( स्थायी जस्तै {{ Form::checkbox('g2_same_as_permanent',null,null, ['id'=>'g2_same_as_permanent']) }} )</small></legend>
                <div class="form-row  form_row_margin_bottom" id="g2_same_as_permanent_text">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g2_t_province.key') }}">{{ config('fields.guarantor_details.g2_t_province.name_np') }}</label> {!! config('fields.guarantor_details.g2_t_province.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('g2_t_province', isset($data['provinces'])?$data['provinces']:[], null,
                        ['class' => 'form-control select_to  g2_t_province']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g2_t_district.key') }}">{{ config('fields.guarantor_details.g2_t_district.name_np') }}</label> {!! config('fields.guarantor_details.g2_t_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('g2_t_district',isset($data['g2_t_districts'])?$data['g2_t_districts']:[], null,
                        ['class' => 'form-control select_to g2_t_district']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g2_t_localgovt.key') }}">{{ config('fields.guarantor_details.g2_t_localgovt.name_np') }}</label> {!! config('fields.guarantor_details.g2_t_localgovt.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('g2_t_localgovt',isset($data['g2_t_localgovts'])?$data['g2_t_localgovts']:[], null,
                        ['class' => 'form-control  select_to g2_t_localgovt']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g2_t_ward.key') }}">{{ config('fields.guarantor_details.g2_t_ward.name_np') }}</label> {!! config('fields.guarantor_details.g2_t_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('g2_t_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'), null,
                        ['class' => 'form-control  select_to g2_t_ward', 'id'=>'g2_t_ward']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g2_t_tole.key') }}">{{ config('fields.guarantor_details.g2_t_tole.name_np') }}</label> {!! config('fields.guarantor_details.g2_t_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.g2_t_tole.key'), isset($data['row'][config('fields.guarantor_details.g2_t_tole.key')])?$data['row'][config('fields.guarantor_details.g2_t_tole.key')]: null, ['placeholder' => config('fields.guarantor_details.g2_t_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.g2_t_tole.key')]) !!}
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border">
                <legend class="scheduler-border">नागरिकता विवरण</legend>
                <div class="form-row form_row_margin_bottom">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="{{ config('fields.guarantor_details.g2_citizenship_number.key') }}"> {{ config('fields.guarantor_details.g2_citizenship_number.name_np') }}	</label> {!! config('fields.guarantor_details.g2_citizenship_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.guarantor_details.g2_citizenship_number.key'), isset($data['row'][config('fields.guarantor_details.g2_citizenship_number.key')])?$data['row'][config('fields.guarantor_details.g2_citizenship_number.key')]: null, ['placeholder' => config('fields.guarantor_details.g2_citizenship_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.g2_citizenship_number.key'), 'required'=>config('fields.guarantor_details.g2_citizenship_number.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">{{ config('fields.guarantor_details.g2_citizenship_issue_date.name_np') }}</label> {!! config('fields.guarantor_details.g2_citizenship_issue_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            <div class="input-group">
                                {!! Form::text('g2_citizenship_issue_date_bs', isset($data['row']['g2_citizenship_issue_date_bs'])?$data['row']['g2_citizenship_issue_date_bs']: null, ['placeholder' => config('fields.guarantor_details.g2_citizenship_issue_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'g2_citizenship_issue_date_bs']) !!}
                                {!! Form::text('g2_citizenship_issue_date', isset($data['row']['g2_citizenship_issue_date']) ? $data['row']['g2_citizenship_issue_date']->format('Y-m-d') :null , ['class' => 'hidden', 'style'=>'display:none', 'id' => 'g2_citizenship_issue_date']) !!}
                                <span class="input-group-btn">
                                    <button class="btn  btn-sm btn-danger" type="button" id="g2_citizenship_issue_date_clear"><i class="fi fi-close"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ config('fields.guarantor_details.g2_citizenship_issue_district.name_np') }}</label> {!! config('fields.guarantor_details.g2_citizenship_issue_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::select(config('fields.guarantor_details.g2_citizenship_issue_district.key'), isset($data['districts'])?$data['districts']:[], null,
                                ['class' => 'form-control select_to  '.config('fields.guarantor_details.g2_citizenship_issue_district.key'), 'id'=>config('fields.guarantor_details.g2_citizenship_issue_district.key'), 'required'=>config('fields.guarantor_details.g2_citizenship_issue_district.required') ]) !!}
                            </div>
                    </div>
                </div>
                @include('admin.application.includes.dhanjamanidocs', ['var'=> 'g2'])
            </fieldset>
            @if($loan_type == 'general')
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"> 
                    <a  data-toggle="collapse" href="#collapseguarantorgeneral2" role="button" aria-expanded="false" aria-controls="collapseguarantorgeneral2">
                        <span>संस्थामा रहेको बचत तथा शेयरको विवरण</span>
                        <span class="group-icon">
                            <i class="fi fi-arrow-end-slim"></i>
                            <i class="fi fi-arrow-down-slim"></i>
                        </span>
                    </a>
                </legend>
                <div class="{{ isset($data['row']['guarantor2_saving_title']) && $data['row']['guarantor2_saving_title']!=null ? '': 'collapse' }}" id="collapseguarantorgeneral2">
                    <div class="form-row form_row_margin_bottom">
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="{{ config('fields.guarantor_details.guarantor2_saving_title.key') }}"> {{ config('fields.guarantor_details.guarantor2_saving_title.name_np') }}</label> {!! config('fields.guarantor_details.guarantor2_saving_title.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.guarantor_details.guarantor2_saving_title.key'), isset($data['request'][config('fields.guarantor_details.guarantor2_saving_title.key')])?$data['request'][config('fields.guarantor_details.guarantor2_saving_title.key')] : null, ['placeholder' => config('fields.guarantor_details.guarantor2_saving_title.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor2_saving_title.key'), 'required'=>config('fields.guarantor_details.guarantor2_saving_title.required')]) !!}
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="{{ config('fields.guarantor_details.guarantor2_saving_amount.key') }}"> {{ config('fields.guarantor_details.guarantor2_saving_amount.name_np') }}</label> {!! config('fields.guarantor_details.guarantor2_saving_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.guarantor_details.guarantor2_saving_amount.key'), isset($data['request'][config('fields.guarantor_details.guarantor2_saving_amount.key')])?$data['request'][config('fields.guarantor_details.guarantor2_saving_amount.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor2_saving_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor2_saving_amount.key'), 'required'=>config('fields.guarantor_details.guarantor2_saving_amount.required')]) !!}
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="{{ config('fields.guarantor_details.guarantor2_share_amount.key') }}"> {{ config('fields.guarantor_details.guarantor2_share_amount.name_np') }}</label> {!! config('fields.guarantor_details.guarantor2_share_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.guarantor_details.guarantor2_share_amount.key'), isset($data['request'][config('fields.guarantor_details.guarantor2_share_amount.key')])?$data['request'][config('fields.guarantor_details.guarantor2_share_amount.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor2_share_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor2_share_amount.key'), 'required'=>config('fields.guarantor_details.guarantor2_share_amount.required')]) !!}
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="{{ config('fields.guarantor_details.guarantor2_agreed_amount.key') }}"> {{ config('fields.guarantor_details.guarantor2_agreed_amount.name_np') }}</label> {!! config('fields.guarantor_details.guarantor2_agreed_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.guarantor_details.guarantor2_agreed_amount.key'), isset($data['request'][config('fields.guarantor_details.guarantor2_agreed_amount.key')])?$data['request'][config('fields.guarantor_details.guarantor2_agreed_amount.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor2_agreed_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor2_agreed_amount.key'), 'required'=>config('fields.guarantor_details.guarantor2_agreed_amount.required')]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            @endif
        </div>
    </fieldset>
</div>  