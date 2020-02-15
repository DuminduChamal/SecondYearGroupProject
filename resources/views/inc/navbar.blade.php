<!-- Navbar -->
<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
        <a class="navbar-brand" href="/">
        <img src="/assets/img/brand/brand.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            {{-- <div class="navbar-collapse-header d-md-none">
              <div class="row">
                <div class="col-6 collapse-brand">
                  <a href="../index.html">
                    <img src="../assets/img/brand/blue.png">
                  </a>
                </div>
                <div class="col-6 collapse-close">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
            </div> --}}
            <!-- Navbar items -->
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#">
                            <span class="nav-link-inner--text">How it works</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#">
                        <span class="nav-link-inner--text">About Us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="/contact">
                        <span class="nav-link-inner--text">Contact Us</span>
                        </a>
                    </li>
                </ul>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (!Request::is('login'))
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                            <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                                <i class="ni ni-key-25"></i>
                                <span class="nav-link-inner--text">{{ __('Login') }}</span>
                            </a>
                        </li>
                    @endif
                    @if (!Request::is('register'))
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register As Tutor') }}</a> --}}
                            <a class="nav-link nav-link-icon" href="{{ route('register') }}">
                                <i class="ni ni-hat-3"></i>
                                <span class="nav-link-inner--text">{{ __('Register As Tutor') }}</span>
                            </a>
                        </li>
                    @endif
                    @if (!Request::is('register/student'))
                        <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('register.student') }}">
                                    <i class="ni ni-circle-08"></i>
                                    <span class="nav-link-inner--text">{{ __('Register As Student') }}</span>
                                </a>
                        </li>
                    @endif
                @else
                    @if (!Request::is('student/registerastutor'))
                        @if(Auth::user()->is_student==1 && Auth::user()->is_tutor==0)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('registerAsTutor') }}">
                                    <span class="nav-link-inner--text"><small>{{ __('Want to Register As Tutor also?') }}</small></span>
                                </a>
                            </li>
                        @endif
                    @endif
                    @if (!Request::is('tutor/registerasstudent'))
                    @if(Auth::user()->is_student==0 && Auth::user()->is_tutor==1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registerAsStudent') }}">
                                <span class="nav-link-inner--text"><small>{{ __('Want to Register As Student also?') }}</small></span>
                            </a>
                        </li>
                    @endif
                @endif
                    @if(Auth::user()->is_student==0 && Auth::user()->is_tutor==1)
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <div class="media-body ml-2 d-none d-lg-block">
                                <span class="ni ni-world ni-2x"></span>
                                <span class="badge badge-secondary">{{count(auth()->user()->unreadNotifications)}}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @forelse(auth()->user()->unreadNotifications as $notification)
                            <a href="{{route('tutor.acceptslot',['student'=>$notification->data['setter']['id'], 'tutor'=>$notification->data['user']['id'],'day'=>$notification->data["data"][0]["day"], 'time'=>$notification->data["data"][0]["time"]])}}" style="font-size:15px" class="dropdown-item"><span class="ni ni-bold-right">@include('layouts.notification.'.snake_case(class_basename($notification->type)))</span></a>
                            @empty
                                <a class="dropdown-item" href="#">No unread notifications</a>
                            @endforelse
                        </div>
                    </li>
                    @endif
                    @if(Auth::user()->is_student==1 && Auth::user()->is_tutor==0)
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <div class="media-body ml-2 d-none d-lg-block">
                                <span class="ni ni-world ni-2x"></span>
                                <span class="badge badge-secondary">{{count(auth()->user()->unreadNotifications)}}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @forelse(auth()->user()->unreadNotifications as $notification)
                            <a href="#" style="font-size:15px" class="dropdown-item"><span class="ni ni-bold-right">@include('layouts.notification.student.'.snake_case(class_basename($notification->type)))</span></a>
                            @empty
                                <a class="dropdown-item" href="#">No unread notifications</a>
                            @endforelse
                        </div>
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="/assets/img/avatar/{{Auth::user()->avatar}}">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->FName}}</span>
                                    </div>
                                </div>
                            </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->is_student==1 && Auth::user()->is_tutor==1)
                                <a class="dropdown-item" href="/student">
                                    <i class="ni ni-glasses-2"></i>
                                    <span>{{ __('Student Dashboard') }}</span>
                                </a>
                                <a class="dropdown-item" href="/tutor">
                                    <i class="ni ni-atom"></i>
                                    <span>{{ __('Tutor Dashboard') }}</span>
                                </a>
                                <a class="dropdown-item" href="/student/profile">
                                    <i class="ni ni-single-02"></i>
                                    <span>{{ __('Student Profile') }}</span>
                                </a>
                                <a class="dropdown-item" href="/tutor/profile">
                                    <i class="ni ni-hat-3"></i>
                                    <span>{{ __('Tutor Profile') }}</span>
                                </a>
                            @endif
                            @if(Auth::user()->is_student==1 && Auth::user()->is_tutor==0)
                                <a class="dropdown-item" href="/student">
                                    <i class="ni ni-glasses-2"></i>
                                    <span>{{ __('Dashboard') }}</span>
                                </a>
                                <a class="dropdown-item" href="/student/profile">
                                    <i class="ni ni-single-02"></i>
                                    <span>{{ __('Profile') }}</span>
                                </a>
                            @endif
                            @if(Auth::user()->is_student==0 && Auth::user()->is_tutor==1)
                                <a class="dropdown-item" href="/tutor">
                                    <i class="ni ni-glasses-2"></i>
                                    <span>{{ __('Dashboard') }}</span>
                                </a>
                                <a class="dropdown-item" href="/tutor/profile">
                                    <i class="ni ni-single-02"></i>
                                    <span>{{ __('Profile') }}</span>
                                </a>
                            @endif
                            @if(Auth::user()->is_student==0 && Auth::user()->is_tutor==0 && Auth::user()->is_admin==1)
                                <a class="dropdown-item" href="/admin">
                                    <i class="ni ni-glasses-2"></i>
                                    <span>{{ __('Dashboard') }}</span>
                                </a>
                                <a class="dropdown-item" href="/admin/profile">
                                    <i class="ni ni-single-02"></i>
                                    <span>{{ __('Profile') }}</span>
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


{{-- href="/tutor/acceptslot/{{$notification->data['setter']['id']}}/{{$notification->data['user']['id']}}" --}}