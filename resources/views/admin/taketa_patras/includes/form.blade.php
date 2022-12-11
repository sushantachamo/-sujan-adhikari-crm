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
            <legend class="scheduler-border">ऋण आबेदकहरु</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="applicant_id"> आबेदक (आईडी)	</label> <span class="text-danger">*</span>
                        {!! Form::select('applicant_id', isset($data['applications'])?$data['applications']:[], (isset($data['applicant_id'])? $data['applicant_id'] : null),
                            ['class' => 'form-control select_to  applicant_id', 'required'=>'required' ]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group pt-4">
                    <a id="fill" class="btn btn-info btn-sm fill"> Select</a>
                    <a href="{{ route('admin.taketa_patras.create') }}" class="btn btn-warning btn-sm reset"> Reset</a>
                    </div>
                </div>
            </div>
        </fieldset>
        @endif
        @if(isset($data['applicant_id']) || isset($data['row']))
        <fieldset class="scheduler-border">
            <legend class="scheduler-border"> ऋण आबेदकको बिबरण </legend>

            
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
                            {{ isset($data['row'][config('fields.applicant_details.borrower_name.key')])?$data['row'][config('fields.applicant_details.borrower_name.key')]:(isset($data['rawApplicant'][config('fields.applicant_details.borrower_name.key')])? $data['rawApplicant'][config('fields.applicant_details.borrower_name.key')] : null) }}
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
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">ताकेता विवरण</legend>
                <div class="form-row form_row_margin_bottom">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="{{ config('taketa_patra_fields.taketa_patras.capital.key') }}"> {{ config('taketa_patra_fields.taketa_patras.capital.name_np') }}	</label> {!! config('taketa_patra_fields.taketa_patras.capital.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::number(config('taketa_patra_fields.taketa_patras.capital.key'), isset($data['row'][config('taketa_patra_fields.taketa_patras.capital.key')])?$data['row'][config('taketa_patra_fields.taketa_patras.capital.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('taketa_patra_fields.taketa_patras.capital.key')] : null), ['placeholder' => config('taketa_patra_fields.taketa_patras.capital.name_np'), 'class' => 'form-control form-control-sm calc', 'id' => config('taketa_patra_fields.taketa_patras.capital.key'), 'required'=>config('taketa_patra_fields.taketa_patras.capital.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="{{ config('taketa_patra_fields.taketa_patras.interest.key') }}"> {{ config('taketa_patra_fields.taketa_patras.interest.name_np') }}	</label> {!! config('taketa_patra_fields.taketa_patras.interest.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::number(config('taketa_patra_fields.taketa_patras.interest.key'), isset($data['row'][config('taketa_patra_fields.taketa_patras.interest.key')])?$data['row'][config('taketa_patra_fields.taketa_patras.interest.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('taketa_patra_fields.taketa_patras.interest.key')] : null), ['placeholder' => config('taketa_patra_fields.taketa_patras.interest.name_np'), 'class' => 'form-control form-control-sm calc', 'id' => config('taketa_patra_fields.taketa_patras.interest.key'), 'required'=>config('taketa_patra_fields.taketa_patras.interest.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="{{ config('taketa_patra_fields.taketa_patras.other.key') }}"> {{ config('taketa_patra_fields.taketa_patras.other.name_np') }}	</label> {!! config('taketa_patra_fields.taketa_patras.other.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::number(config('taketa_patra_fields.taketa_patras.other.key'), isset($data['row'][config('taketa_patra_fields.taketa_patras.other.key')])?$data['row'][config('taketa_patra_fields.taketa_patras.other.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('taketa_patra_fields.taketa_patras.other.key')] : null), ['placeholder' => config('taketa_patra_fields.taketa_patras.other.name_np'), 'class' => 'form-control form-control-sm calc', 'id' => config('taketa_patra_fields.taketa_patras.other.key'), 'required'=>config('taketa_patra_fields.taketa_patras.other.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="{{ config('taketa_patra_fields.taketa_patras.total.key') }}"> {{ config('taketa_patra_fields.taketa_patras.total.name_np') }}	</label> {!! config('taketa_patra_fields.taketa_patras.total.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::number(config('taketa_patra_fields.taketa_patras.total.key'), isset($data['row'][config('taketa_patra_fields.taketa_patras.total.key')])?$data['row'][config('taketa_patra_fields.taketa_patras.total.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('taketa_patra_fields.taketa_patras.total.key')] : null), ['placeholder' => config('taketa_patra_fields.taketa_patras.total.name_np'), 'class' => 'form-control form-control-sm total disabled', 'id' => config('taketa_patra_fields.taketa_patras.total.key'), 'required'=>config('taketa_patra_fields.taketa_patras.total.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="{{ config('taketa_patra_fields.taketa_patras.letter_type.key') }}"> {{ config('taketa_patra_fields.taketa_patras.letter_type.name_np') }}	</label> {!! config('taketa_patra_fields.taketa_patras.letter_type.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                            {!! Form::select(config('taketa_patra_fields.taketa_patras.letter_type.key'), isset($data['letter_type'])?$data['letter_type']:[], isset($data['row'][config('taketa_patra_fields.taketa_patras.letter_type.key')])?$data['row'][config('taketa_patra_fields.taketa_patras.letter_type.key')]:(isset($data['rawApplicant'])? $data['rawApplicant'][config('taketa_patra_fields.taketa_patras.letter_type.key')] : null), ['class' => 'form-control form-control-sm ', 'id' => config('taketa_patra_fields.taketa_patras.letter_type.key'), 'required'=>config('taketa_patra_fields.taketa_patras.letter_type.required')]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                        <div class="form-group">
                            <label for="">{{ config('taketa_patra_fields.taketa_patras.last_installment_date.name_np') }}</label>
                                <div class="input-group">
                                    {!! Form::text('last_installment_date_bs', isset($data['row']['last_installment_date_bs'])?$data['row']['last_installment_date_bs']:(isset($rawApplicant)? $rawApplicant['last_installment_date_bs'] : null), ['placeholder' => config('taketa_patra_fields.taketa_patras.last_installment_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'last_installment_date_bs']) !!}
                                    {!! Form::text('last_installment_date', isset($data['row']['last_installment_date']) ? $data['row']['last_installment_date']->format('Y-m-d') : (isset($rawApplicant['last_installment_date'])? $rawApplicant['last_installment_date']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'last_installment_date']) !!}
                                    <span class="input-group-btn">
                                        <button class="btn  btn-sm btn-danger" type="button" id="last_installment_date_clear"><i class="fi fi-close"></i></button>
                                    </span>
                                </div>
                        </div>
                    </div>
                </div>
            </fieldset>
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

    customDatePicker('last_installment_date')
    if($('.applicant_id').val() && $('#last_installment_date').val() !== '')
    {
        $to_date = $('#last_installment_date').val();
        $bs_date = NepaliFunctions.AD2BS(NepaliFunctions.ParseDate($to_date).parsedDate);
        $('#last_installment_date_bs').val(NepaliFunctions.ConvertDateFormat($bs_date), "YYYY-MM-DD");
    }
    
    $('body').on('click', '#fill', function () {
            s_id = $('.applicant_id').val();
            var url = '{{ route('admin.taketa_patras.create') }}';

            if (s_id) {
                url = url + '?applicant_id=' + s_id;
            }
            location.href = url;
        });


        $('.calc').keyup(function () {
                var grand =  $(".calc").map(function(){ return this.value }).get();
                grand_sum = 0;
                grand.forEach(function(total){grand_sum+=parseFloat(total) || 0;});

                $('.total').val(grand_sum);
        });

        

});
</script>
@endsection