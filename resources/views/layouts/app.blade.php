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
    <link rel="stylesheet" href="/css/custom.min.css">
    <link rel="stylesheet" href="/css/supreme.css">
    <!-- NProgress -->
    <link href="/vendor/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendor/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendor/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    {{--clock--}}
    <link href="/vendor/FlipClock/compiled/flipclock.css" rel="stylesheet"/>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">--}}
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}
</head>
{{--{{ Request::path('/login') ? ' class="background-login"' : null }}--}}
<body id="app-layout @if(Route::is('login') || str_contains(Request::fullUrl(), 'register')|| str_contains(Request::fullUrl(), 'password/reset')) background-login @endif" class="nav-md">

{{--Header--}}
@if(\Route::current()->getName() == 'login' || \Route::current()->getName() == 'user.notVerfied' || \Route::current()->getName() == 'user.banned')
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
            @if(Auth::user()->hasRole(['owner','superadmin','curriculum','finance','admin_account','admin_content']))
                @include('partials.sidebar-admin')
                @include('partials.topnav')
            @elseif(Auth::user()->hasRole(['bimbel_premium', 'bimbel_online', 'siswa_tryout', 'free_member']))
                @if(\Route::current()->getName() == 'tryout.doUSM' || \Route::current()->getName() == 'tryout.doTKD' )
                    @include('partials.tryout-topnav')
                    @include('partials.kosong')
                @else
                    @include('partials.topnav')
                    @include('partials.sidebar')
                @endif
            @else
                @include('partials.notVerified')
            @endif
            @if(\Route::current()->getName() == 'tryout.doUSM' || \Route::current()->getName() == 'tryout.doTKD' )
                @yield('content')
            @else
                <div class="right_col" role="main">
                    @yield('content')
                </div>
            @endif
            @if(\Route::current()->getName() == 'tryout.doUSM' || \Route::current()->getName() == 'tryout.doTKD' )
                @include('partials.tryout-footer')
            @else
                @include('partials.footer')
            @endif
        </div>
    </div>
@endif
@include('partials.js')
</body>
</html>

