<div class="card card-success">
    <div class="card-body">
        <div class="card-title">
            <h5>Current Status</h5>
        </div>
        @foreach($data['statuses'] as $status)
            <div class='border-box' style="background-color:#edfff0; padding:10px 8px; border-bottom: 1px solid #000;"> 
                <strong>{{$status->training_text }}</strong><br>
                {{$status->comment }}
                <br>
                <span class="badge badge-{{config('custom.status_details.'.$status->status_code.'.color' )}}">{{ config('custom.status_details.'.$status->status_code.'.name_en') }}</span>
                ||
                {{ $status->user()->first() != null ? $status->user()->first()->name : 'Auto Generated' }} ||

                <span class="nepaliDate" englishDate="{{ $status->created_at->format('Y-m-d') }}"> </span> ||
                @if($status->is_notifiable == true)
                <span class="singleClick badge badge-primary"> Notified</span>
                @endif
                || 
            </div>
        @endforeach
    </div>
</div>