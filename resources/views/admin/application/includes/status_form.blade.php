<div class="card card-success">
    <div class="card-body fixed-card">
        <h5 class="card-title">
            आवेदनको अवस्थाहरु
        </h5>
        @php $all_status = $data['row']->statues()->orderBy('created_at', 'desc')->get(); @endphp
        @foreach($all_status as $status)
            <div class='border-box' style='background-color:#edfff0; padding:10px 8px; border-bottom: 1px solid #000;'> 
                <strong><small> ({{ $status->user_name }})</small></strong>-
                <span class="small"><span class="nepaliDate" englishDate="{{ $status->created_at->format('Y-m-d') }}"> </span> {{ ViewHelper::convertNumberEnToNp($status->created_at->format('g:m a')) }}
                </span>
                <span class="float-right badge  badge-{{config('custom.application_status_details.'.$status->status_code.'.color' )}}">{{ config('custom.application_status_details.'.$status->status_code.'.name_np') }}</span><br>
                <span>{{$status->comment }}</span>
            </div>
        @endforeach
    </div>
</div>