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
                <div class="row mt-2" style="background-color:#d6dfe73b">
                    @include('admin.application.includes.reviews.collateral_detailsreview')
                </div>
                <div class="row mt-2" style="background-color:#d6dfe73b">
                    @include('admin.application.includes.reviews.loan_detailsreview')
                </div>
                <div class="row mt-2" style="background-color:#d6dfe73b">
                    @include('admin.application.includes.reviews.dhanjamanireview', ['var'=>1])
                    @if(isset($data['row']['guarantor2_name']) && $data['row']['guarantor2_name']!=null)
                    @include('admin.application.includes.reviews.dhanjamanireview', ['var'=>2])
                    @endif
                    @if(isset($data['row']['guarantor3_name']) && $data['row']['guarantor3_name']!=null)
                    @include('admin.application.includes.reviews.dhanjamanireview', ['var'=>3])
                    @endif
                    @if(isset($data['row']['guarantor4_name']) && $data['row']['guarantor4_name']!=null)
                    @include('admin.application.includes.reviews.dhanjamanireview', ['var'=>4])
                    @endif
                </div>
                <div class="row mt-2" style="background-color:#d6dfe73b">
                    @include('admin.application.includes.reviews.sanchireview', ['var'=>1])
                    @if(isset($data['row']['sanchi2_name']) && $data['row']['sanchi2_name']!=null)
                    @include('admin.application.includes.reviews.sanchireview', ['var'=>2])
                    @endif
                </div>
                <div class="row mt-2" style="background-color:#d6dfe73b">
                    @include('admin.application.includes.reviews.other_detailsreview')
                </div>
                <div class="row mt-2" style="background-color:#d6dfe73b">
                    @include('admin.application.includes.reviews.filesreview')
                </div>
                {{-- <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Review | Approved By</legend>
                    <div class="form-row form-group mb-3">
                        @can('review-'.Illuminate\Support\Str::lower($panel))
                         <div class="col-sm-3">
                            <div class="form-group">
                                <label for="{{ config('fields.other_details.reviewed_by.key') }}">{{ config('fields.other_details.reviewed_by.name_np') }}</label> {!! config('fields.other_details.reviewed_by.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                {!! Form::text(config('fields.other_details.reviewed_by.key'), isset($data['request'][config('fields.other_details.reviewed_by.key')])?$data['request'][config('fields.other_details.reviewed_by.key')]: null, ['placeholder' => config('fields.other_details.reviewed_by.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.other_details.reviewed_by.key'), 'required'=>config('fields.other_details.reviewed_by.required')]) !!}
                            </div>
                        </div>
                        @endcan
                        @can('approve-'.Illuminate\Support\Str::lower($panel))
                            @if($data['row']['reviewed_by']!=null)
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="{{ config('fields.other_details.approved_by.key') }}">{{ config('fields.other_details.approved_by.name_np') }}</label> {!! config('fields.other_details.approved_by.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                                    {!! Form::text(config('fields.other_details.approved_by.key'), isset($data['request'][config('fields.other_details.approved_by.key')])?$data['request'][config('fields.other_details.approved_by.key')]: null, ['placeholder' => config('fields.other_details.approved_by.name_np'), 'class' => 'form-control unicode form-control-sm ', 'id' => config('fields.other_details.approved_by.key'), 'required'=>config('fields.other_details.approved_by.required')]) !!}
                                </div>
                            </div>
                            @endif
                        @endcan
                    </div>
                </fieldset> --}}
            </div>
            <div class="col-md-4 no_print">
                @include('admin.application.forms.status_change')
                @include('admin.application.includes.status_form')
            </div>
        </div>
    </div>
</div>

