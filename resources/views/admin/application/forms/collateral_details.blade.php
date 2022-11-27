<fieldset class="scheduler-border">
    <legend class="scheduler-border">खाताको विवरण</legend>
    <div class="form-row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="{{ config('fields.collateral_details.subscription_id.key') }}"> {{ config('fields.collateral_details.subscription_id.name_np') }}	</label> {!! config('fields.collateral_details.subscription_id.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.collateral_details.subscription_id.key'), isset($data['row'][config('fields.collateral_details.subscription_id.key')])?$data['row'][config('fields.collateral_details.subscription_id.key')]:null, ['placeholder' => config('fields.collateral_details.subscription_id.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.subscription_id.key'), 'required'=>config('fields.collateral_details.subscription_id.required')]) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">{{ config('fields.collateral_details.subscription_date.name_np') }}</label>{!! config('fields.collateral_details.subscription_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                <div class="input-group">
                    {!! Form::text('subscription_date_bs', isset($data['row']['subscription_date_bs'])?$data['row']['subscription_date_bs']: null, ['placeholder' => config('fields.collateral_details.subscription_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'subscription_date_bs']) !!}
                    {!! Form::text('subscription_date', isset($data['row']['subscription_date']) ? $data['row']['subscription_date']->format('Y-m-d') : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'subscription_date']) !!}
                    <span class="input-group-btn">
                        <button class="btn  btn-sm btn-danger" type="button" id="subscription_date_clear"><i class="fi fi-close"></i></button>
                    </span>
                </div>
            </div>
        </div>
   </div>
</fieldset>
<input type="hidden" name="loan_type" value="{{$loan_type}}">
