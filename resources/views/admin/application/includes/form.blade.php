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
         .form_row_margin_bottom{
         margin-bottom: -20px;
         margin-top: -10px;
         }
         label{
             font-weight: 800;
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
        .select2-container {
            width: 100% !important;
        }

        .btn-sm {
            line-height: 1.2rem;
        }
        .form-control {
            border: 1px solid #aaaaaa;
        }
        ::-webkit-scrollbar {
        width: 5px;
        }
        .nepali-date-picker {
            font-size: 1rem;
        }
        .nepali-date-picker .drop-down-content {
            padding: 5px 0px 5px 5px;

        }
        .drop-down-content li {
            text-align: center;
        }
        .nav-tabs .nav-link{
            background:#006AA8;
            color: aliceblue;
            font-size: 17px !important;
            font-weight: 800 !important;
            border-color: aliceblue !important;
        }
        .nav-tabs .nav-link.active {
            background:#006AA8;
            color: aliceblue;
            
            border-color: aliceblue !important;
        }

        .inactive{
            color: #214c73 !important;
            background-color: #fc905bad !important;
            border-color: aliceblue !important;
            font-size: 17px !important;
            font-weight: 800 !important;
        }
        legend a{ color:white;}
        
        .select2-selection--multiple{
            overflow: hidden !important;
            height: auto !important;
        }
</style>

<div class="tap-box">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach(config('custom.form_tabs') as $key=>$name)
        @php $percentage = 100/count(config('custom.form_tabs')); @endphp
        <li class="nav-item" style="width:{{$percentage}}%; text-align:center;">
            @if( isset($form_type) && $form_type == 'create' && $data['requests']['form-name']!== $key && $key!=='applicant_details')
                <a class="nav-link disabled inactive" id="tab"  href="#" role="tab" aria-controls="#" aria-selected="true">
                    {{ $name }}
                </a>
            @else
            <a class="nav-link {{ $data['requests']['form-name']==$key ? 'active' : ''}} " id="{{$key}}-tab"  href="{{ isset($data['row'])? route($base_route.'.edit', ['application' =>  $data['row']->application_id, 'form-name'=>$key]) : '#' }}" role="tab" aria-controls="{{$key}}" aria-selected="true">
                <strong> {{ $name }} 
                    @if($key == 'collateral_details' && isset($data['row']) && $data['row']->subscription_id == null)
                        <i class="fi fi-round-question-full text-danger"></i>
                    @endif
                    @if($key == 'loan_details' && isset($data['row']) && $data['row']->loan_amount == null)
                        <i class="fi fi-round-question-full text-danger"></i>
                    @endif
                    @if($key == 'guarantor_details' && isset($data['row']) && $data['row']->guarantor1_name == null)
                        <i class="fi fi-round-question-full text-danger"></i>
                    @endif
                    @if($key == 'sanchi_details' && isset($data['row']) && $data['row']->sanchi1_name == null)
                        <i class="fi fi-round-question-full text-danger"></i>
                    @endif
                    @if($key == 'other_details' && isset($data['row']) && $data['row']->tamsuk_writer == null)
                        <i class="fi fi-round-question-full text-danger"></i>
                    @endif
                    @if($key == 'review' && isset($data['row']) && $data['row']->approved_by == null)
                        <i class="fi fi-round-question-full text-danger"></i>
                    @endif
                </strong>
            </a>
            @endif
        </li>
        @endforeach
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active">
            <div class="p--15">
                @include('admin.application.forms.'.$data['requests']['form-name'])
            </div>
        </div>
    </div>
</div>
@if($data['requests']['form-name']!='review')
<div class="container my-3 bg-light">
    <div class="col-md-12 text-center">
        <button type="submit" name="submit" class="btn btn-sm btn-success"> {{ $button }} </button>
        <a type="button" href="{{ route($base_route.'.index') }}"
            class="btn btn-sm btn-danger row-edit">
                Cancel
            </a>
    </div>
</div>  
@endif
@include('admin.application.includes.reviews.imagemodel')
@include('admin.application.includes.reviews.pdfmodel')
@section('post_scripts')

    <script type="text/javascript">
    $(document).ready(function () {



        $("#total_loan_amount").keyup(function (event) {
            amoutToWord('total_loan_amount', 'total_loan_amount_in_word');
        });
        $("#loan_amount").keyup(function (event) {
            amoutToWord('loan_amount', 'loan_amount_in_word');
        });


        
        $('.select2').select2();
        $('.select_to').select2();
            
            customDatePicker('b_dob');
            customDatePicker('loan_apply_date');
            customDatePicker('land_lander_dob');
            customDatePicker('citizenship_issue_date');
            customDatePicker('home_blocked_date');
            customDatePicker('loan_pass_date');
            customDatePicker('loan_pass_meeting_date');
            customDatePicker('guarantor1_dob');
            customDatePicker('guarantor2_dob');
            customDatePicker('guarantor3_dob');
            customDatePicker('guarantor4_dob');
            customDatePicker('business_register_date');
            customDatePicker('periodic_start_date');
            customDatePicker('periodic_end_date');
            customDatePicker('subscription_date');
            customDatePicker('land_lander_citizenship_issue_date');
            customDatePicker('g1_citizenship_issue_date');
            customDatePicker('g2_citizenship_issue_date');
            customDatePicker('g3_citizenship_issue_date');
            customDatePicker('g4_citizenship_issue_date');

            $('body').on('change', '.suggestion_type', function () {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.address.load-suggestion-row') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        suggestion_type: $(this).val(),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                    },
                    success: function (response) {
                        $('body').find('.suggestion_id').html(response.html);
                        $('.suggestion_id').select2('open');
                    }
                });

            });

            $('body').on('change', '.g1_suggestion_type', function () {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.address.load-suggestion-row') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        suggestion_type: $(this).val(),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                    },
                    success: function (response) {
                        $('body').find('.g1_suggestion_id').html(response.html);
                        $('.g1_suggestion_id').select2('open');
                    }
                });

            });

            $('body').on('change', '.g2_suggestion_type', function () {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.address.load-suggestion-row') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        suggestion_type: $(this).val(),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                    },
                    success: function (response) {
                        $('body').find('.g2_suggestion_id').html(response.html);
                        $('.g2_suggestion_id').select2('open');
                    }
                });

            });

            $('body').on('change', '.lander_suggestion_type', function () {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.address.load-suggestion-row') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        suggestion_type: $(this).val(),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                    },
                    success: function (response) {
                        $('body').find('.lander_suggestion_id').html(response.html);
                        $('.lander_suggestion_id').select2('open');
                    }
                });

            });

            $('body').on('change', '.b_p_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'b_p_district', 'b_p_localgovt');
                
            });

            $('body').on('change', '.b_p_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'b_p_localgovt');           
                
            });

            $('body').on('change', '.b_t_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'b_t_district', 'b_t_localgovt')

            });

            $('body').on('change', '.b_t_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'b_t_localgovt');
            });

            $('body').on('change', '.g1_p_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'g1_p_district', 'g1_p_localgovt')

            });

            $('body').on('change', '.g1_p_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'g1_p_localgovt');
            });

            $('body').on('change', '.g1_t_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'g1_t_district', 'g1_t_localgovt')

            });

            $('body').on('change', '.g1_t_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'g1_t_localgovt');
            });

            $('body').on('change', '.g2_p_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'g2_p_district', 'g2_p_localgovt')

            });

            $('body').on('change', '.g2_p_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'g2_p_localgovt');
            });

            $('body').on('change', '.g2_t_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'g2_t_district', 'g2_t_localgovt')

            });

            $('body').on('change', '.g2_t_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'g2_t_localgovt');
            });

            $('body').on('change', '.g3_p_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'g3_p_district', 'g3_p_localgovt')

            });

            $('body').on('change', '.g3_p_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'g3_p_localgovt');
            });

            $('body').on('change', '.g3_t_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'g3_t_district', 'g3_t_localgovt')

            });

            $('body').on('change', '.g3_t_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'g3_t_localgovt');
            });

            $('body').on('change', '.g4_p_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'g4_p_district', 'g4_p_localgovt')

            });

            $('body').on('change', '.g4_p_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'g4_p_localgovt');
            });

            $('body').on('change', '.g4_t_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'g4_t_district', 'g4_t_localgovt')

            });

            $('body').on('change', '.g4_t_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'g4_t_localgovt');
            });

            $('body').on('change', '.land_lander_p_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'land_lander_p_district', 'land_lander_p_localgovt')

            });

            $('body').on('change', '.land_lander_p_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'land_lander_p_localgovt');
            });

            $('body').on('change', '.land_lander_t_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'land_lander_t_district', 'land_lander_t_localgovt')

            });

            $('body').on('change', '.land_lander_t_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'land_lander_t_localgovt');
            });

            $('body').on('change', '.home_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'home_district', 'home_local_govt')

            });

            $('body').on('change', '.anshiyar1_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'anshiyar1_district', 'anshiyar1_localgovt')

            });

            $('body').on('change', '.anshiyar1_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'anshiyar1_localgovt');
            });

            $('body').on('change', '.anshiyar2_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'anshiyar2_district', 'anshiyar2_localgovt')

            });

            $('body').on('change', '.anshiyar2_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'anshiyar2_localgovt');
            });

            $('body').on('change', '.sanchi1_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'sanchi1_district', 'sanchi1_localgovt')

            });

            $('body').on('change', '.sanchi1_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'sanchi1_localgovt');
            });

            $('body').on('change', '.sanchi2_province', function (event, fill_data=false) {

                if(!fill_data)
                    getDistricts($(this).val(), 'sanchi2_district', 'sanchi2_localgovt')

            });

            $('body').on('change', '.sanchi2_district', function (event, fill_data=false) {

                if(!fill_data)
                    getLocaGovt($(this).val(), 'sanchi2_localgovt');
            });

            $(".select2tags").select2({
                tags: true,
                tokenSeparators: [',']
            })

            $('body').on('change', '#b_same_as_permanent', function () {
                if ($('#b_same_as_permanent').is(":checked"))
                {
                    $('#b_same_as_permanent_text').addClass('d-none');
                }
                else
                {
                    $('#b_same_as_permanent_text').removeClass('d-none');
                }
            });

            $('body').on('change', '#g1_same_as_permanent', function () {
                if ($('#g1_same_as_permanent').is(":checked"))
                {
                    $('#g1_same_as_permanent_text').addClass('d-none');
                }
                else
                {
                    $('#g1_same_as_permanent_text').removeClass('d-none');
                }
            });

            $('body').on('change', '#g2_same_as_permanent', function () {
                if ($('#g2_same_as_permanent').is(":checked"))
                {
                    $('#g2_same_as_permanent_text').addClass('d-none');
                }
                else
                {
                    $('#g2_same_as_permanent_text').removeClass('d-none');
                }
            });
            $('body').on('change', '#g3_same_as_permanent', function () {
                if ($('#g3_same_as_permanent').is(":checked"))
                {
                    $('#g3_same_as_permanent_text').addClass('d-none');
                }
                else
                {
                    $('#g3_same_as_permanent_text').removeClass('d-none');
                }
            });
            $('body').on('change', '#g4_same_as_permanent', function () {
                if ($('#g4_same_as_permanent').is(":checked"))
                {
                    $('#g4_same_as_permanent_text').addClass('d-none');
                }
                else
                {
                    $('#g4_same_as_permanent_text').removeClass('d-none');
                }
            });

            $('body').on('change', '#land_lander_same_as_permanent', function () {
                if ($('#land_lander_same_as_permanent').is(":checked"))
                {
                    $('#land_lander_same_as_permanent_text').addClass('d-none');
                }
                else
                {
                    $('#land_lander_same_as_permanent_text').removeClass('d-none');
                }
            });

            $('body').on('change', '#land_lander_same_as_borrower', function () {
                if ($('#land_lander_same_as_borrower').is(":checked"))
                {
                    $('#land_lander_same_as_borrower_div').addClass('d-none');
                }
                else
                {
                    $('#land_lander_same_as_borrower_div').removeClass('d-none');
                }
            });


            $('body').on('click', '#fill', function () {
                s_id = $('.suggestion_id').val();
                s_type = $('.suggestion_type').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.fill.application_fill') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        suggestion_type: s_type,
                        suggestion_id: s_id,
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                    },
                    success: function (response) {
                        $.each(response, function(i, item) {
                            if(i=='b_p_province' || i=='b_p_district' || i=='b_p_localgovt' || i=='b_t_province' || i=='b_t_district' || i=='b_t_localgovt')
                            {
                                // console.log('skip->'+i);
                            }
                            else if(i == 'b_daughter_name')
                            {
                                b_daughter_name = response.b_daughter_name;
                                var b_daughter_nameSplit = b_daughter_name.split(",");
                                for (var i = 0; i < b_daughter_nameSplit.length; i++) {
                                    var newOption = new Option(b_daughter_nameSplit[i], b_daughter_nameSplit[i], false, true);
                                    $('#b_daughter_name').append(newOption).trigger('change');
                                }
                            }
                            else if(i == 'b_son_name')
                            {
                                b_son_name = response.b_son_name;
                                var b_son_nameSplit = b_son_name.split(",");
                                for (var i = 0; i < b_son_nameSplit.length; i++) {
                                    var newOption = new Option(b_son_nameSplit[i], b_son_nameSplit[i], false, true);
                                    $('#b_son_name').append(newOption).trigger('change');
                                }
                            }
                            else{
                                $('#'+i).val(item);
                                if(i =='borrower_gender' || i =='b_edu_qualification' || i =='b_caste_code' || i =='b_marital_status' || i =='b_occupation' || i =='citizenship_issue_district' || i =='b_p_ward' || i =='b_t_ward')
                                {
                                    $("#"+i).trigger('change');
                                }
                            }
                        });
                        $('.b_p_province').val(response.b_p_province).trigger('change', true);
                        getDistricts(response.b_p_province, 'b_p_district', 'b_p_localgovt', response.b_p_district);
                        getLocaGovt(response.b_p_district, 'b_p_localgovt', response.b_p_localgovt)

                        $('.b_t_province').val(response.b_t_province).trigger('change', true);
                        getDistricts(response.b_t_province, 'b_t_district', 'b_t_localgovt', response.b_t_district);
                        getLocaGovt(response.b_t_district, 'b_t_localgovt', response.b_t_localgovt)
                    
                    }
                });

            });
            $('body').on('click', '#lander_fill', function () {

                s_id = $('.lander_suggestion_id').val();
                s_type = $('.lander_suggestion_type').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.fill.lander_fill') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        suggestion_type: s_type,
                        suggestion_id: s_id,
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                    },
                    success: function (response) {
                        $.each(response, function(i, item) {

                            // console.log(response);
                            if(i=='land_lander_p_province' || i=='land_lander_p_district' || i=='land_lander_p_localgovt' || i=='land_lander_t_province' || i=='land_lander_t_district' || i=='land_lander_t_localgovt')
                            {
                                // console.log('skip->'+i);
                            }
                            
                            else{
                                $('#'+i).val(item);
                                if(i =='land_lander_relation' ||  i =='land_lander_citizenship_issue_district' || i =='land_lander_p_ward' || i =='land_lander_t_ward')
                                {
                                    $("#"+i).trigger('change');
                                }
                            }
                        });
                        $('.land_lander_p_province').val(response.land_lander_p_province).trigger('change', true);
                        getDistricts(response.land_lander_p_province, 'land_lander_p_district', 'land_lander_p_localgovt', response.land_lander_p_district);
                        getLocaGovt(response.land_lander_p_district, 'land_lander_p_localgovt', response.land_lander_p_localgovt)

                        $('.land_lander_t_province').val(response.land_lander_t_province).trigger('change', true);
                        getDistricts(response.land_lander_t_province, 'land_lander_t_district', 'land_lander_t_localgovt', response.land_lander_t_district);
                        getLocaGovt(response.land_lander_t_district, 'land_lander_t_localgovt', response.land_lander_t_localgovt)
                    
                    }
                });

            });

            $('body').on('click', '#guaranter1_fill', function () {
                g1_id = $('.g1_suggestion_id').val();
                g1_suggestion_type = $('.g1_suggestion_type').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.fill.guaranter_fill') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        suggestion_type: g1_suggestion_type,
                        suggestion_id: g1_id,
                        gvalue : 1,
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                    },
                    success: function (response) {
                        // console.log(response);
                        $.each(response, function(i, item) {

                            if(i=='g1_p_province' || i=='g1_p_district' || i=='g1_p_localgovt' || i=='g1_t_province' || i=='g1_t_district' || i=='g1_t_localgovt')
                            {
                                // console.log('skip->'+i);
                            }
                            
                            else{
                                $('#'+i).val(item);
                                if(i =='g1_relation' ||  i =='g1_citizenship_issue_district' || i =='g1_p_ward' || i =='g1_t_ward')
                                {
                                    $("#"+i).trigger('change');
                                }
                            }
                        });
                        $('.g1_p_province').val(response.g1_p_province).trigger('change', true);
                        getDistricts(response.g1_p_province, 'g1_p_district', 'g1_p_localgovt', response.g1_p_district);
                        getLocaGovt(response.g1_p_district, 'g1_p_localgovt', response.g1_p_localgovt)

                        $('.g1_t_province').val(response.g1_t_province).trigger('change', true);
                        getDistricts(response.g1_t_province, 'g1_t_district', 'g1_t_localgovt', response.g1_t_district);
                        getLocaGovt(response.g1_t_district, 'g1_t_localgovt', response.g1_t_localgovt)
                    
                    }
                });
            });
            $('body').on('click', '#guaranter2_fill', function () {
                g2_id = $('.g2_suggestion_id').val();
                g2_suggestion_type = $('.g2_suggestion_type').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.fill.guaranter_fill') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        suggestion_type: g2_suggestion_type,
                        suggestion_id: g2_id,
                        gvalue : 2,
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                    },
                    success: function (response) {
                        $.each(response, function(i, item) {

                            if(i=='g2_p_province' || i=='g2_p_district' || i=='g2_p_localgovt' || i=='g2_t_province' || i=='g2_t_district' || i=='g2_t_localgovt')
                            {
                                // console.log('skip->'+i);
                            }
                            
                            else{
                                $('#'+i).val(item);
                                if(i =='g2_relation' ||  i =='g2_citizenship_issue_district' || i =='g2_p_ward' || i =='g2_t_ward')
                                {
                                    $("#"+i).trigger('change');
                                }
                            }
                        });
                        $('.g2_p_province').val(response.g2_p_province).trigger('change', true);
                        getDistricts(response.g2_p_province, 'g2_p_district', 'g2_p_localgovt', response.g2_p_district);
                        getLocaGovt(response.g2_p_district, 'g2_p_localgovt', response.g2_p_localgovt)

                        $('.g2_t_province').val(response.g2_t_province).trigger('change', true);
                        getDistricts(response.g2_t_province, 'g2_t_district', 'g2_t_localgovt', response.g2_t_district);
                        getLocaGovt(response.g2_t_district, 'g2_t_localgovt', response.g2_t_localgovt)
                    
                    }
                });
            });
            
            $('body').on('click', '#laghu_fill', function () {
                l_id = $('.laghu_suggestion_id').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.fill.laghu_fill') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        laghu_suggestion_id: l_id,
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                    },
                    success: function (response) {
                        $.each(response, function(i, item) {
                            $('#'+i).val(item);
                            if(i =='land_lander_relation' ||  i =='land_lander_citizenship_issue_district' || i =='land_lander_p_ward' || i =='land_lander_t_ward')
                            {
                                $("#"+i).trigger('change');
                            }
                            
                        });
                    }
                });

                });
           

            $('.calc').keyup(function () {
                    $monthly_income = parseInt($('#monthly_income').val());
                    $monthly_expenses = parseInt($('#monthly_expenses').val());
                    if($monthly_income  && $monthly_expenses )
                    {
                        $monthly_saving = $monthly_income - $monthly_expenses;
                        $('#monthly_saving').val($monthly_saving);
                    }
                    else{
                        $('#monthly_saving').val('');
                    }
            });


    });

    $(document).ready(function () {
        $('.confirm-file-button').on('click', function (event) {
            event.preventDefault();
            var id = $(this).attr('data-id');
            var filetype = $(this).attr('fileType');
            var filename = $(this).attr('fileName');
            console.log(filetype)
            Swal.fire({
                title: 'Do you want to delete?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                html: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '{{ route("admin.file.fileDelete") }}',
                        method: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            application_id: id,
                            file_type: filetype,
                            filename: filename,
                        },
                        success: function (response) {
                            location.reload();
                        }
                    });
                }
            })
        });

        $('img').on('click', function (e){
            e.preventDefault();
            classname = $(this).attr('class');
            if(classname == 'pdf-data')
            {
                src_data = $(this).attr('data');
                console.log(src_data)
                $('#modal-show-pdf iframe').attr('src', src_data); 
                $('#modal-show-pdf').modal('show'); 
            }
            else
            {
                src = $(this).attr('src');
                $('#modal_image').attr('src', src); 
                $('#modal-show-image').modal('show'); 
            }

        });

        $("#status").select2().on('change', function (e) {
            
            var status_code = $(this).val();
            console.log(status_code);

            messageGenerator(status_code);
        });

        function messageGenerator($status_code)
        {
            if($status_code == 'reviewed')
            {
                $message = 'यस आवेदन चेकजाँच गरी प्रमाणिकरणमा सिफारिस गरिएको छ।';
                $('textarea#msg').val($message); 
            }
            else if($status_code == 'hold')
            {
                $message = 'यस आवेदन चेकजाँच गर्दा केही कौफियत देखिएकोले केही समय रोकिएको छ।';
                $('textarea#msg').val($message);
            }
            else if($status_code == 'invalid')
            {
                $message = 'यस आवेदन चेकजाँच गर्दा अवैध देखिएकोले अस्वीकृत गरिएको छ।';
                $('textarea#msg').val($message);
            }
            else if($status_code == 'approved')
            {
                $message = 'यस आवेदन प्रमाणिकरण गरिएको छ।';
                $('textarea#msg').val($message);
            }
            else if($status_code == 'duplicate')
            {
                $message = 'यस आवेदन नक्कल देखिएकोले अस्वीकृत गरिएको छ।';
                $('textarea#msg').val($message);
            }
            else if($status_code == 'declined')
            {
                $message = 'यस आवेदन हाल लाई अस्वीकृत गरिएको छ।';
                $('textarea#msg').val($message);
            }
            else
            {
                $message = '';
                $('textarea#msg').val($message); 
            }
        }
});

</script>
@endsection
