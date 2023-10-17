<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Magallanes Marketplace for Services</title>
        <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom-styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            /* Style for the section */
            .wavy-section {
                padding: 100px 0; 
                height: 100vh; 
                overflow: hidden;
                position: relative;
            }
            .img-background{
                opacity: 0.7;
                position: absolute;
                left: 0;
                top: 0;
                width: 100vw;
                height: auto;
                object-fit: cover;
            }
            .content{
                position: relative;
                z-index: 100;
            }
    
            /* Style for the wavy shape at the bottom */
            .wavy-shape {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 300px; 
                background-image: url('assets/img/wave3.png');
                background-repeat: no-repeat;
                background-size: cover;
            }
            .signup-btn-mobile{
                display: none;
            }

            @media(max-width: 768px) {
                .wavy-section{
                    height: 100vh;
                }
                .img-background{
                    width: auto;
                    height: 100vh;
                }
                .wavy-shape {
                    height: 250px; 
                    bottom: -80px;
                }
                .logo{
                    width: 400px !important;
                    height: auto;
                    margin: 100px -50px 0px -50px !important;
                }
                .signup-btn-mobile{
                    display: block;
                }
                .signup-btn{
                    display: none;
                }
                .nav-container{
                    padding: 0 10px 0 0 !important;
                }
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav"  style=" box-shadow: 0 4px 6px 0 rgba(175, 175, 175, 0.5);">
            <div class="container-fluid px-4 nav-container" >
                <a class="navbar-brand" href="#page-top">
                    <img class="p-0" src="assets/img/logo.png" alt="Marketplace Services" style="width: 150px; filter: drop-shadow(2px 2px 2px white) !important;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto text-center">
                        <li class="nav-item"><a class="nav-link mx-3" href="#home" style="font-size: 18px;">Home</a></li>
                        <li class="nav-item"><a class="nav-link mx-3" href="#about" style="font-size: 18px;">About</a></li>
                        <li class="nav-item"><a class="nav-link mx-3" href="#services" style="font-size: 18px;">Services</a></li>
                        <li class="nav-item ms-5">
                            <div class="btn-group signup-btn">
                                <button type="button" class="btn dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #2c64ac;">
                                  Sign Up
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#customerRegistration" style="cursor: pointer;">Customer</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#serviceProviderRegistration" style="cursor: pointer">Service Provider</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>