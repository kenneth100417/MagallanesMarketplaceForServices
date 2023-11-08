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

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>  
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <style>
            .fc-event{
                max-height: 40px;
                overflow: hidden;
                text-align: center;
            }
            .fc-body tr td{
                cursor: pointer;
            }
            .fc-title{
                white-space: normal;
            }
            .fc-time{
                display: none;
            }
            .fc-content{
                padding: 10 0px;
            }
        </style>

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
                <span><small class="{{$user->status == '0' ? 'text-danger':'text-success'}}">{{$user->status == '0' ? 'Unverified User':'Verified User'}}</small></span>
                <ul class="d-none d-md-inline-block navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img class="bg-info rounded-circle border border-info border-1" src="{{url($user->photo)}}" alt="" style="width: 35px !important; height: 35px !important;object-fit:cover;"></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{url('/service_provider_profile')}}">Manage Account</a></li>
                            <li><a class="dropdown-item text-info" href="{{url('/logout')}}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <livewire:service-providers.side-nav />
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <div class="text-center">{{$user->firstname}} {{$user->lastname}}</div>
                        <div class="text-center"><small>Service Provider</small></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                @if (session()->has('message'))
                    <div class="alert alert-info bg-info alert-dismissible fade show position-absolute top-0 end-0 mt-1" role="alert" style="z-index: 100;">
                        {{session('message')}}
                    </div>
                @endif

                <!-- Terms and Condition Modal -->
                <div class="modal fade" id="terms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Terms and Conditions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="padding: 20px 30px">
                            <p>By accessing or using our platform, you agree to these terms and conditions.</p>

                            <p style="font-weight: bold">1. User Registration:</p>
                            <p style="text-indent: 30px;">1.1 Users must create an account and provide accurate information.</p>
                            <p style="text-indent: 30px;">1.2  Users are responsible for maintaining the confidentiality of their account information.</p>
                            <p style="font-weight: bold">2. Listing and Services</p>
                            <p style="text-indent: 30px;">2.1 Users are responsible for the accuracy of their listings.</p>
                            <p style="text-indent: 30px;">2.2 Prohibited content such as illegal services is not allowed.</p>
                            <p style="font-weight: bold">3. Communications</p>
                            <p style="text-indent: 30px;">3.1 Users must maintain respectful and professional communication.</p>
                            <p style="text-indent: 30px;">3.2 We are not responsible for the content of user communications.</p>
                            <p style="font-weight: bold">4. Reviews and Ratings</p>
                            <p style="text-indent: 30px;">4.1 Users can leave reviews and ratings.</p>
                            <p style="text-indent: 30px;">4.2 False or malicious reviews are prohibited.</p>
                            <p style="font-weight: bold">5. Privacy</p>
                            <p style="text-indent: 30px;">5.1 We collect and use personal information as described in our Privacy Policy.</p>
                            <p style="font-weight: bold">6. Termination</p>
                            <p style="text-indent: 30px;">6.1 We can suspend or terminate user accounts for violations of these terms.</p>
                            <p style="font-weight: bold">7. Changes to Terms</p>
                            <p style="text-indent: 30px;">7.1 We can update these terms, and users will be notified of changes.</p>
                            
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>