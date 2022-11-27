<div class="col-md-12 p-2">
    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center>साक्षी {{ ViewHelper::convertNumberEnToNp($var) }}</center></span>
</div>
<div class="col-md-12">
    <div class="row mt-1">
        <div class="col-md-4 t_border p-1">
            <strong>साक्षीको नाम : </strong>{!! ViewHelper::docsValueGenerator($data['row']['sanchi'.$var.'_name'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-2 t_border p-1">
            <strong>उमेर: </strong>{!! ViewHelper::docsValueGenerator($data['row']['sanchi'.$var.'_age'], 'string', false, 'np', false) !!}
        </div>
        <div class="col-md-6 t_border p-1"><strong>ठेगाना: </strong>{!! ViewHelper::getAddressString($data['row']['sanchi'.$var.'_province'], $data['row']['sanchi'.$var.'_district'], $data['row']['sanchi'.$var.'_localgovt'], $data['row']['sanchi'.$var.'_ward'], $data['row']['sanchi'.$var.'_tole']) !!}</div>
    </div>
</div>