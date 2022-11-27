<div class="col-md-12 p-2">
    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center> आबेदकको बिबरण </center></span>
</div>
<div class="col-md-12">
    <div class="row">
        <div class='col-md-5 t_border p-1'>
            <strong>आवेदकको पुरा नाम: </strong>{!! $data['row']['borrower_name']!!} ({!! $data['row']['borrower_name_en']!!} )
        </div>

        <div class='col-md-3 t_border p-1'>
            <strong>जन्ममिति: </strong>वि.सं. {!!ViewHelper::docsValueGenerator($data['row']['b_dob_bs'], 'string', false, 'np', false) !!}, (उमेर: {!! ViewHelper::docsValueGenerator($data['row']['b_age'], 'string', false, 'np', false) !!})
        </div>

        <div class='col-md-2 t_border p-1'>
            <strong>लिङ्ग: </strong>{!! ViewHelper::docsValueGenerator($data['row']['borrower_gender'], 'string', false, 'np', 'custom.gender') !!} 
        </div>

        <div class='col-md-2 t_border p-1'>
            <strong>सम्पर्क: </strong>{!! ViewHelper::docsValueGenerator($data['row']['contact_number'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>शौक्षिक योग्यता: </strong>{!! ViewHelper::docsValueGenerator($data['row']['b_edu_qualification'], 'string', false, 'np', 'custom.academic_levels') !!}
        </div>

        <div class="col-md-2 t_border p-1">
            <strong>वैवाहिक स्थिती: </strong>{!! ViewHelper::docsValueGenerator($data['row']['b_marital_status'], 'string', false, 'np', 'custom.marital_status') !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>जात: </strong>{!! ViewHelper::docsValueGenerator($data['row']['b_caste_code'], 'string', false, 'np', 'custom.caste_code') !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>पेशा / व्यवसाय: </strong>{!! ViewHelper::docsValueGenerator($data['row']['b_occupation'], 'string', false, 'np', 'custom.occupations') !!}
        </div>

        <div class="col-md-4 t_border p-1">
            <strong> पेशा / व्यवसायको नाम र स्थान: </strong>{!! ViewHelper::docsValueGenerator($data['row']['b_occupation_location'], 'string', false, 'np', false) !!}
        </div>   
        <div class="col-md-3 t_border p-1">
            <strong>बाजे/ससुराको नाम": </strong>{!! ViewHelper::docsValueGenerator($data['row']['b_grand_father_name'], 'string', false, 'np', false) !!}
        </div>

        <div class="col-md-3 t_border p-1">
            <strong>बाबु/पतिको नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['b_father_name'], 'string', false, 'np', false) !!}
        </div>

        <div class="col-md-3 t_border p-1">
            <strong>सासु/आमाको नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['b_mother_name'], 'string', false, 'np', false) !!}
        </div>

        <div class="col-md-3 t_border p-1">
            <strong>श्रीमान / श्रीमती को नाम:</strong>{!! ViewHelper::docsValueGenerator($data['row']['b_spouse_name'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-6 t_border p-1">
            <strong> छोरा(हरु)को नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['b_son_name'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-6 t_border p-1">
            <strong>छोरी(हरु)को नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['b_daughter_name'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-4 t_border p-1"><strong>स्थायी ठेगाना: </strong>{!! ViewHelper::getAddressString($data['row']['b_p_province'], $data['row']['b_p_district'], $data['row']['b_p_localgovt'], $data['row']['b_p_ward'], $data['row']['b_p_tole']) !!}</div>
        <div class="col-md-4 t_border p-1"><strong>अस्थायी ठेगाना: </strong>{!! ViewHelper::getAddressString($data['row']['b_t_province'], $data['row']['b_t_district'], $data['row']['b_t_localgovt'], $data['row']['b_t_ward'], $data['row']['b_t_tole']) !!}</div>
        <div class="col-md-4 t_border p-1"><strong>साबिक ठेगाना :</strong>{!! ViewHelper::docsValueGenerator($data['row']['citizenship_former_address'], 'string', false, 'np', false) !!}</div>
        <div class="col-md-4 t_border p-1"><strong>नागरिकता नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['citizenship_number'], 'string', false, 'np', false) !!}</div>
        <div class="col-md-4 t_border p-1"><strong>नागरिकता जारी मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['citizenship_issue_date_bs'], 'string', false, 'np', false) !!}</div>
        <div class="col-md-4 t_border p-1"><strong>नागरिकता जारी जिल्ला: </strong>{!! ViewHelper::docsValueGenerator($data['row']['citizenship_issue_district'], 'number', 'district', 'np', false) !!}</div>
    </div>
    <div class="row mt-1">
        <div class="col-md-2 t_border p-1">
            <strong>सदस्यता नं : </strong>{!! ViewHelper::docsValueGenerator($data['row']['subscription_id'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-3 t_border p-1">
            <strong>सदस्य बनेको मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['subscription_date_bs'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-3 t_border p-1">
            <strong>खाता नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['account_number'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>खातामा रहेको रकम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['account_balance'], 'string', false, 'np', 'custom.loan_types') !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>शेयर रकम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['share_amount'], 'string', false, 'np', false) !!}
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-2 t_border p-1">
            <strong>मासिक आम्दानी: </strong>{!! ViewHelper::docsValueGenerator($data['row']['monthly_income'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>मासिक खर्च: </strong>{!! ViewHelper::docsValueGenerator($data['row']['monthly_expenses'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>मासिक बचत: </strong>{!! ViewHelper::docsValueGenerator($data['row']['monthly_saving'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>धितो किसिम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['loan_type'], 'string', false, 'np', 'custom.loan_types') !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>ऋण आवेदन मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['loan_apply_date_bs'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>ऋण माग रकम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['loan_demand_amount'], 'string', false, 'np', false) !!}
        </div>
    </div>
</div>