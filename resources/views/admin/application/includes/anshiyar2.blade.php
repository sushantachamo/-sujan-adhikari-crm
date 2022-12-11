<div>
    <fieldset class="scheduler-border">
       <legend class="scheduler-border"><a  data-toggle="collapse" href="#collapseanshiyar2" role="button" aria-expanded="false" aria-controls="collapseanshiyar2">
            <span>अशिंयार (२)</span>
            <span class="group-icon">
                <i class="fi fi-arrow-end-slim"></i>
                <i class="fi fi-arrow-down-slim"></i>
            </span>
        </a>
    </legend>
    <div class="{{ isset($data['row']['anshiyar2_name']) && $data['row']['anshiyar2_name']!=null ? '': 'collapse' }}" id="collapseanshiyar2">
       <div class="form-row form-group mb-3">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.anshiyar2_name.key') }}">{{ config('fields.collateral_details.anshiyar2_name.name_np') }}</label> 
                    {!! Form::text(config('fields.collateral_details.anshiyar2_name.key'), isset($data['request'][config('fields.collateral_details.anshiyar2_name.key')])?$data['request'][config('fields.collateral_details.anshiyar2_name.key')]:null, ['placeholder' => config('fields.collateral_details.anshiyar2_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.anshiyar2_name.key'), 'required'=>config('fields.collateral_details.anshiyar2_name.required')]) !!}
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.anshiyar2_age.key') }}"> {{ config('fields.collateral_details.anshiyar2_age.name_np') }}	</label> 
                    {!! Form::text(config('fields.collateral_details.anshiyar2_age.key'), isset($data['request'][config('fields.collateral_details.anshiyar2_age.key')])?$data['request'][config('fields.collateral_details.anshiyar2_age.key')]:null, ['placeholder' => config('fields.collateral_details.anshiyar2_age.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.anshiyar2_age.key'), 'required'=>config('fields.collateral_details.anshiyar2_age.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                <label for="{{ config('fields.collateral_details.anshiyar2_province.key') }}">{{ config('fields.collateral_details.anshiyar2_province.name_np') }}</label> {!! config('fields.collateral_details.anshiyar2_province.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::select('anshiyar2_province', isset($data['provinces'])?$data['provinces']:[], null,
                ['class' => 'form-control select_to  anshiyar2_province']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                <label for="{{ config('fields.collateral_details.anshiyar2_district.key') }}">{{ config('fields.collateral_details.anshiyar2_district.name_np') }}</label> {!! config('fields.collateral_details.anshiyar2_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::select('anshiyar2_district',isset($data['anshiyar2_districts'])?$data['anshiyar2_districts']:[], null,
                ['class' => 'form-control select_to anshiyar2_district']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                <label for="{{ config('fields.collateral_details.anshiyar2_localgovt.key') }}">{{ config('fields.collateral_details.anshiyar2_localgovt.name_np') }}</label> {!! config('fields.collateral_details.anshiyar2_localgovt.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!!Form::select('anshiyar2_localgovt',isset($data['anshiyar2_localgovts'])?$data['anshiyar2_localgovts']:[], null,
                ['class' => 'form-control  select_to anshiyar2_localgovt']) !!}
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                <label for="{{ config('fields.collateral_details.anshiyar2_ward.key') }}">{{ config('fields.collateral_details.anshiyar2_ward.name_np') }}</label> {!! config('fields.collateral_details.anshiyar2_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!!Form::select('anshiyar2_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'),  null,
                    ['class' => 'form-control  select_to anshiyar2_ward']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                <label for="{{ config('fields.collateral_details.anshiyar2_tole.key') }}">{{ config('fields.collateral_details.anshiyar2_tole.name_np') }}</label> {!! config('fields.collateral_details.anshiyar2_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.collateral_details.anshiyar2_tole.key'), isset($data['row'][config('fields.collateral_details.anshiyar2_tole.key')])?$data['row'][config('fields.collateral_details.anshiyar2_tole.key')]:null, ['placeholder' => config('fields.collateral_details.anshiyar2_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.anshiyar2_tole.key'), 'required'=>config('fields.collateral_details.anshiyar2_tole.required')]) !!}
                </div>
            </div>
       </div>
    </fieldset>
</div>