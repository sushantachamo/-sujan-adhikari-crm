<div>
    <fieldset class="scheduler-border">
       <legend class="scheduler-border">

        <a  data-toggle="collapse" href="#collapsesanchi2" role="button" aria-expanded="false" aria-controls="collapsesanchi2">
            <span>साक्षी (२)</span>
            <span class="group-icon">
                <i class="fi fi-arrow-end-slim"></i>
                <i class="fi fi-arrow-down-slim"></i>
            </span>
        </a>



       </legend>
       <div class="{{ isset($data['row']['sanchi2_name']) && $data['row']['sanchi2_name']!=null ? '': 'collapse' }}" id="collapsesanchi2">
            <div class="form-row form-group mb-3">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="{{ config('fields.sanchi_details.sanchi2_name.key') }}">{{ config('fields.sanchi_details.sanchi2_name.name_np') }}</label> {!! config('fields.sanchi_details.sanchi2_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.sanchi_details.sanchi2_name.key'), isset($data['request'][config('fields.sanchi_details.sanchi2_name.key')])?$data['request'][config('fields.sanchi_details.sanchi2_name.key')]:null, ['placeholder' => config('fields.sanchi_details.sanchi2_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.sanchi_details.sanchi2_name.key'), 'required'=>config('fields.sanchi_details.sanchi2_name.required')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="{{ config('fields.sanchi_details.sanchi2_age.key') }}"> {{ config('fields.sanchi_details.sanchi2_age.name_np') }}	</label> {!! config('fields.sanchi_details.sanchi2_age.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::text(config('fields.sanchi_details.sanchi2_age.key'), isset($data['request'][config('fields.sanchi_details.sanchi2_age.key')])?$data['request'][config('fields.sanchi_details.sanchi2_age.key')]:null, ['placeholder' => config('fields.sanchi_details.sanchi2_age.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.sanchi_details.sanchi2_age.key'), 'required'=>config('fields.sanchi_details.sanchi2_age.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.sanchi_details.sanchi2_province.key') }}">{{ config('fields.sanchi_details.sanchi2_province.name_np') }}</label> {!! config('fields.sanchi_details.sanchi2_province.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('sanchi2_province', isset($data['provinces'])?$data['provinces']:[], null,
                        ['class' => 'form-control select_to  sanchi2_province']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.sanchi_details.sanchi2_district.key') }}">{{ config('fields.sanchi_details.sanchi2_district.name_np') }}</label> {!! config('fields.sanchi_details.sanchi2_district.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::select('sanchi2_district',isset($data['sanchi2_districts'])?$data['sanchi2_districts']:[], null,
                        ['class' => 'form-control select_to sanchi2_district']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.sanchi_details.sanchi2_localgovt.key') }}">{{ config('fields.sanchi_details.sanchi2_localgovt.name_np') }}</label> {!! config('fields.sanchi_details.sanchi2_localgovt.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('sanchi2_localgovt',isset($data['sanchi2_localgovts'])?$data['sanchi2_localgovts']:[], null,
                        ['class' => 'form-control  select_to sanchi2_localgovt']) !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                        <label for="{{ config('fields.sanchi_details.sanchi2_ward.key') }}">{{ config('fields.sanchi_details.sanchi2_ward.name_np') }}</label> {!! config('fields.sanchi_details.sanchi2_ward.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!!Form::select('sanchi2_ward',[null => '-- छान्नुहोस् --']+config('custom.wards'), null,
                        ['class' => 'form-control  select_to sanchi2_ward']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="{{ config('fields.sanchi_details.sanchi2_tole.key') }}">{{ config('fields.sanchi_details.sanchi2_tole.name_np') }}</label> {!! config('fields.sanchi_details.sanchi2_tole.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        {!! Form::text(config('fields.sanchi_details.sanchi2_tole.key'), isset($data['row'][config('fields.sanchi_details.sanchi2_tole.key')])?$data['row'][config('fields.sanchi_details.sanchi2_tole.key')]:null, ['placeholder' => config('fields.sanchi_details.sanchi2_tole.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.sanchi_details.sanchi2_tole.key'), 'required'=>config('fields.sanchi_details.sanchi2_tole.required')]) !!}
                        </div>
                    </div>
            </div>
       </div>
    </fieldset>
</div>