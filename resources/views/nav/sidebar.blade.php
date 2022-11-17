<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('asset/img/brand/logo-apjii-jatim-full.png') }}" class="navbar-brand-img"
                    alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fa fa-tachometer-alt text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    @if (auth()->user()->level_id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('certificates-user') }}">
                                <i class="fa fa-certificate text-warning"></i>
                                <span class="nav-link-text">My Certificate</span>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->level_id == 1)

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#user-management" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-forms">
                            <i class="fas fa-users text-green"></i>
                            <span class="nav-link-text">User Management</span>
                        </a>
                        <div class="collapse" id="user-management">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <span class="nav-link-text">Employee</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('participants.index') }}">
                                        <span class="nav-link-text">Participant</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#event" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-forms">
                                <i class="fas fa-calendar-week text-info"></i>
                                <span class="nav-link-text">Event</span>
                            </a>
                            <div class="collapse" id="event">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('events.create') }}">
                                            <span class="nav-link-text">Add Event</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('events.index') }}">
                                            <span class="nav-link-text">List Event</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('certificates.index') }}">
                                            <span class="nav-link-text">Certificate</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
