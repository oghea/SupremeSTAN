<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--tandanya bisa-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SupremeSTAN') }}</title>
    {{--bootstrap minified--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- vendor -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
    <link rel="stylesheet" href="/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="/vendors/normalize-css/normalize.css">
    <link rel="stylesheet" href="/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendors/flipclock/compiled/flipclock.css"/>
    {{--our css--}}
    <link rel="stylesheet" href="/css/custom.min.css">
    <link rel="stylesheet" href="/css/supreme.css">
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
                @if(\Route::current()->getName() == 'tryoutUser.doTPA' || \Route::current()->getName() == 'tryoutUser.doTBI' || \Route::current()->getName() == 'tryoutUser.doTKD' )
                    @include('partials.tryout-topnav')
                    @include('partials.kosong')
                @else
                    @include('partials.topnav')
                    @include('partials.sidebar')
                @endif
            @else
                @include('partials.notVerified')
            @endif
            @if(\Route::current()->getName() == 'tryoutUser.doUSM' || \Route::current()->getName() == 'tryoutUser.doTKD' )
                @yield('content')
            @else
                <div class="right_col" role="main">
                    @yield('content')
                </div>
            @endif
            @if(\Route::current()->getName() == 'tryoutUser.doUSM' || \Route::current()->getName() == 'tryoutUser.doTKD' )
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

