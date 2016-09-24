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
    {{--our css--}}
    <link rel="stylesheet" href="css/supreme.css">
    <link rel="stylesheet" href="css/normalize.css">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">--}}
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}
</head>
{{--{{ Request::path('/login') ? ' class="background-login"' : null }}--}}
<body id="app-layout @if(Route::is('login') || str_contains(Request::fullUrl(), 'register')|| str_contains(Request::fullUrl(), 'password/reset')) background-login @endif" >
@if(\Route::current()->getName() == 'login')
    @include('partials.kosong')
@elseif(str_contains(Request::fullUrl(), 'register') || str_contains(Request::fullUrl(), 'password/reset'))
    @include('partials.kosong')
@else
    @if(Auth::guest())
        @include('partials.header')
    @else
        @include('partials.header-auth')
    @endif
@endif
    <div class="container">
        @yield('content')
    </div>
@if(\Route::current()->getName() == 'login' || str_contains(Request::fullUrl(), 'register') || str_contains(Request::fullUrl(), 'password/reset'))
    @include('partials.kosong')
@else
    @include('partials.footer')
@endif
<!-- JavaScripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/progress.js"></script>
</body>
</html>

