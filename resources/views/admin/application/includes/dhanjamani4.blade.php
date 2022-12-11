<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border"> 
            <a  data-toggle="collapse" href="#collapseguarantor4" role="button" aria-expanded="false" aria-controls="collapseguarantor4">
                <span>धनजमानी फारम (4)</span>
                <span class="group-icon">
                    <i class="fi fi-arrow-end-slim"></i>
                    <i class="fi fi-arrow-down-slim"></i>
                </span>
            </a>
        </legend>
        <div class="{{ isset($data['row']['guarantor4_name']) && $data['row']['guarantor4_name']!=null ? '': 'collapse' }}" id="collapseguarantor4">
            <div class="form-row form_row_margin_bottom">
                <div class="col-md-3 ">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor4_name.key') }}"> {{ config('fields.guarantor_details.guarantor4_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor4_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.guarantor4_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor4_name.key')])?$data['row'][config('fields.guarantor_details.guarantor4_name.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_name.key'), 'required'=>config('fields.guarantor_details.guarantor4_name.required')]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor4_father_name.key') }}"> {{ config('fields.guarantor_details.guarantor4_father_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor4_father_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.guarantor4_father_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor4_father_name.key')])?$data['row'][config('fields.guarantor_details.guarantor4_father_name.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_father_name.key'), 'required'=>config('fields.guarantor_details.guarantor4_father_name.required')]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="{{ config('fields.guarantor_details.guarantor4_grand_father_name.key') }}"> {{ config('fields.guarantor_details.guarantor4_grand_father_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor4_grand_father_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.guarantor_details.guarantor4_grand_father_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor4_grand_father_name.key')])?$data['row'][config('fields.guarantor_details.guarantor4_grand_father_name.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_grand_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_grand_father_name.key'), 'required'=>config('fields.guarantor_details.guarantor4_grand_father_name.required')]) !!}
                </div>
                <div class="col-md-3 ">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor4_dob.key') }}"> {{ config('fields.guarantor_details.guarantor4_dob.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor4_dob.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        <div class="input-group">
                            {!! Form::text('guarantor4_dob_bs', isset($data['row']['guarantor4_dob_bs'])?$data['row']['guarantor4_dob_bs']:null, ['placeholder' => config('fields.guarantor_details.guarantor4_dob.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'guarantor4_dob_bs']) !!}
                            {!! Form::text('guarantor4_dob', isset($data['row']['guarantor4_dob']) ? $data['row']['guarantor4_dob']->format('Y-m-d') : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'guarantor4_dob']) !!}
                            <span class="input-group-btn">
                                <button class="btn  btn-sm btn-danger" type="button" id="guarantor4_dob_clear"><i class="fi fi-close"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor4_spouse_name.key') }}"> {{ config('fields.guarantor_details.guarantor4_spouse_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor4_spouse_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.guarantor4_spouse_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor4_spouse_name.key')])?$data['row'][config('fields.guarantor_details.guarantor4_spouse_name.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_spouse_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_spouse_name.key'), 'required'=>config('fields.guarantor_details.guarantor4_spouse_name.required')]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor4_contact_number.key') }}"> {{ config('fields.guarantor_details.guarantor4_contact_number.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor4_contact_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.guarantor4_contact_number.key'), isset($data['row'][config('fields.guarantor_details.guarantor4_contact_number.key')])?$data['row'][config('fields.guarantor_details.guarantor4_contact_number.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_contact_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_contact_number.key'), 'required'=>config('fields.guarantor_details.guarantor4_contact_number.required')]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor4_relation.key') }}"> {{ config('fields.guarantor_details.guarantor4_relation.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor4_relation.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select(config('fields.guarantor_details.guarantor4_relation.key'), isset($data['relations'])?$data['relations']:[], null,
                    ['class' => 'form-control select_to  '.config('fields.guarantor_details.guarantor4_relation.key'), 'required'=>config('fields.guarantor_details.guarantor4_relation.required') ]) !!}
            
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.guarantor4_subscription_id.key') }}"> {{ config('fields.guarantor_details.guarantor4_subscription_id.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor4_subscription_id.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.guarantor4_subscription_id.key'), isset($data['row'][config('fields.guarantor_details.guarantor4_subscription_id.key')])?$data['row'][config('fields.guarantor_details.guarantor4_subscription_id.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_subscription_id.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_subscription_id.key'), 'required'=>config('fields.guarantor_details.guarantor4_subscription_id.required')]) !!}
                    </div>
                </div>
            </div>


            <fieldset class="scheduler-border">
                <legend class="scheduler-border">स्थायी ठेगाना </legend>
                <div class="form-row   form_row_margin_bottom">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g4_p_province.key') }}">{{ config('fields.guarantor_details.g4_p_province.name_np') }}</label> {!! config('fields.guarantor_details.g4_p_province.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('g4_p_province', isset($data['provinces'])?$data['provinces']:[],  null,
                        ['class' => 'form-control select_to  g4_p_province']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g4_p_district.key') }}">{{ config('fields.guarantor_details.g4_p_district.name_np') }}</label> {!! config('fields.guarantor_details.g4_p_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('g4_p_district',isset($data['g4_p_districts'])?$data['g4_p_districts']:[],  null,
                        ['class' => 'form-control select_to g4_p_district']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g4_p_localgovt.key') }}">{{ config('fields.guarantor_details.g4_p_localgovt.name_np') }}</label> {!! config('fields.guarantor_details.g4_p_localgovt.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('g4_p_localgovt',isset($data['g4_p_localgovts'])?$data['g4_p_localgovts']:[],  null,
                        ['class' => 'form-control  select_to g4_p_localgovt']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g4_p_ward.key') }}">{{ config('fields.guarantor_details.g4_p_ward.name_np') }}</label> {!! config('fields.guarantor_details.g4_p_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('g4_p_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'),  null,
                        ['class' => 'form-control  select_to g4_p_ward']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g4_p_tole.key') }}">{{ config('fields.guarantor_details.g4_p_tole.name_np') }}</label> {!! config('fields.guarantor_details.g4_p_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.g4_p_tole.key'), isset($data['row'][config('fields.guarantor_details.g4_p_tole.key')])?$data['row'][config('fields.guarantor_details.g4_p_tole.key')]: null, ['placeholder' => config('fields.guarantor_details.g4_p_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.g4_p_tole.key'), 'required'=>config('fields.guarantor_details.g4_p_tole.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="{{ config('fields.guarantor_details.g4_former_address.key') }}"> {{ config('fields.guarantor_details.g4_former_address.name_np') }} </label> {!! config('fields.guarantor_details.g4_former_address.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.guarantor_details.g4_former_address.key'), isset($data['row'][config('fields.guarantor_details.g4_former_address.key')])?$data['row'][config('fields.guarantor_details.g4_former_address.key')]: null, ['placeholder' => config('fields.guarantor_details.g4_former_address.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.g4_former_address.key')]) !!}
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border">
                <legend class="scheduler-border">अस्थायी ठेगाना <small>( स्थायी जस्तै {{ Form::checkbox('g4_same_as_permanent',null,null, ['id'=>'g4_same_as_permanent']) }} )</small></legend>
                <div class="form-row  form_row_margin_bottom" id="g4_same_as_permanent_text">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g4_t_province.key') }}">{{ config('fields.guarantor_details.g4_t_province.name_np') }}</label> {!! config('fields.guarantor_details.g4_t_province.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('g4_t_province', isset($data['provinces'])?$data['provinces']:[],  null,
                        ['class' => 'form-control select_to  g4_t_province']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g4_t_district.key') }}">{{ config('fields.guarantor_details.g4_t_district.name_np') }}</label> {!! config('fields.guarantor_details.g4_t_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('g4_t_district',isset($data['g4_t_districts'])?$data['g4_t_districts']:[],  null,
                        ['class' => 'form-control select_to g4_t_district']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g4_t_localgovt.key') }}">{{ config('fields.guarantor_details.g4_t_localgovt.name_np') }}</label> {!! config('fields.guarantor_details.g4_t_localgovt.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('g4_t_localgovt',isset($data['g4_t_localgovts'])?$data['g4_t_localgovts']:[],  null,
                        ['class' => 'form-control  select_to g4_t_localgovt']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g4_t_ward.key') }}">{{ config('fields.guarantor_details.g4_t_ward.name_np') }}</label> {!! config('fields.guarantor_details.g4_t_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('g4_t_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'),  null,
                        ['class' => 'form-control  select_to g4_t_ward']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.guarantor_details.g4_t_tole.key') }}">{{ config('fields.guarantor_details.g4_t_tole.name_np') }}</label> {!! config('fields.guarantor_details.g4_t_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.guarantor_details.g4_t_tole.key'), isset($data['row'][config('fields.guarantor_details.g4_t_tole.key')])?$data['row'][config('fields.guarantor_details.g4_t_tole.key')]: null, ['placeholder' => config('fields.guarantor_details.g4_t_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.g4_t_tole.key')]) !!}
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border">
                <legend class="scheduler-border">नागरिकता विवरण</legend>
                <div class="form-row form_row_margin_bottom">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="{{ config('fields.guarantor_details.g4_citizenship_number.key') }}"> {{ config('fields.guarantor_details.g4_citizenship_number.name_np') }}	</label> {!! config('fields.guarantor_details.g4_citizenship_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.guarantor_details.g4_citizenship_number.key'), isset($data['row'][config('fields.guarantor_details.g4_citizenship_number.key')])?$data['row'][config('fields.guarantor_details.g4_citizenship_number.key')]: null, ['placeholder' => config('fields.guarantor_details.g4_citizenship_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.g4_citizenship_number.key'), 'required'=>config('fields.guarantor_details.g4_citizenship_number.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">{{ config('fields.guarantor_details.g4_citizenship_issue_date.name_np') }}</label> {!! config('fields.guarantor_details.g4_citizenship_issue_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            <div class="input-group">
                                {!! Form::text('g4_citizenship_issue_date_bs', isset($data['row']['g4_citizenship_issue_date_bs'])?$data['row']['g4_citizenship_issue_date_bs']: null, ['placeholder' => config('fields.guarantor_details.g4_citizenship_issue_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'g4_citizenship_issue_date_bs']) !!}
                                {!! Form::text('g4_citizenship_issue_date', isset($data['row']['g4_citizenship_issue_date']) ? $data['row']['g4_citizenship_issue_date']->format('Y-m-d') : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'g4_citizenship_issue_date']) !!}
                                <span class="input-group-btn">
                                    <button class="btn  btn-sm btn-danger" type="button" id="g4_citizenship_issue_date_clear"><i class="fi fi-close"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ config('fields.guarantor_details.g4_citizenship_issue_district.name_np') }}</label> {!! config('fields.guarantor_details.g4_citizenship_issue_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::select(config('fields.guarantor_details.g4_citizenship_issue_district.key'), isset($data['districts'])?$data['districts']:[],  null,
                                ['class' => 'form-control select_to  '.config('fields.guarantor_details.g4_citizenship_issue_district.key'), 'required'=>config('fields.guarantor_details.g4_citizenship_issue_district.required') ]) !!}
                            </div>
                    </div>
                </div>
                @include('admin.application.includes.dhanjamanidocs', ['var'=> 'g4'])
            </fieldset>
            @if($loan_type == 'general')
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"> 
                    <a  data-toggle="collapse" href="#collapseguarantorgeneral4" role="button" aria-expanded="false" aria-controls="collapseguarantorgeneral4">
                        <span>संस्थामा रहेको बचत तथा शेयरको विवरण</span>
                        <span class="group-icon">
                            <i class="fi fi-arrow-end-slim"></i>
                            <i class="fi fi-arrow-down-slim"></i>
                        </span>
                    </a>
                </legend>
                <div class="{{ isset($data['row']['guarantor4_subscription_number']) && $data['row']['guarantor4_subscription_number']!=null ? '': 'collapse' }}" id="collapseguarantorgeneral4">
                    <div class="form-row form_row_margin_bottom">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="{{ config('fields.guarantor_details.guarantor4_subscription_number.key') }}"> {{ config('fields.guarantor_details.guarantor4_subscription_number.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor4_subscription_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.guarantor_details.guarantor4_subscription_number.key'), isset($data['request'][config('fields.guarantor_details.guarantor4_subscription_number.key')])?$data['request'][config('fields.guarantor_details.guarantor4_subscription_number.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_subscription_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_subscription_number.key'), 'required'=>config('fields.guarantor_details.guarantor4_subscription_number.required')]) !!}
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="{{ config('fields.guarantor_details.guarantor4_saving_title.key') }}"> {{ config('fields.guarantor_details.guarantor4_saving_title.name_np') }}</label> {!! config('fields.guarantor_details.guarantor4_saving_title.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.guarantor_details.guarantor4_saving_title.key'), isset($data['request'][config('fields.guarantor_details.guarantor4_saving_title.key')])?$data['request'][config('fields.guarantor_details.guarantor4_saving_title.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_saving_title.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_saving_title.key'), 'required'=>config('fields.guarantor_details.guarantor4_saving_title.required')]) !!}
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="{{ config('fields.guarantor_details.guarantor4_saving_amount.key') }}"> {{ config('fields.guarantor_details.guarantor4_saving_amount.name_np') }}</label> {!! config('fields.guarantor_details.guarantor4_saving_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.guarantor_details.guarantor4_saving_amount.key'), isset($data['request'][config('fields.guarantor_details.guarantor4_saving_amount.key')])?$data['request'][config('fields.guarantor_details.guarantor4_saving_amount.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_saving_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_saving_amount.key'), 'required'=>config('fields.guarantor_details.guarantor4_saving_amount.required')]) !!}
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="{{ config('fields.guarantor_details.guarantor4_share_amount.key') }}"> {{ config('fields.guarantor_details.guarantor4_share_amount.name_np') }}</label> {!! config('fields.guarantor_details.guarantor4_share_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.guarantor_details.guarantor4_share_amount.key'), isset($data['request'][config('fields.guarantor_details.guarantor4_share_amount.key')])?$data['request'][config('fields.guarantor_details.guarantor4_share_amount.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_share_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_share_amount.key'), 'required'=>config('fields.guarantor_details.guarantor4_share_amount.required')]) !!}
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="{{ config('fields.guarantor_details.guarantor4_agreed_amount.key') }}"> {{ config('fields.guarantor_details.guarantor4_agreed_amount.name_np') }}</label> {!! config('fields.guarantor_details.guarantor4_agreed_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.guarantor_details.guarantor4_agreed_amount.key'), isset($data['request'][config('fields.guarantor_details.guarantor4_agreed_amount.key')])?$data['request'][config('fields.guarantor_details.guarantor4_agreed_amount.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor4_agreed_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor4_agreed_amount.key'), 'required'=>config('fields.guarantor_details.guarantor4_agreed_amount.required')]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            @endif
        </div>
    </fieldset>
</div>  