<div>
    <fieldset class="scheduler-border">
       <legend class="scheduler-border">साक्षी (१)</legend>
       <div class="form-row form-group mb-3">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="{{ config('fields.sanchi_details.sanchi1_name.key') }}">{{ config('fields.sanchi_details.sanchi1_name.name_np') }}</label> {!! config('fields.sanchi_details.sanchi1_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.sanchi_details.sanchi1_name.key'), isset($data['request'][config('fields.sanchi_details.sanchi1_name.key')])?$data['request'][config('fields.sanchi_details.sanchi1_name.key')]:null, ['placeholder' => config('fields.sanchi_details.sanchi1_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.sanchi_details.sanchi1_name.key'), 'required'=>config('fields.sanchi_details.sanchi1_name.required')]) !!}
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label for="{{ config('fields.sanchi_details.sanchi1_age.key') }}"> {{ config('fields.sanchi_details.sanchi1_age.name_np') }}	</label> {!! config('fields.sanchi_details.sanchi1_age.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.sanchi_details.sanchi1_age.key'), isset($data['request'][config('fields.sanchi_details.sanchi1_age.key')])?$data['request'][config('fields.sanchi_details.sanchi1_age.key')]:null, ['placeholder' => config('fields.sanchi_details.sanchi1_age.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.sanchi_details.sanchi1_age.key'), 'required'=>config('fields.sanchi_details.sanchi1_age.required')]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                <label for="{{ config('fields.sanchi_details.sanchi1_province.key') }}">{{ config('fields.sanchi_details.sanchi1_province.name_np') }}</label> {!! config('fields.sanchi_details.sanchi1_province.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::select('sanchi1_province', isset($data['provinces'])?$data['provinces']:[], null,
                ['class' => 'form-control select_to  sanchi1_province']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                <label for="{{ config('fields.sanchi_details.sanchi1_district.key') }}">{{ config('fields.sanchi_details.sanchi1_district.name_np') }}</label> {!! config('fields.sanchi_details.sanchi1_district.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::select('sanchi1_district',isset($data['sanchi1_districts'])?$data['sanchi1_districts']:[], null,
                ['class' => 'form-control select_to sanchi1_district']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                <label for="{{ config('fields.sanchi_details.sanchi1_localgovt.key') }}">{{ config('fields.sanchi_details.sanchi1_localgovt.name_np') }}</label> {!! config('fields.sanchi_details.sanchi1_localgovt.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!!Form::select('sanchi1_localgovt',isset($data['sanchi1_localgovts'])?$data['sanchi1_localgovts']:[], null,
                ['class' => 'form-control  select_to sanchi1_localgovt']) !!}
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                <label for="{{ config('fields.sanchi_details.sanchi1_ward.key') }}">{{ config('fields.sanchi_details.sanchi1_ward.name_np') }}</label> {!! config('fields.sanchi_details.sanchi1_ward.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!!Form::select('sanchi1_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'),  null,
                    ['class' => 'form-control  select_to sanchi1_ward']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                <label for="{{ config('fields.sanchi_details.sanchi1_tole.key') }}">{{ config('fields.sanchi_details.sanchi1_tole.name_np') }}</label> {!! config('fields.sanchi_details.sanchi1_tole.name_np') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.sanchi_details.sanchi1_tole.key'), isset($data['row'][config('fields.sanchi_details.sanchi1_tole.key')])?$data['row'][config('fields.sanchi_details.sanchi1_tole.key')]:null, ['placeholder' => config('fields.sanchi_details.sanchi1_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.sanchi_details.sanchi1_tole.key'), 'required'=>config('fields.sanchi_details.sanchi1_tole.required')]) !!}
                </div>
            </div>
       </div>
    </fieldset>
</div>