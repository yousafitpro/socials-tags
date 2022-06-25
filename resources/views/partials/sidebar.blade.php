<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" style="width: 100px; height: 100px" src="{{asset(Auth::user()->profile_image)}}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{Auth::user()->fname.' '.Auth::user()->lname}}</span>
                        <span class="text-muted text-xs block">More <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{route('user.showProfile')}}">Profile</a></li>
{{--                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>--}}
{{--                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>--}}
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </div>
                <div class="logo-element">
                    VNs
                </div>
            </li>

          @if(Auth::user()->type=='supper-admin')
                <li>
                    <a href="{{route('admin.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>





                <li >
                    <a href="javascript:void"><i class="fa fa-users"></i> <span class="nav-label">Users</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('admin.user.add')}}">Add New</a></li>
                        <li><a href="{{route('admin.user.getAll')}}">Users</a></li>
                    </ul>
                </li>
                <li >
                    <a href="javascript:void"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <li><a href="{{route('admin.webConfig.getConfig')}}">Web Configurations</a></li>
                    </ul>
                </li>
              @endif
            @if(Auth::user()->type=='user' || Auth::user()->type=='supper-admin')
                <li>
                    <a href="{{route('daily.create')}}" target="_blank"><i class="fa fa-video-camera"></i> <span class="nav-label">Meet</span></a>
                </li>
{{--            <li>--}}
{{--                <a href="{{route('admin.game.getAll')}}"><i class="fa fa-gamepad"></i> <span class="nav-label">Games</span></a>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href="{{route('user.walletAmounts')}}"><i class="fa fa-google-wallet"></i> <span class="nav-label">Wallet</span></a>--}}
{{--            </li>--}}
                        <li>
                            <a href="{{ route('official.search') }}"><i class="fa fa-users"></i> <span class="nav-label">Officials</span></a>
                        </li>

            <li>
                <a href="{{route('admin.post.getAll')}}"><i class="fa fa-pencil-square-o"></i> <span class="nav-label">Manage Posts</span></a>
            </li>
            <li>
                <a href="{{ route('ligiscan.search') }}"><i class="fa fa-users"></i> <span class="nav-label">legiscan</span></a>
            </li>
            <li>
                <a href="{{ route('regulationsgov.search') }}"><i class="fa fa-users"></i> <span class="nav-label">RegulationsGov</span></a>
            </li>
{{--            <li>--}}
{{--                <a href="{{ route('ligiscan.settings') }}"><i class="fa fa-users"></i> <span class="nav-label">legiscan Settings-09</span></a>--}}
{{--            </li>                <li>--}}
{{--                <a href="#"><i class="fa fa-ticket"></i> <span class="nav-label">Menu option-3</span></a>--}}
            </li>

            @endif

        </ul>

    </div>
</nav>
