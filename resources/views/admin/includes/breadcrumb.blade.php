<div class="page-title bg-transparent b-0">

    <h1 class="h4  mb-0 px-3 font-weight-normal">
        {{ config('panels.panels.'.$panel.'.name_np') }}
    </h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-sublime fs--13 pb-2 px-3">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">ड्यासबोर्ड</a></li>
            @if(isset($from) && $from == 'site_config')
                <li class="breadcrumb-item"><a href="{{ route($base_route.'.edit') }}">{{ config('panels.panels.'.$panel.'.name_np') }}</a></li>
            @endif
            @if(!isset($from))
                <li class="breadcrumb-item"><a href="{{ route($base_route.'.index') }}">{{ config('panels.panels.'.$panel.'.name_np') }}</a></li>
            @endif

            @if(isset($view))
                <li class="breadcrumb-item">
                    <a href="{{ route($base_route.'.show', $org_id)}}">पुरा विवरण</a>
                </li>
            @endif

            <li class="breadcrumb-item active">{{ $page }}</li>
        </ol>
    </nav>

</div>
