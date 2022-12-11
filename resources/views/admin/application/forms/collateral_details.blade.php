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
        <div class="col-md-3">
            <div class="form-group">
                <label for="{{ config('fields.collateral_details.account_number.key') }}"> {{ config('fields.collateral_details.account_number.name_np') }}	</label> {!! config('fields.collateral_details.account_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.collateral_details.account_number.key'), isset($data['row'][config('fields.collateral_details.account_number.key')])?$data['row'][config('fields.collateral_details.account_number.key')]:null, ['placeholder' => config('fields.collateral_details.account_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.account_number.key'), 'required'=>config('fields.collateral_details.account_number.required')]) !!}
            </div>
       </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="{{ config('fields.collateral_details.account_balance.key') }}"> {{ config('fields.collateral_details.account_balance.name_np') }}	</label> {!! config('fields.collateral_details.account_balance.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.collateral_details.account_balance.key'), isset($data['row'][config('fields.collateral_details.account_balance.key')])?$data['row'][config('fields.collateral_details.account_balance.key')]:null, ['placeholder' => config('fields.collateral_details.account_balance.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.account_balance.key'), 'required'=>config('fields.collateral_details.account_balance.required')]) !!}
            </div>
       </div>
       <div class="col-md-2">
        <div class="form-group">
            <label for="{{ config('fields.collateral_details.share_amount.key') }}"> {{ config('fields.collateral_details.share_amount.name_np') }}	</label> {!! config('fields.collateral_details.share_amount.required') == true ? '<span class="text-danger">*</span>' : '' !!}
            {!! Form::text(config('fields.collateral_details.share_amount.key'), isset($data['row'][config('fields.collateral_details.share_amount.key')])?$data['row'][config('fields.collateral_details.share_amount.key')]:null, ['placeholder' => config('fields.collateral_details.share_amount.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.share_amount.key'), 'required'=>config('fields.collateral_details.share_amount.required')]) !!}
        </div>
   </div>
    </div>
</fieldset>
<input type="hidden" name="loan_type" value="{{$loan_type}}">
@if($loan_type == 'home')
    @include('admin.application.includes.home_form')
@elseif($loan_type == 'vehicle')
    @include('admin.application.includes.vehicle_form')
@elseif($loan_type == 'periodic')
    @include('admin.application.includes.periodic_form')
@elseif($loan_type == 'microfinance')
    @include('admin.application.includes.microfinance_form')
@else 
    @include('admin.application.includes.general_form')
@endif