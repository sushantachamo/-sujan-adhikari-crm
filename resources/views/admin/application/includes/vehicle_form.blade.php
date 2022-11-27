<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">सबारी साधन राखी लिदा भर्नुपर्ने फारम</legend>
        <div class="form-row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.vehicle_name.key') }}"> {{ config('fields.collateral_details.vehicle_name.name_np') }}	</label> {!! config('fields.collateral_details.vehicle_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.vehicle_name.key'), isset($data['row'][config('fields.collateral_details.vehicle_name.key')])?$data['row'][config('fields.collateral_details.vehicle_name.key')]:null, ['placeholder' => config('fields.collateral_details.vehicle_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.vehicle_name.key'), 'required'=>config('fields.collateral_details.vehicle_name.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.vehicle_color.key') }}"> {{ config('fields.collateral_details.vehicle_color.name_np') }}	</label> {!! config('fields.collateral_details.vehicle_color.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.vehicle_color.key'), isset($data['row'][config('fields.collateral_details.vehicle_color.key')])?$data['row'][config('fields.collateral_details.vehicle_color.key')]:null, ['placeholder' => config('fields.collateral_details.vehicle_color.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.vehicle_color.key'), 'required'=>config('fields.collateral_details.vehicle_color.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.vehicle_model.key') }}"> {{ config('fields.collateral_details.vehicle_model.name_np') }}	</label> {!! config('fields.collateral_details.vehicle_model.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.vehicle_model.key'), isset($data['row'][config('fields.collateral_details.vehicle_model.key')])?$data['row'][config('fields.collateral_details.vehicle_model.key')]:null, ['placeholder' => config('fields.collateral_details.vehicle_model.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.vehicle_model.key'), 'required'=>config('fields.collateral_details.vehicle_model.required')]) !!}
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.vehicle_cc.key') }}"> {{ config('fields.collateral_details.vehicle_cc.name_np') }}	</label> {!! config('fields.collateral_details.vehicle_cc.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.vehicle_cc.key'), isset($data['row'][config('fields.collateral_details.vehicle_cc.key')])?$data['row'][config('fields.collateral_details.vehicle_cc.key')]:null, ['placeholder' => config('fields.collateral_details.vehicle_cc.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.vehicle_cc.key'), 'required'=>config('fields.collateral_details.vehicle_cc.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.vehicle_number.key') }}"> {{ config('fields.collateral_details.vehicle_number.name_np') }}	</label> {!! config('fields.collateral_details.vehicle_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.vehicle_number.key'), isset($data['row'][config('fields.collateral_details.vehicle_number.key')])?$data['row'][config('fields.collateral_details.vehicle_number.key')]:null, ['placeholder' => config('fields.collateral_details.vehicle_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.vehicle_number.key'), 'required'=>config('fields.collateral_details.vehicle_number.required')]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.vehicle_engine_number.key') }}"> {{ config('fields.collateral_details.vehicle_engine_number.name_np') }}	</label> {!! config('fields.collateral_details.vehicle_engine_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.vehicle_engine_number.key'), isset($data['row'][config('fields.collateral_details.vehicle_engine_number.key')])?$data['row'][config('fields.collateral_details.vehicle_engine_number.key')]:null, ['placeholder' => config('fields.collateral_details.vehicle_engine_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.vehicle_engine_number.key'), 'required'=>config('fields.collateral_details.vehicle_engine_number.required')]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.vehicle_chassis_number.key') }}"> {{ config('fields.collateral_details.vehicle_chassis_number.name_np') }}	</label> {!! config('fields.collateral_details.vehicle_chassis_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.vehicle_chassis_number.key'), isset($data['row'][config('fields.collateral_details.vehicle_chassis_number.key')])?$data['row'][config('fields.collateral_details.vehicle_chassis_number.key')]:null, ['placeholder' => config('fields.collateral_details.vehicle_chassis_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.vehicle_chassis_number.key'), 'required'=>config('fields.collateral_details.vehicle_chassis_number.required')]) !!}
                </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.vehicle_company_name.key') }}"> {{ config('fields.collateral_details.vehicle_company_name.name_np') }}	</label> {!! config('fields.collateral_details.vehicle_company_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.vehicle_company_name.key'), isset($data['row'][config('fields.collateral_details.vehicle_company_name.key')])?$data['row'][config('fields.collateral_details.vehicle_company_name.key')]:null, ['placeholder' => config('fields.collateral_details.vehicle_company_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.vehicle_company_name.key'), 'required'=>config('fields.collateral_details.vehicle_company_name.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.vehicle_price.key') }}"> {{ config('fields.collateral_details.vehicle_price.name_np') }}	</label> {!! config('fields.collateral_details.vehicle_price.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.vehicle_price.key'), isset($data['row'][config('fields.collateral_details.vehicle_price.key')])?$data['row'][config('fields.collateral_details.vehicle_price.key')]:null, ['placeholder' => config('fields.collateral_details.vehicle_price.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.vehicle_price.key'), 'required'=>config('fields.collateral_details.vehicle_price.required')]) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.vehicle_purchasing_org.key') }}"> {{ config('fields.collateral_details.vehicle_purchasing_org.name_np') }}	</label> {!! config('fields.collateral_details.vehicle_purchasing_org.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.vehicle_purchasing_org.key'), isset($data['row'][config('fields.collateral_details.vehicle_purchasing_org.key')])?$data['row'][config('fields.collateral_details.vehicle_purchasing_org.key')]:null, ['placeholder' => config('fields.collateral_details.vehicle_purchasing_org.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.vehicle_purchasing_org.key'), 'required'=>config('fields.collateral_details.vehicle_purchasing_org.required')]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.yatayat_representative.key') }}"> {{ config('fields.collateral_details.yatayat_representative.name_np') }}	</label> {!! config('fields.collateral_details.yatayat_representative.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.yatayat_representative.key'), isset($data['row'][config('fields.collateral_details.yatayat_representative.key')])?$data['row'][config('fields.collateral_details.yatayat_representative.key')]:null, ['placeholder' => config('fields.collateral_details.yatayat_representative.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.yatayat_representative.key'), 'required'=>config('fields.collateral_details.yatayat_representative.required')]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.yatayat_office_name.key') }}"> {{ config('fields.collateral_details.yatayat_office_name.name_np') }}	</label> {!! config('fields.collateral_details.yatayat_office_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.yatayat_office_name.key'), isset($data['row'][config('fields.collateral_details.yatayat_office_name.key')])?$data['row'][config('fields.collateral_details.yatayat_office_name.key')]:null, ['placeholder' => config('fields.collateral_details.yatayat_office_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.yatayat_office_name.key'), 'required'=>config('fields.collateral_details.yatayat_office_name.required')]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.v_collateral_valuator.key') }}"> {{ config('fields.collateral_details.v_collateral_valuator.name_np') }}	</label> {!! config('fields.collateral_details.v_collateral_valuator.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.v_collateral_valuator.key'), isset($data['row'][config('fields.collateral_details.v_collateral_valuator.key')])?$data['row'][config('fields.collateral_details.v_collateral_valuator.key')]:null, ['placeholder' => config('fields.collateral_details.v_collateral_valuator.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.v_collateral_valuator.key'), 'required'=>config('fields.collateral_details.v_collateral_valuator.required')]) !!}
                </div>
            </div>
        </div>
        @include('admin.application.includes.vehicledocs')
    </fieldset>
</div>