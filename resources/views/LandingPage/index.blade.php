@include('LandingPage.partials.header')
       
        <!-- home section-->
        <section id="home" class="wavy-section" >
            <img src="assets/img/background.png" alt="" class="img-background">
            <div class="content">
                <div class="container-fluid px-4">
                    <div class="row" >
                        <div class="text-center position-relative">
                            <img class="p-0 logo" src="assets/img/logo.png" alt="Marketplace Services" style="width: 700px; !important;">
                        </div>
                    </div>
                    <div class="row gx-4 justify-content-center align-items-center mt-2 ">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#login" style="width: 120px">Log In</button>
                        <div class="btn-group signup-btn-mobile mt-3 text-center">
                            <button type="button" class="btn dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #2c64ac; width: 120px !important">
                              Sign Up
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#customerRegistration" style="cursor: pointer;">Customer</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#serviceProviderRegistration" style="cursor: pointer">Service Provider</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="wavy-shape">
            </div>
        </section> 

        <!-- LogIn Modal -->
        <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: none; border:none">
                    <div class="modal-body d-flex justify-content-center">
                        <div class="login-dark position-relative" style="width: 300px">
                            <form action="/login" method="post" role="form" style="padding: 30px !important">
                                @csrf
                                <div class="position-absolute end-0 top-0">
                                    <button type="button" class="btn-close me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <img class="p-0" src="assets/img/logo.png" alt="Marketplace Services" style="width: 200px; filter: drop-shadow(2px 2px 2px white) !important;">
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control text-dark" type="email" name="email" placeholder="Email"  value="{{old('email')}}">
                                
                                </div>
                                <div class="form-group mt-3">
                                    <input class="form-control text-dark" type="password" name="password" placeholder="Password"  value="{{old('password')}}">
                                </div>
                                <div class="form-group d-flex justify-content-center mt-4">
                                    <button class="btn btn-primary btn-block py-1 px-3" type="submit">Log In</button>
                                </div>
                                <a href="#" class="forgot mt-3">Forgot your email or password?</a>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

        <!-- Customer Registration Modal -->
        <div class="modal fade" id="customerRegistration" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" >
                <div class="modal-content" style="background: none; border:none">
                    <div class="modal-body d-flex justify-content-center">
                        <div class="login-dark position-relative" style="width: 300px">
                            <form action="/add-customer" method="post" role="form" style="padding: 30px !important">
                                @csrf
                                <div class="position-absolute end-0 top-0">
                                    <button type="button" class="btn-close me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="d-flex justify-content-center mb-0 ">
                                    <img class="p-0" src="assets/img/logo.png" alt="Marketplace Services" style="width: 200px; filter: drop-shadow(2px 2px 2px white) !important;">
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <h5 class="text-dark"><small>Personal Information</small></h5>
                                        
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="firstname" placeholder="Firstname"  value="{{old('firstname')}}">
                                        @error('firstname')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="lastname" placeholder="Lastname"  value="{{old('lastname')}}">
                                        @error('lastname')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="mobile_number" placeholder="Mobile Number"  value="{{old('mobile_number')}}">
                                        @error('mobile_number')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="address" placeholder="Complete Address"  value="{{old('address')}}">
                                        @error('address')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <h5 class="text-dark"><small>Account Details</small></h5>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="email" name="email" placeholder="Email"  value="{{old('email')}}">
                                        @error('email')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="password" name="password" placeholder="Password"  value="{{old('password')}}">
                                        @error('password')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="password" name="password_confirmation" placeholder="Confirm Password"  value="{{old('password_confirmation')}}">
                                        @error('password_confirmation')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button class="btn btn-primary btn-block py-1 px-2" type="submit">Sign Up</button>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <span class="text-dark text-sm" style="font-size: 13px;">Already have an account?<a data-bs-toggle="modal" data-bs-target="#login" class=" mx-1" style="color: #2c64ac; cursor: pointer;">Log In</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        
         <!-- Service Provider Registration Modal -->
         <div class="modal fade" id="serviceProviderRegistration" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: none; border:none">
                    <div class="modal-body d-flex justify-content-center">
                        <div class="login-dark position-relative" style="width: 300px">
                            <form method="post" action="/add-service-provider" style="padding: 30px !important">
                                @csrf
                                <div class="position-absolute end-0 top-0">
                                    <button type="button" class="btn-close me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="d-flex justify-content-center mb-0 mt-n5">
                                    <img class="p-0 pt-n5" src="assets/img/logo.png" alt="Marketplace Services" style="width: 200px; filter: drop-shadow(2px 2px 2px white) !important;">
                                </div>
                                <div>
                                    <div class="form-group">
                                        <h5 class="text-dark"><small>Business Details</small></h5>
                                    </div>
                                    <div class="form-group mt-1">
                                        <input class="form-control text-dark" type="text" name="business_name" placeholder="Business Name"  value="{{old('business_name')}}">
                                        @error('business_name')
                                             <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="business_address" placeholder="Business Address"   value="{{old('business_address')}}">
                                        @error('business_address')
                                             <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="firstname" placeholder="Owner's Firstname"  value="{{old('firstname')}}">
                                        @error('firstname')
                                             <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="lastname" placeholder="Owner's Lastname"  value="{{old('lastname')}}">
                                        @error('lastname')
                                             <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="mobile_number" placeholder="Mobile Number"  value="{{old('mobile_number')}}">
                                        @error('mobile_number')
                                             <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <h5 class="text-dark"><small>Acount Details</small></h5>
                                    </div>
                                    <div class="form-group mt-1">
                                        <input class="form-control text-dark" type="email" name="email" placeholder="Email"  value="{{old('email')}}">
                                        @error('email')
                                             <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="password" name="password" placeholder="Password"  value="{{old('password')}}">
                                        @error('password')
                                             <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="password" name="password_confirmation" placeholder="Confirm Password"  value="{{old('confirm_password')}}">
                                        @error('password_confirmation')
                                             <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button class="btn btn-primary btn-block py-1 px-2" type="submit">Sign Up</button>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <span class="text-dark text-sm" style="font-size: 13px;">Already have an account?<a data-bs-toggle="modal" data-bs-target="#login" class=" mx-1" style="color: #2c64ac; cursor: pointer">Log In</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
       
       
@include('LandingPage.partials.sections')

@include('LandingPage.partials.footer')