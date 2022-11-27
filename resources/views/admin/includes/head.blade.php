<head>
        <meta charset="UTF-8">
        <title>{{ config('app.name', 'VSDTC Gandaki') }}</title>
        
        <meta name="viewport" content="width=device-width, maximum-scale=5, initial-scale=1, user-scalable=0">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

        <!-- up to 10% speed up for external res -->
        <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <!-- preloading icon font is helping to speed up a little bit -->
        <link rel="preload" href="{{ asset('admin/assets/fonts/flaticon/Flaticon.woff2') }}" as="font" type="font/woff2" crossorigin>

        <!-- non block rendering : page speed : js = polyfill for old browsers missing `preload` -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/core.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/vendor_bundle.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
        <link rel="apple-touch-icon" href="demo.files/logo/icon_512x512.png">

        <link rel="manifest" href="{{ asset('admin/assets/images/manifest/manifest.json') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        {{-- <link rel="stylesheet" href="{{ asset('admin/assets/dist/nepaliDatePicker.min.css') }}"> --}}

        {{-- <link type="stylesheet" href="{{ ViewHelper::getAssetPath('nepali-datepicker/css/nepali.datepicker.v3.7.min.css','plugins') }}"> --}}
        <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v3.7.min.css" rel="stylesheet" type="text/css"/>
  

        <link type="stylesheet" href="{{ ViewHelper::getAssetPath('ckeditor/contents.css','plugins') }}">

        <link rel="stylesheet" href="{{ViewHelper::getAssetPath('Croppie-2.4.1/croppie.css','plugins') }}">
        <link href="{{ ViewHelper::getAssetPath('dropzone/css/dropzone.css','plugins') }}" rel="stylesheet" type="text/css"/>

        <meta name="theme-color" content="#377dff">
        <style>

            body.layout-admin #middle {
                /*padding: 30px 10px;*/
            }
            body.layout-admin #middle>.page-title {
                padding: 3px 23px;
                background-color: #fff;
                margin: -30px -30px 0px!important;
                border-top: 1px solid #e9ecef;
                z-index: 2;
            }
            body.layout-admin #middle section { font-size: 0.90rem !important }
            .btn > i {margin-right: 0px !important}

            @media only screen and (min-width: 992px){
                nav.navbar:not(.h-auto) {
                    min-height: 55px;
                }
            }

            .select2-container--default .select2-selection--multiple {
                border: 1px solid #dde4ea;
                border-radius: .2rem;
                height: 43px;
            }
             /* image add/edit image size*/
            .small-image {
                width: 85%;
            }
            .hidden 
            {
                display: none;
            }

            div.image-preview {
                position : relative;
                float: left;
            }
            a.removebtn {
                position: absolute;
                float: right;
                top: 0%;
                right: 15%;
            }
            a.delete_image_btn {
                  position: relative;
                  bottom:220px;
                  float: right;
                  right: 31px;
                }

                input[type="file"] {
                cursor: pointer;
            }
            button:focus {
                outline: 0;
            }

            .file-btn {
                position: relative;
            }
            .file-btn input[type="file"] {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
            }
            .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
                background-color: #fff;
                opacity: 1;
            }
            @media print {
                .no_print {display:none;}
                .letter { margin-top: -10px;}
                .letter-head {color:red;}
            }
            @media print {
                a[href]:after {
                    visibility: hidden !important;
                }
            }
        </style>
        @yield('scripts')

</head>