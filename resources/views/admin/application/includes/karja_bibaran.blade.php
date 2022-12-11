<div>
    <fieldset class="scheduler-border">
       <legend class="scheduler-border">ऋण विवरण </legend>
        <div class="form-row form-group">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.loan_details.total_loan_amount.key') }}"> {{ config('fields.loan_details.total_loan_amount.name_np') }}	</label> {!! config('fields.loan_details.total_loan_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.loan_details.total_loan_amount.key'), isset($data['row'][config('fields.loan_details.total_loan_amount.key')])?$data['row'][config('fields.loan_details.total_loan_amount.key')]:null, ['placeholder' => config('fields.loan_details.total_loan_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.loan_details.total_loan_amount.key'), 'required'=>config('fields.loan_details.total_loan_amount.required')]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="{{ config('fields.loan_details.total_loan_amount_in_word.key') }}"> {{ config('fields.loan_details.total_loan_amount_in_word.name_np') }}	</label> {!! config('fields.loan_details.total_loan_amount_in_word.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.loan_details.total_loan_amount_in_word.key'), isset($data['row'][config('fields.loan_details.total_loan_amount_in_word.key')])?$data['row'][config('fields.loan_details.total_loan_amount_in_word.key')]:null, ['placeholder' => config('fields.loan_details.total_loan_amount_in_word.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.loan_details.total_loan_amount_in_word.key'), 'required'=>config('fields.loan_details.total_loan_amount_in_word.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.loan_details.loan_amount.key') }}"> {{ config('fields.loan_details.loan_amount.name_np') }}	</label> {!! config('fields.loan_details.loan_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.loan_details.loan_amount.key'), isset($data['row'][config('fields.loan_details.loan_amount.key')])?$data['row'][config('fields.loan_details.loan_amount.key')]:null, ['placeholder' => config('fields.loan_details.loan_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.loan_details.loan_amount.key'), 'required'=>config('fields.loan_details.loan_amount.required')]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="{{ config('fields.loan_details.loan_amount_in_word.key') }}"> {{ config('fields.loan_details.loan_amount_in_word.name_np') }}	</label> {!! config('fields.loan_details.loan_amount_in_word.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.loan_details.loan_amount_in_word.key'), isset($data['row'][config('fields.loan_details.loan_amount_in_word.key')])?$data['row'][config('fields.loan_details.loan_amount_in_word.key')]:null, ['placeholder' => config('fields.loan_details.loan_amount_in_word.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.loan_details.loan_amount_in_word.key'), 'required'=>config('fields.loan_details.loan_amount_in_word.required')]) !!}
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group">
                    <label for="{{ config('fields.loan_details.loan_title.key') }}"> {{ config('fields.loan_details.loan_title.name_np') }}	</label> {!! config('fields.loan_details.loan_title.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.loan_details.loan_title.key'), isset($data['row'][config('fields.loan_details.loan_title.key')])?$data['row'][config('fields.loan_details.loan_title.key')]:null, ['placeholder' => config('fields.loan_details.loan_title.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.loan_details.loan_title.key'), 'required'=>config('fields.loan_details.loan_title.required')]) !!}
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group">
                    <label for="{{ config('fields.loan_details.loan_purpose.key') }}"> {{ config('fields.loan_details.loan_purpose.name_np') }}	</label> {!! config('fields.loan_details.loan_purpose.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.loan_details.loan_purpose.key'), isset($data['row'][config('fields.loan_details.loan_purpose.key')])?$data['row'][config('fields.loan_details.loan_purpose.key')]:null, ['placeholder' => config('fields.loan_details.loan_purpose.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.loan_details.loan_purpose.key'), 'required'=>config('fields.loan_details.loan_purpose.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.loan_details.loan_interest_rate.key') }}"> {{ config('fields.loan_details.loan_interest_rate.name_np') }}	</label> {!! config('fields.loan_details.loan_interest_rate.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.loan_details.loan_interest_rate.key'), isset($data['row'][config('fields.loan_details.loan_interest_rate.key')])?$data['row'][config('fields.loan_details.loan_interest_rate.key')]:null, ['placeholder' => config('fields.loan_details.loan_interest_rate.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.loan_details.loan_interest_rate.key'), 'required'=>config('fields.loan_details.loan_interest_rate.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <label for="{{ config('fields.loan_details.loan_period.key') }}"> {{ config('fields.loan_details.loan_period.name_np') }}	</label> {!! config('fields.loan_details.loan_period.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                <div class="form-row">
                    <div class="col-md-6">
                        {!! Form::text(config('fields.loan_details.loan_period.key'), isset($data['row'][config('fields.loan_details.loan_period.key')])?$data['row'][config('fields.loan_details.loan_period.key')]:null, ['placeholder' => config('fields.loan_details.loan_period.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.loan_details.loan_period.key'), 'required'=>config('fields.loan_details.loan_period.required')]) !!}

                    </div>
                    <div class="col-md-6">
                        {!! Form::select(config('fields.loan_details.loan_period_type.key'), isset($data['loan_period_types'])?$data['loan_period_types']:[], null,
                        ['class' => 'form-control select_to  '.config('fields.loan_details.loan_period_type.key'), 'required'=>config('fields.loan_details.loan_period_type.required') ]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label for="{{ config('fields.loan_details.loan_pass_meeting_date.key') }}"> {{ config('fields.loan_details.loan_pass_meeting_date.name_np') }}	</label> {!! config('fields.loan_details.loan_pass_meeting_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                <div class="input-group">
                    {!! Form::text('loan_pass_meeting_date_bs', isset($data['row']['loan_pass_meeting_date_bs'])?$data['row']['loan_pass_meeting_date_bs']:null, ['placeholder' => config('fields.loan_details.loan_pass_meeting_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'loan_pass_meeting_date_bs']) !!}
                    {!! Form::text('loan_pass_meeting_date', isset($data['row']['loan_pass_meeting_date']) ? $data['row']['loan_pass_meeting_date']->format('Y-m-d') :null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'loan_pass_meeting_date']) !!}
                    <span class="input-group-btn">
                        <button class="btn  btn-sm btn-danger" type="button" id="loan_pass_meeting_date_clear"><i class="fi fi-close"></i></button>
                    </span>
                </div>
            </div>
            <div class="col-md-3">
                <label for="{{ config('fields.loan_details.loan_pass_date.key') }}"> {{ config('fields.loan_details.loan_pass_date.name_np') }}	</label> {!! config('fields.loan_details.loan_pass_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                <div class="input-group">
                    {!! Form::text('loan_pass_date_bs', isset($data['row']['loan_pass_date_bs'])?$data['row']['loan_pass_date_bs']: null, ['placeholder' => config('fields.loan_details.loan_pass_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'loan_pass_date_bs']) !!}
                    {!! Form::text('loan_pass_date', isset($data['row']['loan_pass_date']) ? $data['row']['loan_pass_date']->format('Y-m-d') : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'loan_pass_date']) !!}
                    <span class="input-group-btn">
                        <button class="btn  btn-sm btn-danger" type="button" id="loan_pass_date_clear"><i class="fi fi-close"></i></button>
                    </span>
                </div>
            </div>
            <div class="col-md-3">
                <label for="{{ config('fields.loan_details.payment_amount.key') }}"> {{ config('fields.loan_details.payment_amount.name_np') }}	</label> {!! config('fields.loan_details.payment_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.loan_details.payment_amount.key'), isset($data['row'][config('fields.loan_details.payment_amount.key')])?$data['row'][config('fields.loan_details.payment_amount.key')]:null, ['placeholder' => config('fields.loan_details.payment_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.loan_details.payment_amount.key'), 'required'=>config('fields.loan_details.payment_amount.required')]) !!}
            </div>
            <div class="col-md-3">
                <label for="{{ config('fields.loan_details.payment_type.key') }}"> {{ config('fields.loan_details.payment_type.name_np') }}	</label> {!! config('fields.loan_details.payment_type.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::select(config('fields.loan_details.payment_type.key'), isset($data['payment_types'])?$data['payment_types']:[], null,
                    ['class' => 'form-control select_to  '.config('fields.loan_details.payment_type.key'), 'required'=>config('fields.loan_details.payment_type.required') ]) !!}
            </div>
            
        </div>
    </fieldset>
</div>