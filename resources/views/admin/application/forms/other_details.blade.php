<fieldset class="scheduler-border">
    <legend class="scheduler-border">अन्य</legend>
    <div class="form-row form-group mb-3">
         <div class="col-sm-3">
             <div class="form-group">
                 <label for="{{ config('fields.other_details.tamsuk_writer.key') }}">{{ config('fields.other_details.tamsuk_writer.name_np') }}</label> {!! config('fields.other_details.tamsuk_writer.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                 {!! Form::text(config('fields.other_details.tamsuk_writer.key'), isset($data['request'][config('fields.other_details.tamsuk_writer.key')])?$data['request'][config('fields.other_details.tamsuk_writer.key')]:null, ['placeholder' => config('fields.other_details.tamsuk_writer.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.other_details.tamsuk_writer.key'), 'required'=>config('fields.other_details.tamsuk_writer.required')]) !!}
             </div>
         </div>
         <div class="col-sm-3">
             <div class="form-group">
                 <label for="{{ config('fields.other_details.tamsuk_approved_by.key') }}"> {{ config('fields.other_details.tamsuk_approved_by.name_np') }}	</label> {!! config('fields.other_details.tamsuk_approved_by.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                 {!! Form::text(config('fields.other_details.tamsuk_approved_by.key'), isset($data['request'][config('fields.other_details.tamsuk_approved_by.key')])?$data['request'][config('fields.other_details.tamsuk_approved_by.key')]:null, ['placeholder' => config('fields.other_details.tamsuk_approved_by.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.other_details.tamsuk_approved_by.key'), 'required'=>config('fields.other_details.tamsuk_approved_by.required')]) !!}
             </div>
         </div>
         <div class="col-sm-2">
             <div class="form-group">
                 <label for="{{ config('fields.other_details.other1.key') }}"> {{ config('fields.other_details.other1.name_np') }}	</label> {!! config('fields.other_details.other1.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                 {!! Form::text(config('fields.other_details.other1.key'), isset($data['request'][config('fields.other_details.other1.key')])?$data['request'][config('fields.other_details.other1.key')]:null, ['placeholder' => config('fields.other_details.other1.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.other_details.other1.key'), 'required'=>config('fields.other_details.other1.required')]) !!}
             </div>
         </div>
         <div class="col-sm-3">
             <div class="form-group">
                 <label for="{{ config('fields.other_details.recommendator.key') }}"> {{ config('fields.other_details.recommendator.name_np') }}	</label> {!! config('fields.other_details.recommendator.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                 {!! Form::text(config('fields.other_details.recommendator.key'), isset($data['request'][config('fields.other_details.recommendator.key')])?$data['request'][config('fields.other_details.recommendator.key')]:null, ['placeholder' => config('fields.other_details.recommendator.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.other_details.recommendator.key'), 'required'=>config('fields.other_details.recommendator.required')]) !!}
             </div>
         </div>
         <div class="col-sm-1">
             <div class="form-group">
                 <label for="{{ config('fields.other_details.other2.key') }}"> {{ config('fields.other_details.other2.name_np') }}	</label> {!! config('fields.other_details.other2.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                 {!! Form::text(config('fields.other_details.other2.key'), isset($data['request'][config('fields.other_details.other2.key')])?$data['request'][config('fields.other_details.other2.key')]:null, ['placeholder' => config('fields.other_details.other2.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.other_details.other2.key'), 'required'=>config('fields.other_details.other2.required')]) !!}
             </div>
         </div>
         
    </div>
 </fieldset>
 @include('admin.application.includes.otherdocs')