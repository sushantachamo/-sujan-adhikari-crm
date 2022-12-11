<style>
    fieldset.scheduler-border {
         border: 1px groove #ddd !important;
         padding: 0 1.4em 0 1.4em !important;
         margin: 0 0 1.5em 0 !important;
         -webkit-box-shadow: 0px 0px 0px 0px #000;
         box-shadow: 0px 0px 0px 0px #000;
         margin-top: 15px !important;
         background:#d6dfe799;
         }
         fieldset fieldset.scheduler-border {
         padding: 0.4rem 1.4em 1.4em 1.4em !important;
         }
         legend.scheduler-border {
         font-size: 1.2em !important;
         font-weight: bold !important;
         text-align: left !important;
         width: auto;
         padding: 0 10px;
         border-bottom: none;
         background-color: #006AA8;
        color: #eff8fe;
        border-radius:3px;
        }
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

        .btn-sm {
            line-height: 1.2rem;
        }
        .form-control {
            border: 1px solid #aaaaaa;
        }
        .form-group h6 {font-weight: bold;}
</style>
<div class="card card-default">
    <div class="card-body">
        @if(isset($form_type) && $form_type == 'create')
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">ऋण आबेदक</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="applicant_id"> आबेदक	</label> <span class="text-danger">*</span>
                        {!! Form::select('applicant_id', isset($data['applications'])?$data['applications']:[], (isset($data['applicant_id'])? $data['applicant_id'] : null),
                            ['class' => 'form-control select_to  applicant_id', 'required'=>'required' ]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group pt-4">
                    <a id="fill" class="btn btn-info btn-sm fill"> Select</a>
                    <a href="{{ route('admin.credit_analysis.create') }}" class="btn btn-warning btn-sm reset"> Reset</a>
                    </div>
                </div>
            </div>
        </fieldset>
        @endif
        @if(isset($data['applicant_id']) || isset($data['row']))
        <fieldset class="scheduler-border">
            <legend class="scheduler-border"> ऋण आबेदकको बिबरण </legend>
            <input type="hidden" name="application_id" value="{{ isset($data['row']['application_id'])?$data['row']['application_id']:(isset($data['rawApplicant'])? $data['rawApplicant']['application_id'] : null) }}">
            <div class="form-row form-group">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="{{ config('custom.office_fields.name_np.key') }}"> {{ config('custom.office_fields.name_np.name_np') }}	</label> 
                        <h6>
                            {{ isset($data['row'][config('custom.office_fields.name_np.key')])?$data['row'][config('custom.office_fields.name_np.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('custom.office_fields.name_np.key')] : null) }}
                        </h6>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="{{ config('fields.applicant_details.borrower_name.key') }}"> {{ config('fields.applicant_details.borrower_name.name_np') }}	</label> 
                        <h6>
                            @if(isset($data['row']))
                            <a target="_blank" href="{{ route('admin.application.edit', ['application' =>  $data['row']->application_id , 'form-name'=>'review']) }}">{{ isset($data['row'][config('fields.applicant_details.borrower_name.key')])?$data['row'][config('fields.applicant_details.borrower_name.key')]:(isset($data['rawApplicant'][config('fields.applicant_details.borrower_name.key')])? $data['rawApplicant'][config('fields.applicant_details.borrower_name.key')] : null) }}</a>
                            @elseif(isset($data['applicant_id']))
                            <a target="_blank" href="{{ route('admin.application.edit', ['application' =>  $data['applicant_id'] , 'form-name'=>'review']) }}">{{ isset($data['row'][config('fields.applicant_details.borrower_name.key')])?$data['row'][config('fields.applicant_details.borrower_name.key')]:(isset($data['rawApplicant'][config('fields.applicant_details.borrower_name.key')])? $data['rawApplicant'][config('fields.applicant_details.borrower_name.key')] : null) }}</a>
                            @endif
                        </h6>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="{{ config('fields.loan_details.loan_title.key') }}"> {{ config('fields.loan_details.loan_title.name_np') }}	</label>
                        <h6>
                            {{ isset($data['row'][config('fields.loan_details.loan_title.key')])?$data['row'][config('fields.loan_details.loan_title.key')]:(isset($data['rawApplicant'][config('fields.loan_details.loan_title.key')])? $data['rawApplicant'][config('fields.loan_details.loan_title.key')] : null) }}
                        </h6>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="{{ config('fields.loan_details.subscription_id.key') }}"> {{ config('fields.loan_details.subscription_id.name_np') }}	</label>
                        <h6>
                            {{ isset($data['row'][config('fields.loan_details.subscription_id.key')])?$data['row'][config('fields.loan_details.subscription_id.key')]:(isset($data['rawApplicant'][config('fields.loan_details.subscription_id.key')])? $data['rawApplicant'][config('fields.loan_details.subscription_id.key')] : null) }}
                        </h6>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach(config('credit_analysis') as $title => $analysis_option)
            <div class="col-md-6">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{$analysis_option['name_np'] }} ({{$analysis_option['name_en'] }} = {{$analysis_option['full_marks'] }})</legend>
                    <div>
                        <table class="">
                            <thead>
                                <tr>
                                    <td>क्षेत्र</td>
                                    <td>अंक</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i =1 @endphp
                                @foreach($analysis_option['fields'] as $name => $field)
                                <tr>
                                    <td style="width:80%">{{ $field['name_np'] }} {!! $field['required']==True? '<i class="text-danger">*</i>' : ''!!}</td>
                                    <td>
                                        @if(isset($field['option']) && $field['option'])
                                        @php 
                                            $options =[];
                                            $options[0] = 'छान्नुहोस् (0)';
                                            foreach( $field['option'] as $key => $option)
                                            $options[$key] = $option ."(".$key.")";
                                        @endphp
                                            {!! Form::select($name ,$options, null,
                                        ['class' => 'form-control form-control-sm '.$title, 'required'=>$field['required']==True? 'required' : false ]) !!}
                                        @else
                                            {!! Form::text($name, null, ['class' => 'form-control form-control-sm font-weight-bold text-success total total_'.$title, 'required'=>'required','readonly'=>'readonly' ]) !!}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
            @endforeach
            <div class="col-md-6">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">जम्मा</legend>
                    <div>
                        <table class="">
                            <thead>
                                <tr>
                                    <td>कुल पुर्णाङक १००, प्राप्ताङक :</td>
                                    <td>
                                        {!! Form::text('grand_total', null, ['class' => 'form-control form-control-sm font-weight-bold text-success grand_total', 'required'=>'required','readonly'=>'readonly' ]) !!}
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
        </fieldset>
        <div class="row">
            <div class="col-md-6">
                <button type="submit" name="submit"  class="btn btn-sm btn-success"> {{ $button }} </button>
                <a type="button" href="{{ route($base_route.'.index') }}"
                   class="btn btn-sm btn-danger row-edit">
                     Cancel
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@section('post_scripts')
<script type="text/javascript">
$(document).ready(function () {
    $('.select2').select2();
    $('.select_to').select2();

    $('body').on('click', '#fill', function () {
            s_id = $('.applicant_id').val();
            var url = '{{ route('admin.credit_analysis.create') }}';

            if (s_id) {
                url = url + '?applicant_id=' + s_id;
            }
            location.href = url;
        });
        var analysis_option = ['capacity', 'character', 'collateral', 'capital_status', 'condition']
        analysis_option.forEach(
            function(analysis){
                $('.'+analysis).change(function () {
                var selected =  $("."+analysis+" > option:selected").map(function(){ return this.value }).get();
                sum = 0;
                selected.forEach(function(num){sum+=parseFloat(num) || 0;});

                $('.total_'+analysis).val(sum);
                $('.view_'+analysis).html('<h6>'+sum+'</h6>');

                var totals =  $(".total").map(function(){ return this.value }).get();
                grand_sum = 0;
                totals.forEach(function(total){grand_sum+=parseFloat(total) || 0;});

                $('.grand_total').val(grand_sum);
                $('.view_grand_total').html(grand_sum);

                });
            }
        );
        
});
</script>
@endsection