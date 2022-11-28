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
                        ['class' => 'form-control select_to customer_details', 'id' => 'selectCustomer']) !!}
                </div>
            </div>
        </div>
    </fieldset>
    @endif
    <input type="hidden" value="{{isset($data['row']->application_id) ? $data['row']->application_id: null}}" id="selectCustomer" name="application_id">
    
    <div id="leadDetails" 
    @if(!isset($data['row']))
        style="display:none"      
    @endif
    >
        <!-- Customer details -->
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Customer Details</legend>
            <div class="form-row form-gorup">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Customer Name	English</label>
                        {!! Form::text('customer-name-en', isset($data['row']) ? $data['row']->application->borrower_name: null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required']:
                        ['class' => 'form-control form-control-sm', 'id' => 'customerNameEn', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Task Type</label>
                        {!! Form::select('type', isset($taskType)?$taskType:[], (isset($taskType)? $taskType : null),
                            ['class' => 'form-control select_to ', 'id' => 'type']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Details</label>
                        {!! Form::text('details', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'details']) !!}
                    </div>
                </div>
            </div>
        </fieldset>

        <!-- Guaranteer Details 1 -->
        <fieldset class="scheduler-border" id="guaranteerDetails1" style="display:none">
            <legend class="scheduler-border">Guaranteer Details 1</legend>
            <div class="form-row form-gorup">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name	English</label>
                        {!! Form::text('guaranteer-name-en', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerNameEn1', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Task Type</label>
                        {!! Form::select('type1', isset($taskType)?$taskType:[], (isset($taskType)? $taskType : null),
                            ['class' => 'form-control select_to ', 'id' => 'type1']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Details</label>
                        {!! Form::text('details1', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'details1']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Guaranteer Details 2 -->
        <fieldset class="scheduler-border" id="guaranteerDetails2" style="display:none">
            <legend class="scheduler-border">Guaranteer Details 2</legend>
            <div class="form-row form-gorup">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name</label>
                        {!! Form::text('guaranteer-name-en2', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerNameEn2', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Task Type</label>
                        {!! Form::select('type2', isset($taskType)?$taskType:[], (isset($taskType)? $taskType : null),
                            ['class' => 'form-control select_to ', 'id' => 'type2']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Details</label>
                        {!! Form::text('details2', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'details2']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Guaranteer Details 3 -->
        <fieldset class="scheduler-border" id="guaranteerDetails3" style="display:none">
            <legend class="scheduler-border">Guaranteer Details 3</legend>
            <div class="form-row form-gorup">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name</label>
                        {!! Form::text('guaranteer-name-en3', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerNameEn3', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Task Type</label>
                        {!! Form::select('type3', isset($taskType)?$taskType:[], (isset($taskType)? $taskType : null),
                            ['class' => 'form-control select_to ', 'id' => 'type3']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Details</label>
                        {!! Form::text('details3', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'details3']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Guaranteer Details 4 -->
        <fieldset class="scheduler-border" id="guaranteerDetails4" style="display:none">
            <legend class="scheduler-border">Guaranteer Details 4</legend>
            <div class="form-row form-gorup">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Guaranteer Name</label>
                        {!! Form::text('guaranteer-name-en4', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required', 'readonly =>readonly'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'guaranteerNameEn4', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Task Type</label>
                        {!! Form::select('type4', isset($taskType)?$taskType:[], (isset($taskType)? $taskType : null),
                            ['class' => 'form-control select_to ', 'id' => 'type4']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Details</label>
                        {!! Form::text('details4', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'details4']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Description Details -->
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Description</legend>
            <div class="form-row form-gorup">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="suggestion_type"> Description</label>
                        {!! Form::text('description', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'description']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Dues Details -->
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Dues Details</legend>
            <div class="form-row form-gorup">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Number of Dues</label>
                        {!! Form::number('number_of_dues', isset($data['row']) ? $data['row']->number_of_dues: null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'number_of_dues']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Principal Amount	</label>
                        {!! Form::number('principal_amount', isset($data['row']) ? $data['row']->due_principal_amount: null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'principalAmount']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="suggestion_type"> Interest Amount</label>
                        {!! Form::number('interest_amount', isset($data['row']) ? $data['row']->due_interest_amount: null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'interestAmount']) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Others Details -->
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Others Details</legend>
            <div class="form-row form-gorup">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="suggestion_type"> Days</label>
                        {!! Form::number('days', null, ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'days']) !!}
                    </div>
                </div>
                <div class="col-md-3">
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
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Document</label>
                        <br>
                        {!! Form::file('document', null,  ('' == 'required') ?
                        ['class' => 'form-control form-control-sm', 'required' => 'required'] :
                        ['class' => 'form-control form-control-sm', 'id' => 'document']) !!}
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

            $('#selectCustomer').on('change', function() {
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
                            $('#customerNameEn').val(data.customerDetails.borrower_name_en);

                            if(data.guarantorDetails) {
                                if(data.guarantorDetails.guarantor1_name) {
                                    document.getElementById('guaranteerDetails1').style.display = "";
                                    $('#guaranteerNameEn1').val(data.guarantorDetails.guarantor1_name);
                                }else {
                                    document.getElementById('guaranteerDetails1').style.display = "none";
                                }
                                if(data.guarantorDetails.guarantor2_name) {
                                    document.getElementById('guaranteerDetails2').style.display = "";
                                    $('#guaranteerNameEn2').val(data.guarantorDetails.guarantor2_name);
                                } else {
                                    document.getElementById('guaranteerDetails2').style.display = "none";
                                }
                                console.log(data.guarantorDetails.guarantor3_name);
                                if(data.guarantorDetails.guarantor3_name) {
                                    document.getElementById('guaranteerDetails3').style.display = "";
                                    
                                    $('#guaranteerNameEn3').val(data.guarantorDetails.guarantor3_name);
                                } else {
                                    document.getElementById('guaranteerDetails3').style.display = "none";
                                }

                                if(data.guarantorDetails.guarantor4_name) {
                                    document.getElementById('guaranteerDetails4').style.display = "";
                                    $('#guaranteerNameEn4').val(data.guarantorDetails.guarantor4_name);
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

            $('#type').on('change', function() {
                let application_id = $('#selectCustomer').val();
                console.log(application_id);
                let type = $('#type').val();
                $('#details').val(null);
                if(type == 'phone') {
                    $.ajax({
                        url: '/admin/getApplicationDetailsById/' + application_id,
                        type: "GET",
                        cache: false,
                        success: function(data){
                            console.log(data);
                            $('#details').val(data.customerDetails.contact_number);
                        }
                    });
                }
            });

            $('#type1').on('change', function() {
                let application_id = $('#selectCustomer').val();
                let type = $('#type1').val();
                $('#details1').val(null);
                if(type == 'phone') {
                    $.ajax({
                        url: '/admin/getApplicationDetailsById/' + application_id,
                        type: "GET",
                        cache: false,
                        success: function(data){
                            $('#details1').val(data.guarantorDetails.guarantor1_contact_number);
                        }
                    });
                }
            });

            $('#type2').on('change', function() {
                let application_id = $('#selectCustomer').val();
                let type = $('#type2').val();
                $('#details2').val(null);
                if(type == 'phone') {
                    $.ajax({
                        url: '/admin/getApplicationDetailsById/' + application_id,
                        type: "GET",
                        cache: false,
                        success: function(data){
                            $('#details2').val(data.guarantorDetails.guarantor2_contact_number);
                        }
                    });
                }
            });

            $('#type3').on('change', function() {
                let application_id = $('#selectCustomer').val();
                let type = $('#type3').val();
                $('#details3').val(null);
                if(type == 'phone') {
                    $.ajax({
                        url: '/admin/getApplicationDetailsById/' + application_id,
                        type: "GET",
                        cache: false,
                        success: function(data){
                            $('#details3').val(data.guarantorDetails.guarantor3_contact_number);
                        }
                    });
                }
            });

            $('#type4').on('change', function() {
                let application_id = $('#selectCustomer').val();
                let type = $('#type4').val();
                $('#details4').val(null);
                if(type == 'phone') {
                    $.ajax({
                        url: '/admin/getApplicationDetailsById/' + application_id,
                        type: "GET",
                        cache: false,
                        success: function(data){
                            $('#details4').val(data.guarantorDetails.guarantor4_contact_number);
                        }
                    });
                }
            });


        });

    </script>
@endsection


