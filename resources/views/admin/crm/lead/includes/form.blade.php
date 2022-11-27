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
    @if(!isset($data['row']))
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Select Customer</legend>
        <div class="form-row form-gorup">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="customer_name"> Customer Name	</label> <span class="text-danger">*</span>
                    {!! Form::select('application_id', isset($data)?$data:[], (isset($data)? $data : null),
                        ['class' => 'form-control select_to customer_details', 'id' => 'selectLeadCustomer']) !!}
                </div>
            </div>
        </div>
    </fieldset>
    @endif
    
    
    <div id="leadDetails" 
    @if(!isset($data['row']))
        style="display:none"      
    @endif
    >
        
        <!-- Customer details -->
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Customer Details</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Customer Name	</label>
                        {!! Form::text('customer-name', isset($data['row']->application->borrower_name) ? $data['row']->application->borrower_name : null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm ', 'id' => 'customerName', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Customer Name	English</label>
                        {!! Form::text('customer-name-en', isset($data['row']->application->borrower_name_en) ? $data['row']->application->borrower_name_en : null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required']:
                        ['class' => 'form-control form-control-sm', 'id' => 'customerNameEn', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Address</label>
                        {!! Form::text('address', isset($data['row']->application->b_t_tole) ? $data['row']->application->b_t_tole : null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'customerAddress', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Phone Number</label>
                        {!! Form::text('phone-number', isset($data['row']->application->contact_number) ? $data['row']->application->contact_number : null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'customerPhone', 'readonly']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Account Details -->
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Account Details</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Loan Account Number	</label> <span class="text-danger">*</span>
                        {!! Form::number('loan_account_number', isset($data['row']->loan_account_number) ? $data['row']->loan_account_number : null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Guaranteer Details 1 -->
        <fieldset class="scheduler-border" id="guaranteerDetails1" style="display:none">
            <legend class="scheduler-border">Guaranteer Details 1</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name	</label>
                        {!! Form::text('guaranteer-name', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerName1', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name	English</label>
                        {!! Form::text('guaranteer-name-en', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerNameEn1', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Address</label>
                        {!! Form::text('address', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerAddress1', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Phone Number</label>
                        {!! Form::text('phone-number', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerPhoneNumber1', 'readonly']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Guaranteer Details 2 -->
        <fieldset class="scheduler-border" id="guaranteerDetails2" style="display:none">
            <legend class="scheduler-border">Guaranteer Details 2</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name	</label>
                        {!! Form::text('guaranteer-name', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerName2', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name	English</label>
                        {!! Form::text('guaranteer-name-en', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerNameEn2', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Address</label>
                        {!! Form::text('address', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerAddress2', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Phone Number</label>
                        {!! Form::text('phone-number', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerPhoneNumber2', 'readonly']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Guaranteer Details 3 -->
        <fieldset class="scheduler-border" id="guaranteerDetails3" style="display:none">
            <legend class="scheduler-border">Guaranteer Details 3</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name	</label>
                        {!! Form::text('guaranteer-name', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerName3', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name	English</label>
                        {!! Form::text('guaranteer-name-en', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerNameEn3', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Address</label>
                        {!! Form::text('address', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerAddress3', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Phone Number</label>
                        {!! Form::text('phone-number', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerPhoneNumber3', 'readonly']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Guaranteer Details 4 -->
        <fieldset class="scheduler-border" id="guaranteerDetails4" style="display:none">
            <legend class="scheduler-border">Guaranteer Details 4</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name	</label>
                        {!! Form::text('guaranteer-name', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerName4', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name	English</label>
                        {!! Form::text('guaranteer-name-en', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerNameEn4', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Address</label>
                        {!! Form::text('address', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerAddress4', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Phone Number</label>
                        {!! Form::text('phone-number', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerPhoneNumber4', 'readonly']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Loan Details -->
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Loan Details</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Loan Amount	</label>
                        {!! Form::text('loan-amount', isset($data['row']->loanDetails->loan_amount) ? $data['row']->loanDetails->loan_amount : null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'loanAmount', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Installment Amount	</label>
                        {!! Form::text('installment-amount', isset($data['row']->loanDetails->payment_amount) ? $data['row']->loanDetails->payment_amount : null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'installmentAmount', 'readonly']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Others Details -->
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Others Details</legend>
            <div class="form-row form-gorup">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> FollowUp Date	</label> <span class="text-danger">*</span>
                        <div class="input-group">
                            {!! Form::text('follow_up_at_bs', isset($data['row']['registered_at_bs'])?$data['row']['registered_at_bs']:(isset($rawApplicant)? $rawApplicant['registered_at_bs'] : null), ['placeholder' => config('fields.loan_details.registered_at.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'registered_at_bs']) !!}
                            {!! Form::text('follow_up_at', isset($data['row']['registered_at']) ? $data['row']['registered_at']->format('Y-m-d') : (isset($rawApplicant['registered_at'])? $rawApplicant['registered_at']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'registered_at']) !!}
                            <span class="input-group-btn">
                                <button class="btn  btn-sm btn-danger" type="button" id="registered_at_clear"><i class="fi fi-close"></i></button>
                            </span>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suggestion_type"> Assign User</label> <span class="text-danger">*</span>
                        @if(!isset($data['row']))
                            {!! Form::select('user_id', isset($data['suggestion_types'])?$data['suggestion_types']:[], (isset($data['suggestion_type'])? $data['suggestion_type'] : null),
                            ['class' => 'form-control select_to ', 'id' => 'selectUser']) !!}
                        @else
                            {!! Form::select('user_id', isset($data['userDetails'])?$data['userDetails']:[], (isset($data['userDetails'])? $data['userDetails'] : null), ['class' => 'form-control select_to']) !!}
                        @endif
                        
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-sm btn-success"> {{ $button }} </button>
                <a type="button" href="{{ route($base_route.'.index') }}"
                class="btn btn-sm btn-danger row-edit">
                    Cancel
                </a>
            </div>
        </div>
    </div>


@section('post_scripts')

    <script type="text/javascript">

        $(document).ready(function () {

            $('.select2').select2();
            $('.select_to').select2();
            customDatePicker('registered_at');

            $('#selectLeadCustomer').on('change', function() {
                let lead_id = this.value;
                if(this.value === null || this.value === "") 
                {
                    document.getElementById('leadDetails').style.display = 'none';
                } else {
                    document.getElementById('leadDetails').style.display = 'block';
                    $.ajax(
                    {
                        url: "/admin/getApplicationDetailsById/"+lead_id,
                        type: "GET",
                        cache: false,
                        success: function (data)
                        {
                            console.log(data);
                            $('#customerName').val(data.customerDetails.borrower_name);
                            $('#customerNameEn').val(data.customerDetails.borrower_name_en);
                            $('#customerAddress').val(data.customerDetails.b_p_localgovt);
                            $('#customerPhone').val(data.customerDetails.contact_number);

                            $('#loanAmount').val(data.loanDetails.loan_amount);
                            $('#installmentAmount').val(data.loanDetails.payment_amount);  

                            if(data.guarantorDetails) {
                                if(data.guarantorDetails.guarantor1_name) {
                                    document.getElementById('guaranteerDetails1').style.display = "";
                                    $('#guaranteerName1').val(data.guarantorDetails.guarantor1_name);
                                    $('#guaranteerNameEn1').val(data.guarantorDetails.guarantor1_name);
                                    $('#guaranteerAddress1').val(data.guarantorDetails.g1_former_address);
                                    $('#guaranteerPhoneNumber1').val(data.guarantorDetails.guarantor1_contact_number);
                                }else {
                                    document.getElementById('guaranteerDetails1').style.display = "none";
                                }
                                if(data.guarantorDetails.guarantor2_name) {
                                    document.getElementById('guaranteerDetails2').style.display = "";
                                    $('#guaranteerName2').val(data.guarantorDetails.guarantor2_name);
                                    $('#guaranteerNameEn2').val(data.guarantorDetails.guarantor2_name);
                                    $('#guaranteerAddress2').val(data.guarantorDetails.g2_former_address);
                                    $('#guaranteerPhoneNumber2').val(data.guarantorDetails.guarantor2_contact_number);
                                } else {
                                    document.getElementById('guaranteerDetails2').style.display = "none";
                                }

                                if(data.guarantorDetails.guarantor3_name) {
                                    document.getElementById('guaranteerDetails1').style.display = "";
                                    $('#guaranteerName3').val(data.guarantorDetails.guarantor3_name);
                                    $('#guaranteerNameEn3').val(data.guarantorDetails.guarantor3_name);
                                    $('#guaranteerAddress3').val(data.guarantorDetails.g3_former_address);
                                    $('#guaranteerPhoneNumber3').val(data.guarantorDetails.guarantor3_contact_number);
                                } else {
                                    document.getElementById('guaranteerDetails3').style.display = "none";
                                }

                                if(data.guarantorDetails.guarantor4_name) {
                                    document.getElementById('guaranteerDetails1').style.display = "";
                                    $('#guaranteerName4').val(data.guarantorDetails.guarantor4_name);
                                    $('#guaranteerNameEn4').val(data.guarantorDetails.guarantor4_name);
                                    $('#guaranteerAddress4').val(data.guarantorDetails.g4_former_address);
                                    $('#guaranteerPhoneNumber4').val(data.guarantorDetails.guarantor4_contact_number);
                                } else {
                                    document.getElementById('guaranteerDetails4').style.display = "none";
                                }
                            }
                            if(data.userDetails) {
                                var select = document.getElementById('selectUser');
                                var opt = document.createElement('option');
                                opt.value = "all";
                                opt.innerHTML = "All";
                                select.appendChild(opt);
                                opt.value = "";
                                opt.innerHTML = "Select";
                                select.appendChild(opt);
                                for (var i = 0; i <= data.userDetails.length ; i++){
                                    var opt = document.createElement('option');
                                    opt.value = data.userDetails[i].id;
                                    opt.innerHTML = data.userDetails[i].name;
                                    select.appendChild(opt);
                                }
                            }

                        },
                        error: function(error) 
                        {
                            console.log(error);
                        }
                    });
                }
                
                


            });


        });

    </script>
@endsection


