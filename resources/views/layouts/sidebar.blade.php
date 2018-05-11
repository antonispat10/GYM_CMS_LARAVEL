
    <div id="wrapper">

<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-topx">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{route('user.index')
                            }}">
                        GYM APP
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">


                            <li><a href="{{route('user.index')
                            }}">Home</a></li>



                        <!-- Right Side Of Navbar -->


                        <!-- Blog Categories Well -->






                        <!-- Authentication Links -->

                        @if (Auth::guest())
                            <li><a href="{{ url('/login')
                            }}">Login</a></li>

                            <li><a href="{{ url('/register')
                            }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>


        @if(Auth::user())

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="{{route('user.index')
                            }}"><i class="fa
                    fa-dashboard
                    fa-fw"></i> Dashboard</a>
                </li>


                <li><a href="{{route('news')
                            }}">Blog - News</a></li>
                    <li>
              <?php  $count = 1; ?>
                @foreach ($us1 as $user)
                @if ($count ==1)
                <li><a href="{{route('edit_profile_per_user',
                $user->id)
                            }}">Edit Profile</a></li>
                    <?php  $count++; ?>
                    @endif
                    @endforeach

                <li class="alert-info">
                    <a href="#"><div class="list-group weekly
" data-toggle="collapse" data-target="#sub">Weekly Program</div>

                       </a>

                    </li>
                    <!-- /.nav-second-level -->

                <div id="sub" class="collapse">
                @foreach($days as $day)
                <li class="list-group-item">
                    <a href="{{route('program',$day->id)}}"><div
                                class="list-group-item
                                ">{{$day->name}}</div></a>
                    <!-- /.nav-second-level -->
                </li>

                    @endforeach
                </div>
            </ul>

        </div>
        <!-- /.sidebar-collapse -->
    </div>

        @endif
    <!-- /.navbar-static-side -->
</nav>

</div>