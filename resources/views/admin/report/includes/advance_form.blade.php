<fieldset>
    <legend><small>Filter Options</small></legend>
    <div class="form-group form-row">
        {{-- <div class="col-md-2 col-sm-2">
            <label>सहकारी</label>
            {!! Form::select('filter_head_office',isset($data['head_office']) ? $data['head_office'] : [], isset($data['request']['filter_head_office'])?$data['request']['filter_head_office']:null, ['class' => 'form-control form-control-sm']) !!}
        </div>
        <div class="col-md-2 col-sm-2">
            <label>शाखा</label>
            {!! Form::select('filter_branch_office',isset($data['branch_office']) ? $data['branch_office'] : [], isset($data['request']['filter_branch_office'])?$data['request']['filter_branch_office']:null, ['class' => 'form-control form-control-sm']) !!}
        </div> --}}
        <div class="col-md-2 col-sm-2">
            <label>धितो किसिम</label>
            {!! Form::select('filter_loan_type',isset($data['loan_types']) ? $data['loan_types'] : [], isset($data['request']['filter_loan_type'])?$data['request']['filter_loan_type']:null, ['class' => 'form-control form-control-sm']) !!}
        </div>
        <div class="col-md-6 col-sm-6">
            
            <label>ऋण स्वीकृत मिति देखी - सम्म </label>
            <div class="input-group">
                {!! Form::text('registered_at_from_bs', isset($data['request']['registered_at_from_bs'])?$data['request']['registered_at_from_bs']:null, ['class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD', 'id' => 'registered_at_from_bs']) !!}
                {!! Form::text('registered_at_from', isset($data['request']['registered_at_from']) ? $data['request']['registered_at_from'] : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'registered_at_from']) !!}
                <span class="input-group-btn">
                    <button class="btn  btn-sm btn-danger" type="button" id="registered_at_from_clear"><i class="fi fi-close"></i></button>
                </span>
                &nbsp;
                {!! Form::text('registered_at_to_bs', isset($data['request']['registered_at_to_bs'])?$data['request']['registered_at_to_bs']:null, ['class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD', 'id' => 'registered_at_to_bs']) !!}
                {!! Form::text('registered_at_to', isset($data['request']['registered_at_to']) ? $data['request']['registered_at_to'] : null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'registered_at_to']) !!}
                <span class="input-group-btn">
                    <button class="btn  btn-sm btn-danger" type="button" id="registered_at_to_clear"><i class="fi fi-close"></i></button>
                </span>
            </div>
        </div>
    </div>
</fieldset>
<br>
<fieldset>
    <legend><small>Column to Display</small></legend>
        <div class="form-group form-row ">
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['subscription_id']) )
                        {!! Form::checkbox('subscription_id', null) !!}
                    @else
                        {!! Form::checkbox('subscription_id', null, $data['request']['subscription_id'] =='on'?'True':'') !!}
                    @endif
                    <i></i>सदस्यता नं
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['borrower_name']) )
                        {!! Form::checkbox('borrower_name', null) !!}
                    @else
                        {!! Form::checkbox('borrower_name', null, $data['request']['borrower_name'] =='on'?'True':'') !!}
                    @endif
                    <i></i>ऋण लिने को पुरा नाम
                </label>
            </div>
            
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['borrower_name_en']) )
                        {!! Form::checkbox('borrower_name_en', null) !!}
                    @else
                        {!! Form::checkbox('borrower_name_en', null, $data['request']['borrower_name_en'] =='on'?'True':'') !!}
                    @endif
                    <i></i>ऋण लिने को पुरा नाम अंग्रेजी
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['subscription_date_bs']) )
                        {!! Form::checkbox('subscription_date_bs', null) !!}
                    @else
                        {!! Form::checkbox('subscription_date_bs', null, $data['request']['subscription_date_bs'] =='on'?'True':'') !!}
                    @endif
                    <i></i>सदस्य बनेको मिति
                </label>
            </div>

            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['borrower_gender']) )
                        {!! Form::checkbox('borrower_gender', null) !!}
                    @else
                        {!! Form::checkbox('borrower_gender', null, $data['request']['borrower_gender'] =='on'?'True':'') !!}
                    @endif
                    <i></i>लिंग
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['b_dob_bs']) )
                        {!! Form::checkbox('b_dob_bs', null) !!}
                    @else
                        {!! Form::checkbox('b_dob_bs', null, $data['request']['b_dob_bs'] =='on'?'True':'') !!}
                    @endif
                    <i></i>जन्म मिति
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['b_grand_father_name']) )
                        {!! Form::checkbox('b_grand_father_name', null) !!}
                    @else
                        {!! Form::checkbox('b_grand_father_name', null, $data['request']['b_grand_father_name'] =='on'?'True':'') !!}
                    @endif
                    <i></i>बाजे/ससुराको नाम
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['b_father_name']) )
                        {!! Form::checkbox('b_father_name', null) !!}
                    @else
                        {!! Form::checkbox('b_father_name', null, $data['request']['b_father_name'] =='on'?'True':'') !!}
                    @endif
                    <i></i>बाबु/पतिको नाम
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['b_marital_status']) )
                        {!! Form::checkbox('b_marital_status', null) !!}
                    @else
                        {!! Form::checkbox('b_marital_status', null, $data['request']['b_marital_status'] =='on'?'True':'') !!}
                    @endif
                    <i></i>वैवाहिक स्थिती
                </label>
            </div>
            
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['citizenship_number']) )
                        {!! Form::checkbox('citizenship_number', null) !!}
                    @else
                        {!! Form::checkbox('citizenship_number', null, $data['request']['citizenship_number'] =='on'?'True':'') !!}
                    @endif
                    <i></i>नागरिकता नं
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['citizenship_issue_date_bs']) )
                        {!! Form::checkbox('citizenship_issue_date_bs', null) !!}
                    @else
                        {!! Form::checkbox('citizenship_issue_date_bs', null, $data['request']['citizenship_issue_date_bs'] =='on'?'True':'') !!}
                    @endif
                    <i></i>नागरिकता जारी मिति
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['citizenship_issue_district']) )
                        {!! Form::checkbox('citizenship_issue_district', null) !!}
                    @else
                        {!! Form::checkbox('citizenship_issue_district', null, $data['request']['citizenship_issue_district'] =='on'?'True':'') !!}
                    @endif
                    <i></i>नागरिकता जारी जिल्ला 
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['b_caste_code']) )
                        {!! Form::checkbox('b_caste_code', null) !!}
                    @else
                        {!! Form::checkbox('b_caste_code', null, $data['request']['b_caste_code'] =='on'?'True':'') !!}
                    @endif
                    <i></i>जात 
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['address']) )
                        {!! Form::checkbox('address', null) !!}
                    @else
                        {!! Form::checkbox('address', null, $data['request']['address'] =='on'?'True':'') !!}
                    @endif
                    <i></i>ठेगाना 
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['share_certificate_number']) )
                        {!! Form::checkbox('share_certificate_number', null) !!}
                    @else
                        {!! Form::checkbox('share_certificate_number', null, $data['request']['share_certificate_number'] =='on'?'True':'') !!}
                    @endif
                    <i></i>शेयर प्रमाणपत्र नं  
                </label>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label class="form-checkbox form-checkbox-primary form-checkbox-bordered" style="margin-top:5px">
                    @if(!isset($data['request']['share_amount']) )
                        {!! Form::checkbox('share_amount', null) !!}
                    @else
                        {!! Form::checkbox('share_amount', null, $data['request']['share_amount'] =='on'?'True':'') !!}
                    @endif
                    <i></i>शेयर रकम 
                </label>
            </div>
            
        </div>
</fieldset>
<hr>
<fieldset>
    <div class="form-group form-row">
        <div class="col-md-4 col-sm-4">
            <div class="btn-group" style="margin-top:24px;">
                <button type="submit" class="btn  btn-info btn-sm" id="form-filter-btn" name="search" data-toggle="tooltip" title="Search">
                    <i class="fa fa-filter bigger-120"></i>Generate Report
                </button>
                <a href="{{ $route }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Reset">
                    <i class="fa fa-circle-o-notch bigger-120"></i>Reset
                </a>
            </div>
        </div>
    </div>
</fieldset>