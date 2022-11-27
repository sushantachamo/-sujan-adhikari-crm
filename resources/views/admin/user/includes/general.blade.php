<style>
    .form-control-sm {
            font-size: 0.8rem;
            line-height: 1.5;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered
        {
            line-height: 36px;
        }
        .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
        }
</style>
<fieldset>
    <legend>
        User Information
    </legend>
    <div class="row">
            <div class="form-group col-md-4 col-sm-4">
                <label for="name">पुरा नाम: <span class="text-danger">*</span></label>
                {!! Form::text('name', null, ['placeholder' => 'पुरा नाम', 'class' => 'form-control form-control-sm ']) !!}
            </div>

            <div class="form-group col-md-4 col-sm-4">
                <label for="email">ईमेल: <span class="text-danger">*</span></label>
                {!! Form::email('email', null, ['placeholder' => 'ईमेल', 'class' => 'form-control form-control-sm ']) !!}
            </div>
            @if (!isset($data['row']))

            <div class="form-group col-md-4 col-sm-4">
                <label for="password">पास्वर्ड: <span class="text-danger">*</span></label>
                {!! Form::password('password', ['class' =>  ' form-control form-control-sm ']) !!}
                @include('admin.includes.form_validation_alert', ['field' => 'password'])
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <label for="password_confirmation">पुन पास्वर्ड: <span class="text-danger">*</span></label>

                {!! Form::password('password_confirmation', ['class' => ' form-control form-control-sm ']) !!}
                @include('admin.includes.form_validation_alert', ['field' => 'password_confirmation'])
            </div>

            @endif
            <div class="form-group col-md-4 col-sm-4">
                <label for="office_d">सहकारी: <span class="text-danger">*</span></label>
                {!! Form::select('office_id', $data['offices'], null, ['class' => 'form-control select2']) !!}
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <label for="approve_limit">उच्चतम प्रमाणीकरण सिमा:</label>
                {!! Form::number('approved_limit', null, ['placeholder' => 'Approve Limit', 'class' => 'form-control form-control-sm']) !!}
            </div>

            <div class="form-group col-md-4 col-sm-4">
                {!! Form::label('status', 'अवस्था', ['class' => 'col-md-4 control-label']) !!}
                <div class="radio">
                    <label class="radio">
                        {!! Form::radio('status', 1 , true); !!}
                        <i></i>सक्रिय

                    </label>
                    <label class="radio">
                        {!! Form::radio('status', 0 , false); !!}
                        <i></i>निष्क्रिय
                    </label>
                </div>
            </div>
    </div>
</fieldset>
<hr>
<fieldset>
    <legend>
        भूमिकाहरु
    </legend>
    <div class="row">
        <div class="form-group col-md-12 col-sm-12">
            <div class="checkbox">
                @if(isset($data['roles']))
                    @foreach($data['roles'] as $role)
                        <div class="form-check-inline">
                            <label class="form-check-label">


                            @if(!isset($data['row']))
                                {!! Form::checkbox('roles[]', $role->name, '',['class'=>'form-check-input']) !!}
                            @else
                                {!! Form::checkbox('roles[]', $role->name, (is_array($data['row']->roles) && in_array($role->name, $data['row']->roles)) ? ' checked' : '',['class'=>'form-check-input']) !!}

                            @endif


                                <i></i> {{ Illuminate\Support\Str::ucfirst($role->name) }}
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</fieldset>
