<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">
            <a  data-toggle="collapse" href="#collapseanshiyar1" role="button" aria-expanded="false" aria-controls="collapseanshiyar1">
                <span>अशिंयार (१)</span>
                <span class="group-icon">
                    <i class="fi fi-arrow-end-slim"></i>
                    <i class="fi fi-arrow-down-slim"></i>
                </span>
            </a>
        </legend>
        <div class="{{ isset($data['row']['anshiyar1_name']) && $data['row']['anshiyar1_name']!=null ? '': 'collapse' }}" id="collapseanshiyar1">
            <div class="form-row form-group mb-3">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="{{ config('fields.collateral_details.anshiyar1_name.key') }}">{{ config('fields.collateral_details.anshiyar1_name.name_np') }}</label> {!! config('fields.collateral_details.anshiyar1_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.collateral_details.anshiyar1_name.key'), isset($data['request'][config('fields.collateral_details.anshiyar1_name.key')])?$data['request'][config('fields.collateral_details.anshiyar1_name.key')]:null, ['placeholder' => config('fields.collateral_details.anshiyar1_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.anshiyar1_name.key'), 'required'=>config('fields.collateral_details.anshiyar1_name.required')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="{{ config('fields.collateral_details.anshiyar1_age.key') }}"> {{ config('fields.collateral_details.anshiyar1_age.name_np') }}	</label> {!! config('fields.collateral_details.anshiyar1_age.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.collateral_details.anshiyar1_age.key'), isset($data['request'][config('fields.collateral_details.anshiyar1_age.key')])?$data['request'][config('fields.collateral_details.anshiyar1_age.key')]:null, ['placeholder' => config('fields.collateral_details.anshiyar1_age.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.anshiyar1_age.key'), 'required'=>config('fields.collateral_details.anshiyar1_age.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.collateral_details.anshiyar1_province.key') }}">{{ config('fields.collateral_details.anshiyar1_province.name_np') }}</label> {!! config('fields.collateral_details.anshiyar1_province.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('anshiyar1_province', isset($data['provinces'])?$data['provinces']:[], null,
                        ['class' => 'form-control select_to  anshiyar1_province']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.collateral_details.anshiyar1_district.key') }}">{{ config('fields.collateral_details.anshiyar1_district.name_np') }}</label> {!! config('fields.collateral_details.anshiyar1_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('anshiyar1_district',isset($data['anshiyar1_districts'])?$data['anshiyar1_districts']:[], null,
                        ['class' => 'form-control select_to anshiyar1_district']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.collateral_details.anshiyar1_localgovt.key') }}">{{ config('fields.collateral_details.anshiyar1_localgovt.name_np') }}</label> {!! config('fields.collateral_details.anshiyar1_localgovt.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('anshiyar1_localgovt',isset($data['anshiyar1_localgovts'])?$data['anshiyar1_localgovts']:[], null,
                        ['class' => 'form-control  select_to anshiyar1_localgovt']) !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                        <label for="{{ config('fields.collateral_details.anshiyar1_ward.key') }}">{{ config('fields.collateral_details.anshiyar1_ward.name_np') }}</label> {!! config('fields.collateral_details.anshiyar1_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('anshiyar1_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'),  null,
                            ['class' => 'form-control  select_to anshiyar1_ward']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.collateral_details.anshiyar1_tole.key') }}">{{ config('fields.collateral_details.anshiyar1_tole.name_np') }}</label> {!! config('fields.collateral_details.anshiyar1_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.collateral_details.anshiyar1_tole.key'), isset($data['row'][config('fields.collateral_details.anshiyar1_tole.key')])?$data['row'][config('fields.collateral_details.anshiyar1_tole.key')]:null, ['placeholder' => config('fields.collateral_details.anshiyar1_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.anshiyar1_tole.key'), 'required'=>config('fields.collateral_details.anshiyar1_tole.required')]) !!}
                        </div>
                    </div>
            </div>
        </div>
    </fieldset>
</div>