<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="/">
        <img src="{{asset('assets/img/brand/admin.png')}}" class="navbar-brand-img" alt="ADMIN">
        </a>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Navigation -->
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class=" nav-link " href="{{route('admin.dashboard')}}"> <i class="ni ni-tv-2 text-primary"></i> Dashboard</a>
            </li>
            <li class="nav-item">
            {{-- @auth('admin') --}}
            <a class="nav-link " href="{{route('viewadminprofile')}}">
                <i class="ni ni-single-02 text-blue"></i> My Profile
            </a>
            {{-- @endauth --}}
            </li>
            <li class="nav-item">
            <a class="nav-link " href="{{route('viewtutors')}}">
                <i class="ni ni-briefcase-24 text-orange"></i> Tutors
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('viewstudents')}}">
                <i class="ni ni-hat-3 text-yellow"></i> Students
            </a>
            </li>
            <li class="nav-item" id="markasread" >
            <a class="nav-link" href="{{route('viewunapprovedtutors')}}">
                <i class="ni ni-notification-70 text-red"></i>Requested Tutors 
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('admin.announcement')}}">
                <i class="ni ni-key-25 text-info"></i> Publish Announcements
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../examples/register.html">
                <i class="ni ni-circle-08 text-pink"></i> Register
            </a>
            </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Documentation</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
                <i class="ni ni-spaceship"></i> Getting started
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                <i class="ni ni-palette"></i> Foundation
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                <i class="ni ni-ui-04"></i> Components
            </a>
            </li>
        </ul>
        </div>
    </div>
</nav>