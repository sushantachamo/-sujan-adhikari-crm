<div>
    
    <fieldset class="scheduler-border">
       <legend class="scheduler-border">लघुबित्त ऋण विवरण</legend>
       @if($data['row'][config('fields.guarantor_details.microfinance_group_number.key')] == '')
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">पुरानो रेकडहरु</legend>
        <div class="form-row form-gorup">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="laghu_suggestion_id"> खोज्नुहोस्	</label>
                    {!! Form::select('laghu_suggestion_id', isset($data['laghu_suggestions'])?$data['laghu_suggestions']:[], (isset($data['laghu_suggestion_id'])? $data['laghu_suggestion_id'] : null),
                        ['class' => 'form-control select_to  '.'laghu_suggestion_id' ]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group pt-4">
                <a id="laghu_fill" class="btn btn-info btn-sm laghu_fill"> Fill</a>
                <a href="{{  isset($data['row'])? route($base_route.'.edit', ['application' =>  $data['row']->application_id, 'form-name'=>'collateral_details']) : '#' }}" class="btn btn-warning btn-sm reset"> Reset</a>
                </div>
            </div>
        </div>
    </fieldset>
    @endif
       <div class="form-row form-group mb-3">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.microfinance_programe_name.key') }}">{{ config('fields.collateral_details.microfinance_programe_name.name_np') }}</label> {!! config('fields.collateral_details.microfinance_programe_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.microfinance_programe_name.key'), isset($data['request'][config('fields.collateral_details.microfinance_programe_name.key')])?$data['request'][config('fields.collateral_details.microfinance_programe_name.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_programe_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_programe_name.key'), 'required'=>config('fields.collateral_details.microfinance_center_number.required')]) !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.microfinance_center_number.key') }}">{{ config('fields.collateral_details.microfinance_center_number.name_np') }}</label> {!! config('fields.collateral_details.microfinance_center_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.microfinance_center_number.key'), isset($data['request'][config('fields.collateral_details.microfinance_center_number.key')])?$data['request'][config('fields.collateral_details.microfinance_center_number.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_center_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.microfinance_center_number.key'), 'required'=>config('fields.collateral_details.microfinance_center_number.required')]) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.microfinance_center_name.key') }}"> {{ config('fields.collateral_details.microfinance_center_name.name_np') }}	</label> {!! config('fields.collateral_details.microfinance_center_name.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.microfinance_center_name.key'), isset($data['request'][config('fields.collateral_details.microfinance_center_name.key')])?$data['request'][config('fields.collateral_details.microfinance_center_name.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_center_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_center_name.key'), 'required'=>config('fields.collateral_details.microfinance_center_name.required')]) !!}
                </div>
            </div>
            
            <div class="col-sm-2">
               <div class="form-group">
                   <label for="{{ config('fields.collateral_details.microfinance_group_number.key') }}"> {{ config('fields.collateral_details.microfinance_group_number.name_np') }}</label> {!! config('fields.collateral_details.microfinance_group_number.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                   {!! Form::text(config('fields.collateral_details.microfinance_group_number.key'), isset($data['request'][config('fields.collateral_details.microfinance_group_number.key')])?$data['request'][config('fields.collateral_details.microfinance_group_number.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_group_number.name_np'), 'class' => 'form-control form-control-sm ', 'id' => config('fields.collateral_details.microfinance_group_number.key'), 'required'=>config('fields.collateral_details.microfinance_group_number.required')]) !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="{{ config('fields.collateral_details.microfinance_group.key') }}"> {{ config('fields.collateral_details.microfinance_group.name_np') }}</label> {!! config('fields.collateral_details.microfinance_group.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                    {!! Form::text(config('fields.collateral_details.microfinance_group.key'), isset($data['request'][config('fields.collateral_details.microfinance_group.key')])?$data['request'][config('fields.collateral_details.microfinance_group.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_group.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_group.key'), 'required'=>config('fields.collateral_details.microfinance_group.required')]) !!}
                </div>
            </div>
            <div class="col-sm-12">
                <table class="table">
                    <tr>
                        <td>किसिम</td>
                        <td>नाम</td>
                        <td>बुबाको नाम</td>
                        <td>वाजेको नाम</td>
                    </tr>
                    <tr>
                        <td>अध्यक्ष</td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_chairman_name.key'), isset($data['request'][config('fields.collateral_details.microfinance_chairman_name.key')])?$data['request'][config('fields.collateral_details.microfinance_chairman_name.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_chairman_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_chairman_name.key'), 'required'=>config('fields.collateral_details.microfinance_chairman_name.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_chairman_father_name.key'), isset($data['request'][config('fields.collateral_details.microfinance_chairman_father_name.key')])?$data['request'][config('fields.collateral_details.microfinance_chairman_father_name.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_chairman_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_chairman_father_name.key'), 'required'=>config('fields.collateral_details.microfinance_chairman_father_name.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_chairman_grand_father_name.key'), isset($data['request'][config('fields.collateral_details.microfinance_chairman_grand_father_name.key')])?$data['request'][config('fields.collateral_details.microfinance_chairman_grand_father_name.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_chairman_grand_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_chairman_grand_father_name.key'), 'required'=>config('fields.collateral_details.microfinance_chairman_grand_father_name.required')]) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>सदस्यको १</td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_name_one.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_name_one.key')])?$data['request'][config('fields.collateral_details.microfinance_member_name_one.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_name_one.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_name_one.key'), 'required'=>config('fields.collateral_details.microfinance_member_name_one.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_father_name_one.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_father_name_one.key')])?$data['request'][config('fields.collateral_details.microfinance_member_father_name_one.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_father_name_one.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_father_name_one.key'), 'required'=>config('fields.collateral_details.microfinance_member_father_name_one.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_grand_father_name_one.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_grand_father_name_one.key')])?$data['request'][config('fields.collateral_details.microfinance_member_grand_father_name_one.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_grand_father_name_one.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_grand_father_name_one.key'), 'required'=>config('fields.collateral_details.microfinance_member_grand_father_name_one.required')]) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>सदस्यको २</td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_name_two.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_name_two.key')])?$data['request'][config('fields.collateral_details.microfinance_member_name_two.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_name_two.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_name_two.key'), 'required'=>config('fields.collateral_details.microfinance_member_name_two.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_father_name_two.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_father_name_two.key')])?$data['request'][config('fields.collateral_details.microfinance_member_father_name_two.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_father_name_two.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_father_name_two.key'), 'required'=>config('fields.collateral_details.microfinance_member_father_name_two.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_grand_father_name_two.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_grand_father_name_two.key')])?$data['request'][config('fields.collateral_details.microfinance_member_grand_father_name_two.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_grand_father_name_two.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_grand_father_name_two.key'), 'required'=>config('fields.collateral_details.microfinance_member_grand_father_name_two.required')]) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>सदस्यको ३</td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_name_three.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_name_three.key')])?$data['request'][config('fields.collateral_details.microfinance_member_name_three.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_name_three.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_name_three.key'), 'required'=>config('fields.collateral_details.microfinance_member_name_three.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_father_name_three.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_father_name_three.key')])?$data['request'][config('fields.collateral_details.microfinance_member_father_name_three.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_father_name_three.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_father_name_three.key'), 'required'=>config('fields.collateral_details.microfinance_member_father_name_three.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_grand_father_name_three.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_grand_father_name_three.key')])?$data['request'][config('fields.collateral_details.microfinance_member_grand_father_name_three.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_grand_father_name_three.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_grand_father_name_three.key'), 'required'=>config('fields.collateral_details.microfinance_member_grand_father_name_three.required')]) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>सदस्यको ४</td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_name_four.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_name_four.key')])?$data['request'][config('fields.collateral_details.microfinance_member_name_four.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_name_four.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_name_four.key'), 'required'=>config('fields.collateral_details.microfinance_member_name_four.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_father_name_four.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_father_name_four.key')])?$data['request'][config('fields.collateral_details.microfinance_member_father_name_four.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_father_name_four.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_father_name_four.key'), 'required'=>config('fields.collateral_details.microfinance_member_father_name_four.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_member_grand_father_name_four.key'), isset($data['request'][config('fields.collateral_details.microfinance_member_grand_father_name_four.key')])?$data['request'][config('fields.collateral_details.microfinance_member_grand_father_name_four.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_member_grand_father_name_four.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_member_grand_father_name_four.key'), 'required'=>config('fields.collateral_details.microfinance_member_grand_father_name_four.required')]) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>केन्द्र प्रमुख</td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_head.key'), isset($data['request'][config('fields.collateral_details.microfinance_head.key')])?$data['request'][config('fields.collateral_details.microfinance_head.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_head.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_head.key'), 'required'=>config('fields.collateral_details.microfinance_head.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_head_father_name.key'), isset($data['request'][config('fields.collateral_details.microfinance_head_father_name.key')])?$data['request'][config('fields.collateral_details.microfinance_head_father_name.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_head_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_head_father_name.key'), 'required'=>config('fields.collateral_details.microfinance_head_father_name.required')]) !!}
                        </td>
                        <td>
                            {!! Form::text(config('fields.collateral_details.microfinance_head_grand_father_name.key'), isset($data['request'][config('fields.collateral_details.microfinance_head_grand_father_name.key')])?$data['request'][config('fields.collateral_details.microfinance_head_grand_father_name.key')]: null, ['placeholder' => config('fields.collateral_details.microfinance_head_grand_father_name.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.collateral_details.microfinance_head_grand_father_name.key'), 'required'=>config('fields.collateral_details.microfinance_head_grand_father_name.required')]) !!}
                        </td>
                    </tr>
                </table>
            </div>
       </div>
    </fieldset>
</div>