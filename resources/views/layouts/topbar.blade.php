<nav id="toolbar" class="bg-white">

    <div class="row no-gutters align-items-center flex-nowrap">

        <div class="col">

            <div class="row no-gutters align-items-center flex-nowrap" style="background-color: #f7f2df">

                <button type="button" class="toggle-aside-button btn btn-icon d-block d-lg-none" data-fuse-bar-toggle="aside">
                    <i class="icon icon-menu"></i>
                </button>

                <div class="toolbar-separator d-block d-lg-none"></div>

                <div class="shortcuts-wrapper row no-gutters align-items-center px-0 px-sm-2">

                    <div class="shortcuts row no-gutters align-items-center d-none d-md-flex">

                        @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
                            <a href="/search_filter">
                                <button class="btn btn-success">Booking Search</button>
                            </a>
                       @endif

                    </div>

                </div>

                <div class="toolbar-separator"></div>

            </div>
        </div>

        <div class="col-auto" style="background-color: #f7f2df !important;">

            <div class="row no-gutters align-items-center justify-content-end">

                <div class="user-menu-button dropdown">

                    <div class="dropdown-toggle ripple row align-items-center no-gutters px-2 px-sm-4" role="button" id="dropdownUserMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-wrapper">
                            <img class="avatar" src="/public/website/images/icon-boy.jpg">
                            <i class="status text-green icon-checkbox-marked-circle s-4"></i>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::user()->role == "agent")
                            <span class="username mx-3 d-none d-md-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role == "admin")
                            <span class="username mx-3 d-none d-md-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        @endif
                    </div>

                    <div class="dropdown-menu" aria-labelledby="dropdownUserMenu">

                        {{--<a class="dropdown-item" href="#">--}}
                            {{--<div class="row no-gutters align-items-center flex-nowrap">--}}
                                {{--<i class="icon-account"></i>--}}
                                {{--<span class="px-3">My Profile</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        {{--<a class="dropdown-item" href="#">--}}
                            {{--<div class="row no-gutters align-items-center flex-nowrap">--}}
                                {{--<i class="icon-email"></i>--}}
                                {{--<span class="px-3">Inbox</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        {{--<a class="dropdown-item" href="#">--}}
                            {{--<div class="row no-gutters align-items-center flex-nowrap">--}}
                                {{--<i class="status text-green icon-checkbox-marked-circle"></i>--}}
                                {{--<span class="px-3">Online</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout>
                            <div class="row no-gutters align-items-center flex-nowrap">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <i class="icon-logout"></i>
                                <span class="px-3">Logout</span>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</nav>
