<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
    <div class="aside-content-wrapper">

        <div class="aside-content bg-primary-700 text-auto" style="background-color:#ab9343 !important;">

            <div class="aside-toolbar" style="background-color: #594d28">

                <div class="logo" style="color: #d4af36">
                    <img src="/public/website/images/tab-icon.png" type="image/gif" alt="" style="width: 30px;height: 30px">
                    <span class="logo-text">WedDecore</span>
                </div>

                <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
                    <i class="icon icon-backburger" style="color: #d4af36 !important;"></i>
                </button>

            </div>
            @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
            <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

                <li class="subheader">
                    <span>APPS</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="/dashboard" data-url="">

                        <i class="icon s-4 icon-tile-four"></i>

                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple " href="/admin_detail">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple " href="/agents">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Agents</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple " href="/users">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="/vendor_service_type">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Vendor Service</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="/hall_table">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Halls Request</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="/approved_hall_table">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Halls Approved</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="/add_hall_section">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Add Hall Section</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple " href="/add_hall_service">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Add Hall Services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple " href="/add_hall_theme">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Add Hall Theme</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple " href="/booking_request">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Booking Request</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ripple " href="/booking_approved">
                        <i class="icon s-4 icon-calendar-today"></i>
                        <span>Booking Approved</span>
                    </a>
                </li>



            </ul>
            @endif


            @if(\Illuminate\Support\Facades\Auth::user()->role == "agent")
                <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

                    <li class="subheader">
                        <span>APPS</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ripple " href="/dashboard" data-url="">

                            <i class="icon s-4 icon-tile-four"></i>

                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ripple " href="/agent_hall">
                            <i class="icon s-4 icon-calendar-today"></i>
                            <span>Halls</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ripple " href="/agent_add_hall_section">
                            <i class="icon s-4 icon-calendar-today"></i>
                            <span>Add Hall Section</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ripple " href="/agent_add_hall_service">
                            <i class="icon s-4 icon-calendar-today"></i>
                            <span>Add Hall Services</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ripple " href="/agent_add_hall_theme">
                            <i class="icon s-4 icon-calendar-today"></i>
                            <span>Add Hall Theme</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ripple " href="/booking">
                            <i class="icon s-4 icon-calendar-today"></i>
                            <span>Booking</span>
                        </a>
                    </li>

                </ul>
            @endif




        </div>
    </div>
</aside>
