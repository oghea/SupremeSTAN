<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('/')}}" class="site_title"><i class="fa fa-paw"></i><span>Supreme STAN!</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile-userpic">
                <img src="/storage/uploads/avatars/{{ Auth::user()->user_profile->avatar }}" class="img-responsive" alt="">
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    @if(Auth::user()->user_profile->first_name==null)
                    {{Auth::user()->name}}
                    @else
                    {{Auth::user()->user_profile->first_name}} {{Auth::user()->user_profile->last_name}}
                    @endif
                </div>
                @foreach($users->roles as $role)
                <div class="profile-usertitle-job">
                    {{$role->display_name}}
                </div>
                @endforeach
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{url('/home')}}"><i class="fa fa-home"></i>Overview</a></li>
                    <li><a href="{{url('/tryout')}}"><i class="fa fa-edit"></i>Tryout</a></li>
                    <li><a href="{{url('/profile')}}"><i class="fa fa-edit"></i>Info Profile</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-bar-chart-o"></i>Results</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-download"></i>Downloads</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-credit-card-alt"></i>Payments</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-graduation-cap"></i>Ranks</a></li>
                </ul>
            </div>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>



{{--<div class="col-md-3">--}}
    {{--<div class="profile-sidebar">--}}
        {{--<!-- SIDEBAR USERPIC -->--}}
        {{--<div class="profile-userpic">--}}
            {{--<img src="/storage/uploads/avatars/{{ Auth::user()->user_profile->avatar }}" class="img-responsive" alt="">--}}
        {{--</div>--}}
        {{--<!-- END SIDEBAR USERPIC -->--}}
        {{--<!-- SIDEBAR USER TITLE -->--}}
        {{--<div class="profile-usertitle">--}}
            {{--<div class="profile-usertitle-name">--}}
                {{--@if(Auth::user()->user_profile->first_name==null)--}}
                    {{--{{Auth::user()->name}}--}}
                {{--@else--}}
                    {{--{{Auth::user()->user_profile->first_name}} {{Auth::user()->user_profile->last_name}}--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--@foreach($users->roles as $role)--}}
                {{--<div class="profile-usertitle-job">--}}
                    {{--{{$role->display_name}}--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
        {{--<!-- END SIDEBAR USER TITLE -->--}}
        {{--<!-- SIDEBAR BUTTONS -->--}}
        {{--<div class="profile-userbuttons">--}}
            {{--<a href="#" class="btn btn-success btn-sm" role="button">Yuk Tryout</a>--}}
        {{--</div>--}}
        {{--<!-- END SIDEBAR BUTTONS -->--}}
        {{--<!-- SIDEBAR MENU -->--}}
        {{--<div class="profile-usermenu">--}}
            {{--<ul id="sidebar" class="nav">--}}
                {{--<li>--}}
                    {{--<a href="{{url('/home')}}">--}}
                        {{--<i class="glyphicon glyphicon-home"></i>--}}
                        {{--Overview </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ url('/profile') }}">--}}
                        {{--<i class="glyphicon glyphicon-info-sign"></i>--}}
                        {{--Info Profile </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="results.html">--}}
                        {{--<i class="glyphicon glyphicon-list-alt"></i>--}}
                        {{--Results </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="downloads.html">--}}
                        {{--<i class="glyphicon glyphicon-download"></i>--}}
                        {{--Downloads </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i class="glyphicon glyphicon-usd"></i>--}}
                        {{--Payments </a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<!-- END MENU -->--}}
    {{--</div>--}}
{{--</div>--}}