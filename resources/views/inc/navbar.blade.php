<!-- Navbar -->
<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
        <a class="navbar-brand" href="/">
        <img src="/assets/img/brand/white.png" />
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
                        <a class="nav-link nav-link-icon" href="#">
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
                            {{-- <a class="nav-link" href="{{ route('register.student') }}">{{ __('Register As Student') }}</a> --}}
                            <a class="nav-link nav-link-icon" href="{{ route('register.student') }}">
                                <i class="ni ni-circle-08"></i>
                                <span class="nav-link-inner--text">{{ __('Register As Student') }}</span>
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->FName }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->is_student==1 && Auth::user()->is_tutor==1)
                                <a class="dropdown-item" href="/student">
                                        <i class="ni ni-glasses-2"></i>
                                        <span>{{ __('Student') }}</span>
                                    </a>
                                    <a class="dropdown-item" href="/tutor">
                                        <i class="ni ni-hat-3"></i>
                                        <span>{{ __('Tutor') }}</span>
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