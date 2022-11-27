
@php
if(($data['row']->latest_status_code == 'new' || $data['row']->latest_status_code == 'new' || $data['row']->latest_status_code == 'invalid' || $data['row']->latest_status_code == 'duplicate' || $data['row']->latest_status_code == 'declined' || $data['row']->latest_status_code == 'hold'|| $data['row']->latest_status_code == 'edited'))
{
    $user_can = 'approve';
    $statuses = [''=>'Choose'] +config('custom.reviewer_status');
}
elseif(($data['row']->latest_status_code == 'reviewed' || $data['row']->latest_status_code == 'approved') )
{
    if(Auth::user()->can('approve-application') && Auth::user()->approved_limit >= ViewHelper::convertNumberNpToEn($data['row']['total_loan_amount']))
    {
        $user_can = 'approve';
        $statuses = [''=>'Choose'] +config('custom.approver_status');
    }
    else {
        $user_can = 'cross_limit';
        $statuses = [''=>'Choose'];
    }
}
else {
    $statuses = null;
}
@endphp
@if($statuses)
<div class="card card-success">
    <div class="card-body">
        <h5 class="card-title">
            आवेदनको अवस्था परिवर्तन
        </h5>
        @if($user_can !='cross_limit')
        {!! Form::open(['url' => route($base_route.'.changeStatus'), 'method' => 'post', 'role' => 'form', 'class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
        <input type="hidden" name="application_id" value="{{ $data['row']->application_id }}">   
            <div class="form-group row">
                <strong class="text-center">Status <span class="required">*</span></strong>
                    <select id="status" class="form-control" name="status" required="">
                        @foreach($statuses as $key => $status)
                        <option value="{{ $key }}" {{ $key == old('status')  ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group row">
                <strong class="text-center">By <span class="required">*</span></strong>
                   <input type="text" name="user_name" class="form-control unicode" id="user_name" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group row">
                <strong class="text-center">Message <span class="required">*</span></strong>
                    <textarea id="msg" name="comment" class="form-control unicode" placeholder="Comment" rows="3" required=""></textarea>
            </div>
            <div class="form-group">
                <strong class="text-center"></strong>
                      <button type="submit" class="btn btn-info btn-sm button">Submit</button>
            </div>
            {!! Form::close() !!}
            @else
                <p>तपाँईको User ID वाट रु {{Auth::user()->approved_limit}} सम्मको मात्र ऋण स्वीकृत गर्ने अधिकार रहेकोले यस ऋण स्वीकृतको लागी सम्बन्धित शाखामा सम्पर्क गर्नुहोला ।</p>
            @endif
    </div>
</div>
@endif