<!doctype html>
<html lang="en-US">
<meta charset="utf-8">
@include('admin.includes.head')
<style>
    a{color:#1fcb64;}
    .btn-custom{background-color:#006AA8; color:#fff;}
    .bg-custom{background-color:#006AA8; color:#fff;}
</style>
<!--
    .boxed = boxed version
-->
<body class="layout-admin aside-sticky header-sticky" data-s2t-class="btn-primary btn-sm bg-gradient-default rounded-circle b-0">


<!-- WRAPPER -->
<div id="wrapper" class="d-flex align-items-stretch flex-column">

    <!-- 
        HEADER 
        
        .header-match-aside-primary
    -->
    @include('admin.includes.header')

    <!-- /HEADER -->

    <div id="wrapper_content" class="d-flex flex-fill">

        <!-- HEADER -->
        @include('admin.includes.sidebar')
        <!-- /HEADER -->

        <!--MIDDLE-->
        <div id="middle" class="flex-fill">
           @yield('content')
        </div>
        <!-- /MIDDLE -->
    </div>
    @include('admin.includes.footer')

</div>

<!-- JAVASCRIPT FILES -->
@include('admin.includes.scripts')
@yield('scripts')
<script type="text/javascript" src="{{ ViewHelper::getAssetPath('print_any_part/dist/jQuery.print.min.js','plugins') }}"></script>
<script type="text/javascript">
    $(function() {
        $("#printBtn").on('click', function() {
            $.print("#printable");
        });
        $(".thisweek").on('click', function() {
            document.getElementById('thisweek').style.display = "";
            document.getElementById('currentmonth').style.display = "none";
            document.getElementById('today').style.display = "none";
        });
        $(".currentmonth").on('click', function() {
            document.getElementById('currentmonth').style.display = "";
            document.getElementById('thisweek').style.display = "none";
            document.getElementById('today').style.display = "none";
        });
        $(".today").on('click', function() {
            document.getElementById('currentmonth').style.display = "none";
            document.getElementById('thisweek').style.display = "none";
            document.getElementById('today').style.display = "";
        });
    });
</script>
</body>
</html>