@extends('admin.includes.layout')

@section('content')
<?php $site_info = ViewHelper::getSiteInfo();  ?>
<section class="rounded mb-3">
  	<div class="card card-default">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card overflow-hidden shadow-xs b-0">
                <div class="row no-gutters">
            
                    <div class="col-md-8 pr-3 pl-3">
            
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000">
            
                            <ol class="carousel-indicators">

                                @foreach($data['sliders'] as $slider)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $slider->rank }}" class="{{ $slider->rank == 1 ? 'active' : ''}}" ></li>
                                @endforeach

                                {{--                                 
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> --}}
                            </ol>
            
                            <div class="carousel-inner">
                                @foreach($data['sliders'] as $slider)
                                <div class="carousel-item {{ $slider->rank == 1 ? ' active ' : ''}}">
                                    <img src="{{asset('images/sliders/'.$slider->image)}}" class="d-block w-100" alt="{{ $slider->alt }}">
                                    <div class="carousel-caption" style="background:#0000004d;">
                                        <h4 class="animated fadeInUp text-white">{{ isset($slider->caption_title)? $slider->caption_title :'' }}</h3>
                                    </div>
                                </div>
                                @endforeach
                            </div>
            
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
            
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
            
                        </div>
                                            
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                {!! $site_info['general_info']['change_log'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</section>
@endsection
