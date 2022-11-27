<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">
            <span>बैंकको विवरण</span>
        </legend>
        <div class="form-row form-group">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.general_loan_bank_name.key') }}"> {{ config('fields.collateral_details.general_loan_bank_name.name_np') }}</label> {!! config('fields.collateral_details.general_loan_bank_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.general_loan_bank_name.key'), isset($data['request'][config('fields.collateral_details.general_loan_bank_name.key')])?$data['request'][config('fields.collateral_details.general_loan_bank_name.key')]:null, ['placeholder' => config('fields.collateral_details.general_loan_bank_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.general_loan_bank_name.key'), 'required'=>config('fields.collateral_details.general_loan_bank_name.required')]) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.general_loan_cheque_number.key') }}"> {{ config('fields.collateral_details.general_loan_cheque_number.name_np') }}</label> {!! config('fields.collateral_details.general_loan_cheque_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.general_loan_cheque_number.key'), isset($data['request'][config('fields.collateral_details.general_loan_cheque_number.key')])?$data['request'][config('fields.collateral_details.general_loan_cheque_number.key')]:null, ['placeholder' => config('fields.collateral_details.general_loan_cheque_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.general_loan_cheque_number.key'), 'required'=>config('fields.collateral_details.general_loan_cheque_number.required')]) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.general_loan_cheque_amount.key') }}"> {{ config('fields.collateral_details.general_loan_cheque_amount.name_np') }}</label> {!! config('fields.collateral_details.general_loan_cheque_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.general_loan_cheque_amount.key'), isset($data['request'][config('fields.collateral_details.general_loan_cheque_amount.key')])?$data['request'][config('fields.collateral_details.general_loan_cheque_amount.key')]:null, ['placeholder' => config('fields.collateral_details.general_loan_cheque_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.general_loan_cheque_amount.key'), 'required'=>config('fields.collateral_details.general_loan_cheque_amount.required')]) !!}
                </div>
            </div> 
        </div>
    </fieldset>
</div>