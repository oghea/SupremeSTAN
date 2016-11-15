<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-home"></i><span>Supreme STAN!</span></a>
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
                <div class="profile-usertitle-name text-uppercase">
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
                <ul class="nav side-menu">
                    {{-- <li><a>Time Remaining: </a></li> --}}
                    <h3 style="margin-bottom:30px;">Time Remaining: </h3>
                    <div class="clock"></div>    
                </ul>
            </div>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>