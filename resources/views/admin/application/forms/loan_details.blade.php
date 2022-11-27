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
            <div class="col-md-4 ">
                <div class="form-group">
                    <label for="{{ config('fields.loan_details.loan_title.key') }}"> {{ config('fields.loan_details.loan_title.name_np') }}	</label> {!! config('fields.loan_details.loan_title.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.loan_details.loan_title.key'), isset($data['row'][config('fields.loan_details.loan_title.key')])?$data['row'][config('fields.loan_details.loan_title.key')]:null, ['placeholder' => config('fields.loan_details.loan_title.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.loan_details.loan_title.key'), 'required'=>config('fields.loan_details.loan_title.required')]) !!}
                </div>
            </div>
        </div>
    </fieldset>
</div>