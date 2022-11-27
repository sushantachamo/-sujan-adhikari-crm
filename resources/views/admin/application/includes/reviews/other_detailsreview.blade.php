<div class="col-md-12 p-2">
    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center>अन्य </center></span>
    </div>
    <div class="col-md-12">
        <div class="row mt-1">
            <div class="col-md-4 t_border p-1">
                <strong>तमसुक लेखक : </strong>{!! ViewHelper::docsValueGenerator($data['row']['tamsuk_writer'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-md-4 t_border p-1">
                <strong>तमसुक जाँच गर्ने: </strong>{!! ViewHelper::docsValueGenerator($data['row']['tamsuk_approved_by'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-md-4 t_border p-1">
                <strong>सिफारिस कर्ता (चिनजानको गराउने): </strong>{!! ViewHelper::docsValueGenerator($data['row']['recommendator'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-md-3 t_border p-1">
                <strong>अन्य १: </strong>{!! ViewHelper::docsValueGenerator($data['row']['other1'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-md-3 t_border p-1">
                <strong>अन्य २: </strong>{!! ViewHelper::docsValueGenerator($data['row']['other2'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-md-3 t_border p-1">
                <strong>जाँच गर्ने व्यक्ति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['reviewed_by'], 'string', false, 'np', false) !!}
            </div>
            <div class="col-md-3 t_border p-1">
                <strong>प्रमाणित गर्ने व्यक्ति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['approved_by'], 'string', false, 'np', false) !!}
            </div>
        </div>
    </div>