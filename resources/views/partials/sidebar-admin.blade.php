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
                    <li><a href="{{ url('admin/home') }}"><i class="fa fa-home"></i>Manage Tryout</a></li>
                    <li><a href="{{ url('admin/bundle') }}"><i class="fa fa-edit"></i>Upload Soal</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-bar-chart-o"></i>Manage Accounts</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-download"></i>Manage Home</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-credit-card-alt"></i>Manage Payments</a></li>
                </ul>
            </div>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>