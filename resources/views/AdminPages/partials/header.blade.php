<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Magallanes Marketplace for Services</title>
        <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/dashboard-styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        @livewireStyles
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
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img class="bg-info rounded-circle border border-info border-1" src="{{$user->photo}}" alt="{{$user->firstname}} {{$user->lastname}}" style="width: 35px; height: 35px;object-fit:cover;"></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{url('/service_provider_profile')}}">Update Profile</a></li>
                            <li><a class="dropdown-item text-info" href="{{url('/logout')}}">Logout</a></li>
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
                            <a class="nav-link mt-3 {{ 'admin_dashboard' == request()->path() ? 'active' : ''}}" href="{{url('/admin_dashboard')}}">
                                <div class="sb-nav-link-icon mx-3" style="width: 20px !important"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link {{ 'admin_service_providers' == request()->path() ? 'active' : ''}}" href="{{url('/admin_service_providers')}}">
                                <div class="sb-nav-link-icon mx-3 " style="width: 20px !important"><i class="fas fa-user-friends"></i></div>
                                Service Providers
                            </a>
                            <a class="nav-link {{ 'admin_customers' == request()->path() ? 'active' : ''}}" href="{{url('/admin_customers')}}">
                                <div class="sb-nav-link-icon mx-3 " style="width: 20px !important"><i class="fas fa-user-friends"></i></div>
                                Customers
                            </a>
                            <a class="nav-link {{ 'admin_profile' == request()->path() ? 'active' : ''}}" href="{{url('/admin_profile')}}">
                                <div class="sb-nav-link-icon mx-3" style="width: 20px !important"><i class="fas fa-user-alt"></i></div>
                                Profile
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <div class="text-center">{{$user->firstname}} {{$user->lastname}}</div>
                        <div class="text-center"><small>Admin</small></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                @if (session()->has('message'))
                    <div class="alert alert-info bg-info alert-dismissible fade show position-absolute top-0 end-0 mt-1" role="alert" style="z-index: 100;">
                        {{session('message')}}
                    </div>
                @endif
