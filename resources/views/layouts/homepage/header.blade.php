<div class="main-header no-box-shadow" data-background-color="blue2">
    <div class="nav-top">
        <div class="container d-flex flex-row">
            <button class="navbar-toggler sidenav-toggler2 ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu"></i>
                </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <!-- Logo Header -->
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="navbar brand" class="navbar-brand">
            </a>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header-left navbar-expand-lg p-0">
                <ul class="navbar-nav page-navigation pl-md-3">
                    <h3 class="title-menu d-flex d-lg-none"> 
                        Menu 
                        <div class="close-menu"> <i class="flaticon-cross"></i></div>
                    </h3>
                    <li class="nav-item @if (Request::segment(1) == "") active @endif">
                        <a class="nav-link" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item @if (Request::segment(1) == "about") active @endif">
                        <a class="nav-link" href="{{ route('about') }}">
                            About
                        </a>
                    </li>
                    <li class="nav-item @if (Request::segment(1) == "login") active @endif">
                        <a class="nav-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                </ul>
            </nav>
            <nav class="navbar navbar-header navbar-expand-lg p-0">
                <div class="container-fluid p-0"></div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>