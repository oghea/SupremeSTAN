 <header id="primary" class="relative" style="height: 60px;">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button class="toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="/storage/img/logo.png" class="navbar-brand-1 ">
                </div>
                <div class="navbar-collapse collapse" aria-expanded="false">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="" title="">Home</a></li>
                        <li><a href="" title="">Program</a></li>
                        <li><a href="" title="">Tryout</a></li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span> 
                                <strong>{{Auth::user()->name}}</strong>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-profile">
                                <li>
                                    <div class="navbar-login">
                                        <div class="row">
                                            <div class="col-lg-4 col-xs-4">
                                                <p class="text-center">
                                                    <img class="img-size" src="/storage/uploads/avatars/{{ Auth::user()->user_profile->avatar }}">
                                                </p>
                                            </div>
                                            <div class="col-lg-8 col-xs-8">
                                                <p class="text-left mobile-warna"><strong>{{Auth::user()->name}}</strong></p>
                                                <p class="text-left small mobile-warna">{{Auth::user()->email}}</p>
                                                <p class="text-left">
                                                    <a href="{{url('profile/edit')}}" class="btn btn-primary btn-block btn-sm">Edit Profile</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="navbar-login navbar-login-session">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p>
                                                    <a href="{{ url('/logout') }}" class="btn btn-danger btn-block">Logout</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
