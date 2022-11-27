<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border"> धनजमानी फारम (पारिवारिक)</legend>
        @if($data['row'][config('fields.guarantor_details.guarantor1_name.key')] == '')
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">पुरानो रेकडहरु</legend>
            <div class="form-row form-gorup">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="suggestion_type"> रेकडको किसिम	</label>
                        {!! Form::select('g1_suggestion_type', isset($data['suggestion_types'])?$data['suggestion_types']:[], (isset($data['g1_suggestion_type'])? $data['g1_suggestion_type'] : null),
                            ['class' => 'form-control select_to g1_suggestion_type' ]) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="g1_suggestion_id"> नामहरु	</label>
                        {!! Form::select('g1_suggestion_id', isset($data['g1_suggestions'])?$data['g1_suggestions']:[], (isset($data['g1_suggestion_id'])? $data['g1_suggestion_id'] : null),
                            ['class' => 'form-control select_to g1_suggestion_id' ]) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group pt-4">
                    <a id="guaranter1_fill" class="btn btn-info btn-sm guaranter1_fill"> Fill</a>
                    <a href="{{  isset($data['row'])? route($base_route.'.edit', ['application' =>  $data['row']->application_id, 'form-name'=>'guarantor_details']) : '#' }}" class="btn btn-warning btn-sm reset"> Reset</a>
                    </div>
                </div>
            </div>
        </fieldset>
        @endif
        <div class="form-row form_row_margin_bottom">
            <div class="col-md-3 ">
                <div class="form-group">
                    <label for="{{ config('fields.guarantor_details.guarantor1_name.key') }}"> {{ config('fields.guarantor_details.guarantor1_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor1_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.guarantor_details.guarantor1_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor1_name.key')])?$data['row'][config('fields.guarantor_details.guarantor1_name.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor1_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor1_name.key'), 'required'=>config('fields.guarantor_details.guarantor1_name.required')]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.guarantor_details.guarantor1_father_name.key') }}"> {{ config('fields.guarantor_details.guarantor1_father_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor1_father_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.guarantor_details.guarantor1_father_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor1_father_name.key')])?$data['row'][config('fields.guarantor_details.guarantor1_father_name.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor1_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor1_father_name.key'), 'required'=>config('fields.guarantor_details.guarantor1_father_name.required')]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <label for="{{ config('fields.guarantor_details.guarantor1_grand_father_name.key') }}"> {{ config('fields.guarantor_details.guarantor1_grand_father_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor1_grand_father_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                {!! Form::text(config('fields.guarantor_details.guarantor1_grand_father_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor1_grand_father_name.key')])?$data['row'][config('fields.guarantor_details.guarantor1_grand_father_name.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor1_grand_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor1_grand_father_name.key'), 'required'=>config('fields.guarantor_details.guarantor1_grand_father_name.required')]) !!}
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.guarantor_details.guarantor1_spouse_name.key') }}"> {{ config('fields.guarantor_details.guarantor1_spouse_name.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor1_spouse_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.guarantor_details.guarantor1_spouse_name.key'), isset($data['row'][config('fields.guarantor_details.guarantor1_spouse_name.key')])?$data['row'][config('fields.guarantor_details.guarantor1_spouse_name.key')]: null, ['placeholder' => config('fields.guarantor_details.guarantor1_spouse_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.guarantor_details.guarantor1_spouse_name.key'), 'required'=>config('fields.guarantor_details.guarantor1_spouse_name.required')]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.guarantor_details.guarantor1_relation.key') }}"> {{ config('fields.guarantor_details.guarantor1_relation.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor1_relation.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    
                    {!! Form::select(config('fields.guarantor_details.guarantor1_relation.key'), isset($data['relations'])?$data['relations']:[], null,
                    ['class' => 'form-control select_to  '.config('fields.guarantor_details.guarantor1_relation.key'), 'required'=>config('fields.guarantor_details.guarantor1_relation.required') ]) !!}
            
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="{{ config('fields.guarantor_details.guarantor1_subscription_id.key') }}"> {{ config('fields.guarantor_details.guarantor1_subscription_id.name_np') }}	</label> {!! config('fields.guarantor_details.guarantor1_subscription_id.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.guarantor_details.guarantor1_subscription_id.key'), isset($data['row'][config('fields.guarantor_details.guarantor1_subscription_id.key')])?$data['row'][config('fields.guarantor_details.guarantor1_subscription_id.key')]:(isset($data['rawGuarantor1'])? $data['rawGuarantor1'][config('fields.guarantor_details.guarantor1_subscription_id.key')] : null), ['placeholder' => config('fields.guarantor_details.guarantor1_subscription_id.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.guarantor_details.guarantor1_subscription_id.key'), 'required'=>config('fields.guarantor_details.guarantor1_subscription_id.required')]) !!}
                </div>
            </div>
        </div>
        <br>
    </fieldset>
</div>  