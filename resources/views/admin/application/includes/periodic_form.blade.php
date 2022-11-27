<div>
    <fieldset class="scheduler-border">
       <legend class="scheduler-border">आवधिक ऋण विवरण</legend>
       <div class="form-row form-group mb-3">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.periodic_amount.key') }}">{{ config('fields.collateral_details.periodic_amount.name_np') }}</label> {!! config('fields.collateral_details.periodic_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.periodic_amount.key'), isset($data['request'][config('fields.collateral_details.periodic_amount.key')])?$data['request'][config('fields.collateral_details.periodic_amount.key')]: null, ['placeholder' => config('fields.collateral_details.periodic_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.periodic_amount.key'), 'required'=>config('fields.collateral_details.periodic_amount.required')]) !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.periodic_time.key') }}"> {{ config('fields.collateral_details.periodic_time.name_np') }}	</label> {!! config('fields.collateral_details.periodic_time.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.periodic_time.key'), isset($data['request'][config('fields.collateral_details.periodic_time.key')])?$data['request'][config('fields.collateral_details.periodic_time.key')]: null, ['placeholder' => config('fields.collateral_details.periodic_time.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.periodic_time.key'), 'required'=>config('fields.collateral_details.periodic_time.required')]) !!}
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="">{{ config('fields.collateral_details.periodic_start_date.name_np') }}</label>
                    <div class="input-group">
                        {!! Form::text('periodic_start_date_bs', isset($data['row']['periodic_start_date_bs'])?$data['row']['periodic_start_date_bs']: null, ['placeholder' => config('fields.collateral_details.periodic_start_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'periodic_start_date_bs']) !!}
                        {!! Form::text('periodic_start_date', isset($data['row']['periodic_start_date']) ? $data['row']['periodic_start_date']->format('Y-m-d') : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'periodic_start_date']) !!}
                        <span class="input-group-btn">
                            <button class="btn  btn-sm btn-danger" type="button" id="periodic_start_date_clear"><i class="fi fi-close"></i></button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="">{{ config('fields.collateral_details.periodic_end_date.name_np') }}</label>
                    <div class="input-group">
                        {!! Form::text('periodic_end_date_bs', isset($data['row']['periodic_end_date_bs'])?$data['row']['periodic_end_date_bs']:null, ['placeholder' => config('fields.collateral_details.periodic_end_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'periodic_end_date_bs']) !!}
                        {!! Form::text('periodic_end_date', isset($data['row']['periodic_end_date']) ? $data['row']['periodic_end_date']->format('Y-m-d') : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'periodic_end_date']) !!}
                        <span class="input-group-btn">
                            <button class="btn  btn-sm btn-danger" type="button" id="periodic_end_date_clear"><i class="fi fi-close"></i></button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.periodic_loan_amount.key') }}"> {{ config('fields.collateral_details.periodic_loan_amount.name_np') }}</label> {!! config('fields.collateral_details.periodic_loan_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.periodic_loan_amount.key'), isset($data['request'][config('fields.collateral_details.periodic_loan_amount.key')])?$data['request'][config('fields.collateral_details.periodic_loan_amount.key')]: null, ['placeholder' => config('fields.collateral_details.periodic_loan_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.periodic_loan_amount.key'), 'required'=>config('fields.collateral_details.periodic_loan_amount.required')]) !!}
                </div>
            </div>
       </div>
       @include('admin.application.includes.periodicdocs')
    </fieldset>
</div>