<div class="top_nav">
    <div class="nav_menu" style="min-height:60px;">
        <nav>
            <div class="nav toggle" >
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            {{-- <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="/storage/uploads/avatars/{{ Auth::user()->user_profile->avatar }}" alt="">
                        @if(Auth::user()->user_profile->first_name==null)
                            {{Auth::user()->name}}
                        @else
                            {{Auth::user()->user_profile->first_name}} {{Auth::user()->user_profile->last_name}}
                        @endif
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{url('profile/edit')}}">Edit Profile</a></li>
                        <li>
                            <a href="{{url('/profile/change-pass')}}">
                                Settings
                            </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul> --}}
        </nav>
    </div>
</div>