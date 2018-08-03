
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top">
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
                <a class="navbar-brand" href="{{ url('/') }}">
                    GYM APP
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">


                    <li><a href="{{ route('admin') }}">Home</a></li>




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

                    <li>
                        <a href="{{ route('admin') }}"> Dashboard</a>
                    </li>

                    <li><a href="{{route('news')
                            }}">News</a></li>
                    <li>
                    <li><a href="{{route('admin.posts.index')
                            }}">Posts</a></li>
                    <li>



                    <li><a href="{{route('admin.users.index')
                            }}">View all Users</a></li>
                    <li>

                    <li><a href="{{route('admin.posts.create')
                            }}">Create new Post</a></li>
                    <li>

                    <li><a href="{{route('admin.users.create')
                            }}">Create new User</a></li>
                    <li>

                    <li><a href="{{route('admin.exercises.create')
                            }}">Add Exercise for a User</a></li>
                    <li>
                    <li><a href="{{route('admin.exerciselist.create')
                            }}">Add type of exercise</a></li>
                    <li>



                    </li>
                    <!-- /.nav-second-level -->


                </ul>

            </div>
            <!-- /.sidebar-collapse -->
        </div>

@endif
<!-- /.navbar-static-side -->
    </nav>

</div>