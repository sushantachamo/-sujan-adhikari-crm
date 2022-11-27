<div class="col-md-12 p-2">
    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center>ऋण विवरण </center></span>
    </div>
    <div class="col-md-12">
        <div class="row mt-1">
            <div class="col-sm-3 t_border p-1">
                <strong>स्वीकृत ऋण रकम : </strong>{!! ViewHelper::docsValueGenerator($data['row']['total_loan_amount'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-sm-6 t_border p-1">
                <strong>स्वीकृत ऋण रकम अक्षरुपि: </strong>{!! ViewHelper::docsValueGenerator($data['row']['total_loan_amount_in_word'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-sm-3 t_border p-1">
                <strong>ऋण रकम(लिएको): </strong>{!! ViewHelper::docsValueGenerator($data['row']['loan_amount'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-sm-4 t_border p-1">
                <strong>ऋण शिर्षक: </strong>{!! ViewHelper::docsValueGenerator($data['row']['loan_title'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-sm-4 t_border p-1">
                <strong>ऋण उद्देश्य: </strong>{!! ViewHelper::docsValueGenerator($data['row']['loan_purpose'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-sm-2 t_border p-1">
                <strong>व्याजदर: </strong>{!! ViewHelper::docsValueGenerator($data['row']['loan_interest_rate'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-sm-2 t_border p-1">
                <strong>अबधि: </strong>{!! ViewHelper::docsValueGenerator($data['row']['loan_period'], 'string', false, 'np', false) !!} {!! ViewHelper::docsValueGenerator($data['row']['loan_period_type'], 'string', false, 'np', 'custom.loan_period_types') !!}
            </div>
            <div class="col-sm-3 t_border p-1">
                <strong>समितिको वैठक मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['loan_pass_meeting_date_bs'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-sm-3 t_border p-1">
                <strong>ऋण स्वीकृत मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['loan_pass_date_bs'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-sm-3 t_border p-1">
                <strong>किस्ता भुक्तानी रकम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['payment_amount'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-sm-3 t_border p-1">
                <strong>किस्ता भुक्तानी तरिका: </strong>{!! ViewHelper::docsValueGenerator($data['row']['payment_type'], 'string', false, 'np', 'custom.payment_types') !!}
            </div>
        </div>
    </div>