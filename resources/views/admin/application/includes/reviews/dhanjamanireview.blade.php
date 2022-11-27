<div class="col-md-12 p-2">
    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center>धनजमानी {{ $var == 1 ? '(पारिवारिक)' : ViewHelper::convertNumberEnToNp($var)}}</center></span>
</div>
<div class="col-md-12">
    <div class="row mt-1">
        <div class="col-md-3 t_border p-1">
            <strong>धनजमानीको नाम : </strong>{!! ViewHelper::docsValueGenerator($data['row']['guarantor'.$var.'_name'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-3 t_border p-1">
            <strong>बाबु/पतिको नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['guarantor'.$var.'_father_name'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-3 t_border p-1">
            <strong>बाजे/ससुराको नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['guarantor'.$var.'_grand_father_name'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-3 t_border p-1">
            <strong>जन्ममिति: </strong>वि.सं. {!!ViewHelper::docsValueGenerator($data['row']['guarantor'.$var.'_dob_bs'], 'string', false, 'np', false) !!}, (उमेर: {!! ViewHelper::docsValueGenerator($data['row']['guarantor'.$var.'_age'], 'string', false, 'np', false) !!})
        </div>
        <div class="col-md-3 t_border p-1">
            <strong>श्रीमान / श्रीमती नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['guarantor'.$var.'_spouse_name'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-3 t_border p-1">
            <strong>सम्पर्क नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['guarantor'.$var.'_contact_number'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-3 t_border p-1">
            <strong>ऋण लिनेसँगको नाता: </strong>{!! ViewHelper::docsValueGenerator($data['row']['guarantor'.$var.'_relation'], 'string', false, 'np', 'custom.relations') !!} 
        </div>
        <div class="col-md-3 t_border p-1">
            <strong>सदस्यता नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['guarantor'.$var.'_subscription_id'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-4 t_border p-1"><strong>स्थायी ठेगाना: </strong>{!! ViewHelper::getAddressString($data['row']['g'.$var.'_p_province'], $data['row']['g'.$var.'_p_district'], $data['row']['g'.$var.'_p_localgovt'], $data['row']['g'.$var.'_p_ward'], $data['row']['g'.$var.'_p_tole']) !!}</div>
        <div class="col-md-4 t_border p-1"><strong>अस्थायी ठेगाना: </strong>{!! ViewHelper::getAddressString($data['row']['g'.$var.'_t_province'], $data['row']['g'.$var.'_t_district'], $data['row']['g'.$var.'_t_localgovt'], $data['row']['g'.$var.'_t_ward'], $data['row']['g'.$var.'_t_tole']) !!}</div>
        <div class="col-md-4 t_border p-1"><strong>साबिक ठेगाना :</strong>{!! ViewHelper::docsValueGenerator($data['row']['g'.$var.'_former_address'], 'string', false, 'np', false) !!}</div>
        <div class="col-md-4 t_border p-1"><strong>नागरिकता नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['g'.$var.'_citizenship_number'], 'string', false, 'np', false) !!}</div>
        <div class="col-md-4 t_border p-1"><strong>नागरिकता जारी मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['g'.$var.'_citizenship_issue_date_bs'], 'string', false, 'np', false) !!}</div>
        <div class="col-md-4 t_border p-1"><strong>नागरिकता जारी जिल्ला: </strong>{!! ViewHelper::docsValueGenerator($data['row']['g'.$var.'_citizenship_issue_district'], 'number', 'district', 'np', false) !!}</div>
    </div>
</div>