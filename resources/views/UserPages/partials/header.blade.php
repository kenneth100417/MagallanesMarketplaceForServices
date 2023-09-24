<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        {{-- <meta name="description" content="" />
        <meta name="author" content="" /> --}}
        
        <title>Home</title>
        <link href="/css/dashboard-styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="/assets/img/logo.png" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Marketplace Services</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <div class=" form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <ul class="d-none d-md-inline-block navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{url('/logout')}}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link mt-3  {{ 'user_dashboard' == request()->path() ? 'active' : ''}}" href="{{url('/user_dashboard')}}">
                                <div class="sb-nav-link-icon mx-3" style="width: 20px !important"><i class="fas fa-house-user"></i></div>
                                Home
                            </a>
                            <a class="nav-link {{ 'user_services' == request()->path() ? 'active' : ''}}" href="{{url('/user_services')}}">
                                <div class="sb-nav-link-icon mx-3 " style="width: 20px !important"><i class="fas fa-hands-helping"></i></div>
                                Services
                            </a>
                            <a class="nav-link {{ 'user_service_providers' == request()->path() ? 'active' : ''}}" href="{{url('/user_service_providers')}}">
                                <div class="sb-nav-link-icon mx-3  " style="width: 20px !important"><i class="fas fa-user-friends"></i></div>
                                Service Providers
                            </a>
                            <a class="nav-link {{ 'user_appointments' == request()->path() ? 'active' : ''}}" href="{{url('/user_appointments')}}">
                                <div class="sb-nav-link-icon mx-3  " style="width: 20px !important"><i class="fas fa-calendar-alt"></i></div>
                                Appointments
                            </a>
                            <a class="nav-link {{ 'user_profile' == request()->path() ? 'active' : ''}}" href="{{url('/user_profile')}}">
                                <div class="sb-nav-link-icon mx-3  " style="width: 20px !important"><i class="fas fa-user-alt"></i></div>
                                Profile
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <div class="text-center">{{$user->firstname}} {{$user->lastname}}</div>
                        <div class="text-center"><small>Customer</small></div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                @if (session()->has('message'))
                    <div class="alert alert-info alert-dismissible fade show position-absolute top-0 end-0 mt-1" role="alert" style="z-index: 100;">
                        {{session('message')}}
                    </div>
                @endif
