
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	{{-- <link rel="stylesheet" href="css/style.css"> --}}

    <link href="{{ asset('css/new.css') }}" rel="stylesheet">

	</head>
	<body>
        <div id="app" class="context">
            @yield('content')
            <div class="flex justify-center sm:items-center sm:justify-between">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class=" col-md-6 ml-4 text-center text-sm text-gray-500 sm:text-left sm:ml-0 bg-light">
                            SALES AND SUPPORT : <a href="https://akashdigital.com.np/" target="_blank">AAKASH DIGITAL</a> <br>
                            DEVELOPED BY: <a href="https://vtechnepal.com/" target="_blank">VIRTUAL TECHNOLOGY PVT.LTD. </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
        </div>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/new.js') }}" defer></script>
    </body>
</html>
