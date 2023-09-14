<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Marketplace Services</title>
        <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom-styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav"  style=" box-shadow: 0 4px 6px 0 rgba(175, 175, 175, 0.5);">
            <div class="container px-4" >
                <a class="navbar-brand" href="#page-top">
                    <img class="p-0" src="assets/img/logo.png" alt="Marketplace Services" style="width: 150px; filter: drop-shadow(2px 2px 2px white) !important;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link mx-3" href="#home" style="font-size: 18px;">Home</a></li>
                        <li class="nav-item"><a class="nav-link mx-3" href="#about" style="font-size: 18px;">About</a></li>
                        <li class="nav-item"><a class="nav-link mx-3" href="#services" style="font-size: 18px;">Services</a></li>
                        <li class="nav-item ms-5">
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #2c64ac;">
                                  Sign Up
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{url('/customer-signup')}}">Customer</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{url('/service-provider-signup')}}">Service Provider</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>