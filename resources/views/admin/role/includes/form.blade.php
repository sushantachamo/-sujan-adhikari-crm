<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
			<div class="form-group col-md-4 col-sm-4">
                <label for="name">Role Name: <span class="required">*</span></label>
                {!! Form::text('name', null, ('' == 'required') ?
                ['class' => 'form-control form-control-sm name ', 'required' => 'required'] :
                 ['class' => 'form-control form-control-sm name']) !!}
            </div>
		    <div class="col-md-12">
		    	<table class="table table-striped">
                    <tr>
                        <td>Panel</td>
                        <td>Permission</td>
                    </tr>
                    @foreach($data['permission_lists'] as $key => $p_list)
                    <tr>
                        <td>{{ Illuminate\Support\Str::ucfirst($p_list['panel_name']) }}</td>
                        <td style="display: inline-block;">
                            @foreach($p_list['permissions'] as $permission)
                            <div class="form-check-inline">
	                            <label class="form-check-label">
                                @if(!isset($data['row']))
                                    {!! Form::checkbox('permission[]', $permission['permission_name'], '',['class'=>'form-check-input']) !!}
                                @else
                                    {!! Form::checkbox('permission[]', $permission['permission_name'], (is_array($data['row']->permission) && in_array($permission['permission_name'], $data['row']->permission)) ? ' checked' : '',['class'=>'form-check-input']) !!}

                                @endif

									<i></i> {{ Illuminate\Support\Str::ucfirst($permission['action_name']) }}
								</label>
							</div>
                            @endforeach

                        </td>
                    </tr>
                    @endforeach

                </table>
		    </div>
		    <div class="col-md-12">
		        <button type="submit" name="submit" class="btn btn-success btn-sm"> {{ $button }} </button>
		        <a type="button" href="{{ route($base_route.'.index') }}"
		           class="btn btn-danger btn-sm row-edit">
		            Cancel
		        </a>
		    </div>
		</div>
	</div>
</div>