<div class="card">
    <style>
        .t_border {border: 1px solid #cfc6c6;
        }
        #printable {font-size: 14px;}
        #printable strong {color: rgb(5, 76, 38);}
    </style>
    <div class="card-body" id="printable">
        <div class="row">
            <div class="col-md-12 mb-2 no_print">
                <a href="#"  id="printBtn"
                    class="btn btn-custom btn-sm print printBtn"><i class="fi fi-print"></i>
                </a>
                <a href="{{ route($base_route.'.show', $data['row']['application_id']) }}" class="btn btn-info btn-sm"><i class="fi fi-eye"></i> रिपोर्टहरु
                </a>
               <span class="float-right "> <b>आवेदनको अवस्था:</b> <span class="btn btn-sm btn-{{config('custom.application_status_details.'.$data['row']['latest_status_code'].'.color' )}}"><i class="strong {{config('custom.application_status_details.'.$data['row']['latest_status_code'].'.icon' )}}"></i>&nbsp {{ config('custom.application_status_details.'.$data['row']['latest_status_code'].'.name_np') }}</span></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row" style="background-color:#d6dfe73b">
                    @include('admin.application.includes.reviews.applicant_detailsreview')
                </div>
            </div>
            <div class="col-md-4 no_print">
                @include('admin.application.forms.status_change')
                @include('admin.application.includes.status_form')
            </div>
        </div>
    </div>
</div>

