@if(isset($data['row']))
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('password', 'Password', ['class' => ' control-label']) !!}
        {!! Form::password('password', ['class' => 'form-control form-control-sm required']) !!}
    </div>
    <div class=" form-group col-md-6">
        {!! Form::label('password_confirmation', 'Password Confirm', ['class' => 'control-label']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control form-control-sm required']) !!}
    </div>
</div>
@endif