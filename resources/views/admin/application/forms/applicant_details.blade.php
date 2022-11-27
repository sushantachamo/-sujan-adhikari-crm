@if(isset($form_type) && $form_type == 'create')
<fieldset class="scheduler-border">
    <legend class="scheduler-border">पुरानो रेकडहरु</legend>
    <div class="form-row form-gorup">
        <div class="col-md-3">
            <div class="form-group">
                <label for="suggestion_type"> रेकडको किसिम	</label>
                {!! Form::select('suggestion_type', isset($data['suggestion_types'])?$data['suggestion_types']:[], (isset($data['suggestion_type'])? $data['suggestion_type'] : null),
                    ['class' => 'form-control select_to suggestion_type' ]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="suggestion_id"> खोज्नुहोस्	</label>
                {!! Form::select('suggestion_id', isset($data['suggestions'])?$data['suggestions']:[], (isset($data['suggestion_id'])? $data['suggestion_id'] : null),
                    ['class' => 'form-control select_to  suggestion_id' ]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group pt-4">
               <a id="fill" class="btn btn-info btn-sm fill"> Fill</a>
               <a href="{{ route('admin.application.create') }}" class="btn btn-warning btn-sm reset"> Reset</a>
            </div>
        </div>
    </div>
</fieldset>
@endif
<fieldset class="scheduler-border">
    <legend class="scheduler-border"> ऋण आबेदकको बिबरण </legend>

    
    <div class="form-row form-group">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="{{ config('fields.applicant_details.borrower_name.key') }}"> {{ config('fields.applicant_details.borrower_name.name_np') }}	</label> {!! config('fields.applicant_details.borrower_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.applicant_details.borrower_name.key'), isset($data['request'][config('fields.applicant_details.borrower_name.key')])?$data['request'][config('fields.applicant_details.borrower_name.key')]:null, ['placeholder' => config('fields.applicant_details.borrower_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.applicant_details.borrower_name.key'), 'required'=>config('fields.applicant_details.borrower_name.required')]) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="{{ config('fields.applicant_details.borrower_name_en.key') }}"> {{ config('fields.applicant_details.borrower_name_en.name_np') }}	</label> {!! config('fields.applicant_details.borrower_name_en.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.applicant_details.borrower_name_en.key'), isset($data['request'][config('fields.applicant_details.borrower_name_en.key')])?$data['request'][config('fields.applicant_details.borrower_name_en.key')]:null, ['placeholder' => config('fields.applicant_details.borrower_name_en.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.applicant_details.borrower_name_en.key'), 'required'=>config('fields.applicant_details.borrower_name_en.required')]) !!}
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">‍
                <label>{{ config('fields.applicant_details.borrower_gender.name_np') }}</label>{!! config('fields.applicant_details.borrower_gender.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::select(config('fields.applicant_details.borrower_gender.key'), isset($data['genders'])?$data['genders']:[], null,
                    ['class' => 'form-control select_to  '.config('fields.applicant_details.borrower_gender.key'), 'id' => config('fields.applicant_details.borrower_gender.key'), 'required'=>config('fields.applicant_details.borrower_gender.required') ]) !!}
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ config('fields.applicant_details.b_dob.name_np') }}</label>{!! config('fields.applicant_details.b_dob.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                <div class="input-group">
                    {!! Form::text('b_dob_bs', isset($data['row']['b_dob_bs'])?$data['row']['b_dob_bs']:null, ['placeholder' => config('fields.applicant_details.b_dob.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'b_dob_bs']) !!}
                    {!! Form::text('b_dob', isset($data['row']['b_dob']) ? $data['row']['b_dob']->format('Y-m-d') : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'b_dob']) !!}
                    <span class="input-group-btn">
                        <button class="btn  btn-sm btn-danger" type="button" id="b_dob_clear"><i class="fi fi-close"></i></button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="{{ config('fields.applicant_details.contact_number.key') }}"> {{ config('fields.applicant_details.contact_number.name_np') }}	</label> {!! config('fields.applicant_details.contact_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.applicant_details.contact_number.key'), isset($data['row'][config('fields.applicant_details.contact_number.key')])?$data['row'][config('fields.applicant_details.contact_number.key')]:null, ['placeholder' => config('fields.applicant_details.contact_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.applicant_details.contact_number.key'), 'required'=>config('fields.applicant_details.contact_number.required')]) !!}
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="{{ config('fields.applicant_details.b_edu_qualification.key') }}"> {{ config('fields.applicant_details.b_edu_qualification.name_np') }}	</label> {!! config('fields.applicant_details.b_edu_qualification.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::select(config('fields.applicant_details.b_edu_qualification.key'), isset($data['academic_levels'])?$data['academic_levels']:[], null,
                    ['class' => 'form-control select_to  '.config('fields.applicant_details.b_edu_qualification.key'), 'id' => config('fields.applicant_details.b_edu_qualification.key'), 'required'=>config('fields.applicant_details.b_edu_qualification.required') ]) !!}
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="{{ config('fields.applicant_details.b_caste_code.key') }}"> {{ config('fields.applicant_details.b_caste_code.name_np') }}	</label> {!! config('fields.applicant_details.b_caste_code.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::select(config('fields.applicant_details.b_caste_code.key'), isset($data['caste_code'])?$data['caste_code']:[],null,
                    ['class' => 'form-control select_to  '.config('fields.applicant_details.b_caste_code.key'), 'id' => config('fields.applicant_details.b_caste_code.key'), 'required'=>config('fields.applicant_details.b_caste_code.required') ]) !!}
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="{{ config('fields.applicant_details.b_marital_status.key') }}"> {{ config('fields.applicant_details.b_marital_status.name_np') }}	</label> {!! config('fields.applicant_details.b_marital_status.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::select(config('fields.applicant_details.b_marital_status.key'), isset($data['marital_status'])?$data['marital_status']:[],null,
                    ['class' => 'form-control select_to  '.config('fields.applicant_details.b_marital_status.key'), 'id' => config('fields.applicant_details.b_marital_status.key'), 'required'=>config('fields.applicant_details.b_marital_status.required') ]) !!}
            
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="{{ config('fields.applicant_details.b_occupation.key') }}"> {{ config('fields.applicant_details.b_occupation.name_np') }}	</label> {!! config('fields.applicant_details.b_occupation.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::select(config('fields.applicant_details.b_occupation.key'), isset($data['occupations'])?$data['occupations']:[], null,
                    ['class' => 'form-control select_to  '.config('fields.applicant_details.b_occupation.key'), 'id' => config('fields.applicant_details.b_occupation.key'), 'required'=>config('fields.applicant_details.b_occupation.required') ]) !!}
            
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="{{ config('fields.applicant_details.b_occupation_location.key') }}"> {{ config('fields.applicant_details.b_occupation_location.name_np') }}	</label> {!! config('fields.applicant_details.b_occupation_location.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.applicant_details.b_occupation_location.key'), isset($data['row'][config('fields.applicant_details.b_occupation_location.key')])?$data['row'][config('fields.applicant_details.b_occupation_location.key')]:null, ['placeholder' => config('fields.applicant_details.b_occupation_location.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.applicant_details.b_occupation_location.key'), 'required'=>config('fields.applicant_details.b_occupation_location.required')]) !!}
            </div>
        </div>
    </div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">पारिवारिक विवरण</legend>
        <div class="form-row form_row_margin_bottom">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.b_grand_father_name.key') }}"> {{ config('fields.applicant_details.b_grand_father_name.name_np') }}	</label> {!! config('fields.applicant_details.b_grand_father_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.applicant_details.b_grand_father_name.key'), isset($data['row'][config('fields.applicant_details.b_grand_father_name.key')])?$data['row'][config('fields.applicant_details.b_grand_father_name.key')]:null, ['placeholder' => config('fields.applicant_details.b_grand_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.applicant_details.b_grand_father_name.key'), 'required'=>config('fields.applicant_details.b_grand_father_name.required')]) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.b_father_name.key') }}"> {{ config('fields.applicant_details.b_father_name.name_np') }}	</label> {!! config('fields.applicant_details.b_father_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.applicant_details.b_father_name.key'), isset($data['row'][config('fields.applicant_details.b_father_name.key')])?$data['row'][config('fields.applicant_details.b_father_name.key')]:null, ['placeholder' => config('fields.applicant_details.b_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.applicant_details.b_father_name.key'), 'required'=>config('fields.applicant_details.b_father_name.required')]) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.b_mother_name.key') }}"> {{ config('fields.applicant_details.b_mother_name.name_np') }}	</label> {!! config('fields.applicant_details.b_mother_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.applicant_details.b_mother_name.key'), isset($data['row'][config('fields.applicant_details.b_mother_name.key')])?$data['row'][config('fields.applicant_details.b_mother_name.key')]:null, ['placeholder' => config('fields.applicant_details.b_mother_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.applicant_details.b_mother_name.key'), 'required'=>config('fields.applicant_details.b_mother_name.required')]) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.b_spouse_name.key') }}"> {{ config('fields.applicant_details.b_spouse_name.name_np') }}	</label> {!! config('fields.applicant_details.b_spouse_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.applicant_details.b_spouse_name.key'), isset($data['row'][config('fields.applicant_details.b_spouse_name.key')])?$data['row'][config('fields.applicant_details.b_spouse_name.key')]:null, ['placeholder' => config('fields.applicant_details.b_spouse_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.applicant_details.b_spouse_name.key'), 'required'=>config('fields.applicant_details.b_spouse_name.required')]) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.b_son_name.key') }}"> {{ config('fields.applicant_details.b_son_name.name_np') }}	</label> {!! config('fields.applicant_details.b_son_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    <select name="{{config('fields.applicant_details.b_son_name.key')}}[]" multiple='multiple' class="form-control form-control-sm select2tags" id={{config('fields.applicant_details.b_son_name.key')}} >
                       @php $options = isset($data['row'][config('fields.applicant_details.b_son_name.key')])?$data['row'][config('fields.applicant_details.b_son_name.key')]:null; 
                       @endphp
                       @if($options)
                        @foreach ($options as $option) 
                            <option value="{{$option}}" selected> {{$option}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.b_daughter_name.key') }}"> {{ config('fields.applicant_details.b_daughter_name.name_np') }}	</label> {!! config('fields.applicant_details.b_daughter_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    <select name="{{config('fields.applicant_details.b_daughter_name.key')}}[]" multiple='multiple' class="form-control form-control-sm select2tags" id={{config('fields.applicant_details.b_daughter_name.key')}} {{config('fields.applicant_details.b_daughter_name.required')?'required':''}}">
                        @php $options = isset($data['row'][config('fields.applicant_details.b_daughter_name.key')])?$data['row'][config('fields.applicant_details.b_daughter_name.key')]:null; 
                        @endphp
                        @if($options)
                        @foreach ($options as $option) 
                         <option value="{{$option}}" selected> {{$option}}</option>
                         @endforeach
                         @endif
                     </select>

                    {{-- {!! Form::select(config('fields.applicant_details.b_daughter_name.key').'[]', isset($data['row'][config('fields.applicant_details.b_daughter_name.key').'s'])?$data['row'][config('fields.applicant_details.b_daughter_name.key')]:null,($data['row'][config('fields.applicant_details.b_daughter_name.key')])? $data['row'][config('fields.applicant_details.b_daughter_name.key').'s'] : null, ['class' => 'form-control form-control-sm select2tags', 'multiple'=>'multiple', 'id' => config('fields.applicant_details.b_daughter_name.key'), 'required'=>config('fields.applicant_details.b_daughter_name.required')]) !!} --}}
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">स्थायी ठेगाना</legend>
        <div class="form-row form_row_margin_bottom">
            <div class="col-md-2">
                <div class="form-group">
                    <label for=" ">{{ config('fields.applicant_details.b_p_province.name_np') }}</label>  {!! config('fields.applicant_details.b_p_province.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::select('b_p_province', isset($data['provinces'])?$data['provinces']:[], null,
                    ['class' => 'form-control select_to  b_p_province', 'id' => 'b_p_province']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for=" ">{{ config('fields.applicant_details.b_p_district.name_np') }}</label>  {!! config('fields.applicant_details.b_p_district.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::select('b_p_district',isset($data['b_p_districts'])?$data['b_p_districts']:[], null,
                    ['class' => 'form-control select_to b_p_district', 'id' => 'b_p_district']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for=" ">{{ config('fields.applicant_details.b_p_localgovt.name_np') }}</label>  {!! config('fields.applicant_details.b_p_localgovt.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!!Form::select('b_p_localgovt',isset($data['b_p_localgovts'])?$data['b_p_localgovts']:[], null,
                    ['class' => 'form-control  select_to b_p_localgovt', 'id' => 'b_p_localgovt']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    
                    <label for="{{ config('fields.applicant_details.b_p_ward.key') }}"> {{ config('fields.applicant_details.b_p_ward.name_np') }} </label> {!! config('fields.applicant_details.b_p_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!!Form::select('b_p_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'), null,
                    ['class' => 'form-control  select_to b_p_ward', 'id' => 'b_p_ward']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.b_p_tole.key') }}"> {{ config('fields.applicant_details.b_p_tole.name_np') }} </label> {!! config('fields.applicant_details.b_p_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.applicant_details.b_p_tole.key'), isset($data['row'][config('fields.applicant_details.b_p_tole.key')])?$data['row'][config('fields.applicant_details.b_p_tole.key')]:null, ['placeholder' => config('fields.applicant_details.b_p_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.applicant_details.b_p_tole.key'), 'required'=>config('fields.applicant_details.b_p_tole.required')]) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.citizenship_former_address.key') }}"> {{ config('fields.applicant_details.citizenship_former_address.name_np') }} </label> {!! config('fields.applicant_details.citizenship_former_address.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.applicant_details.citizenship_former_address.key'), isset($data['row'][config('fields.applicant_details.citizenship_former_address.key')])?$data['row'][config('fields.applicant_details.citizenship_former_address.key')]:null, ['placeholder' => config('fields.applicant_details.citizenship_former_address.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.applicant_details.citizenship_former_address.key')]) !!}
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">अस्थायी ठेगाना <small>( स्थायी जस्तै {{ Form::checkbox('b_same_as_permanent',null,null, ['id'=>'b_same_as_permanent']) }} )</small></legend>
        <div class="form-row form_row_margin_bottom" id="b_same_as_permanent_text">
            <div class="col-md-2">
                <div class="form-group">
                    <label for=" ">{{ config('fields.applicant_details.b_t_province.name_np') }}</label> {!! config('fields.applicant_details.b_t_province.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::select('b_t_province', isset($data['provinces'])?$data['provinces']:[], null,
                    ['class' => 'form-control select_to  b_t_province', 'id'=>'b_t_province']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for=" ">{{ config('fields.applicant_details.b_t_district.name_np') }}</label> {!! config('fields.applicant_details.b_t_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::select('b_t_district',isset($data['b_t_districts'])?$data['b_t_districts']:[], null,
                    ['class' => 'form-control select_to b_t_district', 'id'=>'b_t_district']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for=" ">{{ config('fields.applicant_details.b_t_localgovt.name_np') }}</label> {!! config('fields.applicant_details.b_t_localgovt.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!!Form::select('b_t_localgovt',isset($data['b_t_localgovts'])?$data['b_t_localgovts']:[], null,
                    ['class' => 'form-control  select_to b_t_localgovt', 'id'=> 'b_t_localgovt']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.b_t_ward.key') }}"> {{ config('fields.applicant_details.b_t_ward.name_np') }} </label> {!! config('fields.applicant_details.b_t_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!!Form::select('b_t_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'), null,
                    ['class' => 'form-control  select_to b_t_ward', 'id' => 'b_t_ward']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.b_t_tole.key') }}"> {{ config('fields.applicant_details.b_t_tole.name_np') }} </label> {!! config('fields.applicant_details.b_t_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.applicant_details.b_t_tole.key'), isset($data['row'][config('fields.applicant_details.b_t_tole.key')])?$data['row'][config('fields.applicant_details.b_t_tole.key')]:null, ['placeholder' => config('fields.applicant_details.b_t_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.applicant_details.b_t_tole.key')]) !!}
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">नागरिकता विवरण</legend>
        <div class="form-row form_row_margin_bottom">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.citizenship_number.key') }}"> {{ config('fields.applicant_details.citizenship_number.name_np') }}	</label> {!! config('fields.applicant_details.citizenship_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.applicant_details.citizenship_number.key'), isset($data['row'][config('fields.applicant_details.citizenship_number.key')])?$data['row'][config('fields.applicant_details.citizenship_number.key')]:null, ['placeholder' => config('fields.applicant_details.citizenship_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.applicant_details.citizenship_number.key'), 'required'=>config('fields.applicant_details.citizenship_number.required')]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">{{ config('fields.applicant_details.citizenship_issue_date.name_np') }}</label> {!! config('fields.applicant_details.citizenship_issue_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    <div class="input-group">
                        {!! Form::text('citizenship_issue_date_bs', isset($data['row']['citizenship_issue_date_bs'])?$data['row']['citizenship_issue_date_bs']:null, ['placeholder' => config('fields.applicant_details.citizenship_issue_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'citizenship_issue_date_bs']) !!}
                        {!! Form::text('citizenship_issue_date', isset($data['row']['citizenship_issue_date']) ? $data['row']['citizenship_issue_date']->format('Y-m-d') : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'citizenship_issue_date']) !!}
                        <span class="input-group-btn">
                            <button class="btn  btn-sm btn-danger" type="button" id="citizenship_issue_date_clear"><i class="fi fi-close"></i></button>
                        </span>
                    </div>
                </div>
           </div>
           <div class="col-md-4">
                <div class="form-group">
                    <label for="">{{ config('fields.applicant_details.citizenship_issue_district.name_np') }}</label> {!! config('fields.applicant_details.citizenship_issue_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::select(config('fields.applicant_details.citizenship_issue_district.key'), isset($data['districts'])?$data['districts']:[], null,
                    ['class' => 'form-control select_to  '.config('fields.applicant_details.citizenship_issue_district.key'), 'id'=>'citizenship_issue_district', 'required'=>config('fields.applicant_details.citizenship_issue_district.required') ]) !!}
                </div>
           </div>
           <div class="form-group col-md-6">
                <label> अगाडिको फोटो </label>
                @if(isset($data['row']['citizenship_front']) && $data['row']['citizenship_front'])
                <a fileType="citizenship_front" fileName="{{ $data['row']['citizenship_front']}}" data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                <?php $pathinfo = pathinfo($data['row']['citizenship_front']); ?>
                @if($data['row']['citizenship_front'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['citizenship_front']]) }}" class='img-responsive' style="max-height:100px">
                @elseif($data['row']['citizenship_front'] && ($pathinfo['extension']=='pdf'))
                <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px">
                @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="citizenship_front" id="citizenship_front_image">
                @endif
            </div>
            <div class="form-group col-md-6">
                <label> पछाडिको फोटो </label>
                
                @if(isset($data['row']['citizenship_back']) && $data['row']['citizenship_back'])
                <a fileType="citizenship_back" fileName="{{ $data['row']['citizenship_back']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                <?php $pathinfo = pathinfo($data['row']['citizenship_back']); ?>
                @if($data['row']['citizenship_back'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['citizenship_back']]) }}" class='img-responsive' style="max-height:100px">
                @elseif($data['row']['citizenship_back'] && ($pathinfo['extension']=='pdf'))
                <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px">
                @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="citizenship_back" id="citizenship_back_image">
                @endif

            </div>  
        </div>
    </fieldset>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">आम्दानी खर्च विवरण</legend>
        <div class="form-row form_row_margin_bottom">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.monthly_income.key') }}"> {{ config('fields.applicant_details.monthly_income.name_np') }}	</label> {!! config('fields.applicant_details.monthly_income.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::number(config('fields.applicant_details.monthly_income.key'), isset($data['row'][config('fields.applicant_details.monthly_income.key')])?$data['row'][config('fields.applicant_details.monthly_income.key')]:null, ['placeholder' => config('fields.applicant_details.monthly_income.name_np'), 'class' => 'form-control form-control-sm calc', 'id' => config('fields.applicant_details.monthly_income.key'), 'required'=>config('fields.applicant_details.monthly_income.required')]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.monthly_expenses.key') }}"> {{ config('fields.applicant_details.monthly_expenses.name_np') }}	</label> {!! config('fields.applicant_details.monthly_expenses.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::number(config('fields.applicant_details.monthly_expenses.key'), isset($data['row'][config('fields.applicant_details.monthly_expenses.key')])?$data['row'][config('fields.applicant_details.monthly_expenses.key')]:null, ['placeholder' => config('fields.applicant_details.monthly_expenses.name_np'), 'class' => 'form-control form-control-sm calc', 'id' => config('fields.applicant_details.monthly_expenses.key'), 'required'=>config('fields.applicant_details.monthly_expenses.required')]) !!}
                </div>
           </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.monthly_saving.key') }}"> {{ config('fields.applicant_details.monthly_saving.name_np') }}	</label> {!! config('fields.applicant_details.monthly_saving.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.applicant_details.monthly_saving.key'), isset($data['row'][config('fields.applicant_details.monthly_saving.key')])?$data['row'][config('fields.applicant_details.monthly_saving.key')]:null, ['placeholder' => config('fields.applicant_details.monthly_saving.name_np'), 'class' => 'form-control form-control-sm', 'id' => config('fields.applicant_details.monthly_saving.key'), 'required'=>config('fields.applicant_details.monthly_saving.required')]) !!}
                </div>
           </div>
        </div>
    </fieldset>
    
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">ऋण / धितो </legend>
        <div class="form-row form_row_margin_bottom">
            @if(isset($form_type) && $form_type == 'create')
            <div class="col-md-4">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.loan_type.key') }}"> {{ config('fields.applicant_details.loan_type.name_np') }}	</label> {!! config('fields.applicant_details.loan_type.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::select(config('fields.applicant_details.loan_type.key'), isset($data['loan_types'])?$data['loan_types']:[], null,
                    ['class' => 'form-control select_to  '.config('fields.applicant_details.loan_type.key'), 'required'=>config('fields.applicant_details.loan_type.required') ]) !!}
                </div>
           </div>
           @endif
           <div class="col-md-3">
            <div class="form-group">
                <label for="">{{ config('fields.applicant_details.loan_apply_date.name_np') }}</label>{!! config('fields.applicant_details.loan_apply_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                <div class="input-group">
                    {!! Form::text('loan_apply_date_bs', isset($data['row']['loan_apply_date_bs'])?$data['row']['loan_apply_date_bs']: null, ['placeholder' => config('fields.applicant_details.loan_apply_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked masked masked masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'loan_apply_date_bs']) !!}
                    {!! Form::text('loan_apply_date', isset($data['row']['loan_apply_date']) ? $data['row']['loan_apply_date']->format('Y-m-d') : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'loan_apply_date']) !!}
                    <span class="input-group-btn">
                        <button class="btn  btn-sm btn-danger" type="button" id="loan_apply_date_clear"><i class="fi fi-close"></i></button>
                    </span>
                </div>
            </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="{{ config('fields.applicant_details.loan_demand_amount.key') }}"> {{ config('fields.applicant_details.loan_demand_amount.name_np') }}	</label> {!! config('fields.applicant_details.loan_demand_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::number(config('fields.applicant_details.loan_demand_amount.key'), isset($data['row'][config('fields.applicant_details.loan_demand_amount.key')])?$data['row'][config('fields.applicant_details.loan_demand_amount.key')]: null, ['placeholder' => config('fields.applicant_details.loan_demand_amount.name_np'), 'class' => 'form-control form-control-sm calc', 'id' => config('fields.applicant_details.loan_demand_amount.key'), 'required'=>config('fields.applicant_details.loan_demand_amount.required')]) !!}
                </div>
            </div>
        </div>
    </fieldset>
</fieldset>