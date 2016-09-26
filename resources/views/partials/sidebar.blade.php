<div class="col-md-3">
    <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
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
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            <a href="#" class="btn btn-success btn-sm" role="button">Yuk Tryout</a>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul id="sidebar" class="nav">
                <li>
                    <a href="{{url('/home')}}">
                        <i class="glyphicon glyphicon-home"></i>
                        Overview </a>
                </li>
                <li>
                    <a href="{{ url('/profile') }}">
                        <i class="glyphicon glyphicon-info-sign"></i>
                        Info Profile </a>
                </li>
                <li>
                    <a href="results.html">
                        <i class="glyphicon glyphicon-list-alt"></i>
                        Results </a>
                </li>
                <li>
                    <a href="downloads.html">
                        <i class="glyphicon glyphicon-download"></i>
                        Downloads </a>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-usd"></i>
                        Payments </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>