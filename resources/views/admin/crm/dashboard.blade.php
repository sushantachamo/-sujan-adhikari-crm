@extends('admin.includes.layout')

@section('content')
<?php $site_info = ViewHelper::getSiteInfo();  ?>
<section class="rounded mb-3">
    <div class="col-md-3">
        <div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
            <div class="project-info clearfix">
                <div class="project-info-left">
                    <div class="icon box-shadow bg-light-purple text-white">
                        <i class="fa fa-podcast"></i>
                    </div>
                </div>
                <div class="project-info-right">
                    <span class="no text-light-purple weight-500 font-24">5.1 Lakhs</span>
                    <p class="weight-400 font-18">Pending Business</p>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
