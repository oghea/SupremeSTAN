<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SupremeSTAN') }}</title>
    {{--bootstrap minified--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
    <link rel="stylesheet" href="/css/bootstrap-datepicker3.min.css">
    {{--our css--}}
    <link rel="stylesheet" href="/vendor/normalize-css/normalize.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/supreme.css">
    <link rel="stylesheet" href="/css/custom.min.css">
    <!-- NProgress -->
    <link href="/vendor/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendor/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendor/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">--}}
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}
</head>
{{--{{ Request::path('/login') ? ' class="background-login"' : null }}--}}
<body id="app-layout @if(Route::is('login') || str_contains(Request::fullUrl(), 'register')|| str_contains(Request::fullUrl(), 'password/reset')) background-login @endif" class="nav-md">

{{--Header--}}
@if(\Route::current()->getName() == 'login')
    @include('partials.kosong')
    <section>
        <div class="container">
            <div class="row profile">
                @yield('content')
            </div>
        </div>
    </section>
@elseif(str_contains(Request::fullUrl(), 'register') || str_contains(Request::fullUrl(), 'password/reset'))
    @include('partials.kosong')
    <section>
        <div class="container">
            <div class="row profile">
                @yield('content')
            </div>
        </div>
    </section>
@else
    <div class="container body">
        <div class="main_container">
            @if(Auth::user()->hasRole('owner','superadmin','curriculum','finance','admin_account','admin_content'))
                @include('partials.sidebar-admin')
            @else
                @include('partials.sidebar')
            @endif
            @include('partials.topnav')
            <div class="right_col" role="main">
                @yield('content')
            </div>
            @include('partials.footer')
        </div>
    </div>
@endif
<!-- JavaScripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/vendor/tinymce/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
<script src="/vendor/tinymce/tinymce/tinymce.min.js"></script>
<script src="/js/progress.js"></script>
<!-- FastClick -->
<script src="/vendor/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/vendor/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="/vendor/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="/vendor/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="/vendor/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="/vendor/skycons/skycons.js"></script>
<!-- Flot -->
<script src="/vendor/Flot/jquery.flot.js"></script>
<script src="/vendor/Flot/jquery.flot.pie.js"></script>
<script src="/vendor/Flot/jquery.flot.time.js"></script>
<script src="/vendor/Flot/jquery.flot.stack.js"></script>
<script src="/vendor/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="/vendor/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="/vendor/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="/vendor/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="/vendor/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="/vendor/jqvmap/dist/jquery.vmap.js"></script>
<script src="/vendor/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="/vendor/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- jQuery Smart Wizard -->
<script src="/vendor/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="/js/moment/moment.min.js"></script>
<script src="/js/custom.min.js"></script>
</body>
</html>

