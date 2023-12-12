@include('LandingPage.partials.header')
       
        <!-- home section-->
        <section id="home" class="wavy-section" >
            <img src="assets/img/background.png" alt="" class="img-background">
            <div class="content">
                <div class="container-fluid px-4">
                    <div class="row" >
                        <div class="text-center position-relative">
                            <img class="p-0 logo" src="assets/img/logo.png" alt="Marketplace Services" style="width: 60vw; !important;filter: drop-shadow(10px 0px 5px white) !important;">
                        </div>
                    </div>
                    <div class="row gx-4 justify-content-center align-items-center ">
                        <button type="button" class="btn  btn-success mx-3" data-bs-toggle="modal" data-bs-target="#login" style="width: 120px;border:none">Log In</button>
                        <a type="button" class="btn btn-warning mx-3 text-white"  style="width: 130px;background-color: #fb8500;border:none" href="#features">Explore <i class="fa fa-arrow-right ms-2" aria-hidden="true"></i></a>
                        <div class="btn-group signup-btn-mobile text-center mt-3">
                            <button type="button" class="btn  dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #2c64ac; width: 120px !important">
                              Sign Up
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#customerRegistration1" style="cursor: pointer;">Customer</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#serviceProviderRegistration1" style="cursor: pointer">Service Provider</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wavy-shape"></div>
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
                                    <button type="button" class="btn-close me-3 mt-3" data-bs-dismiss="modal" aria-label="Close"></button>
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
        
        <form action="/add-customer" method="post" role="form" id="customerSignupForm">
            @csrf
        <div class="modal fade customerRegModal1" id="customerRegistration1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" >
                <div class="modal-content" style="background: none; border:none">
                    <div class="modal-body d-flex justify-content-center">
                        <div class="login-dark position-relative" style="width: 300px; padding: 30px;">
                                <div class="position-absolute end-0 top-0">
                                    <button type="button" class="btn-close me-3 mt-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="d-flex justify-content-center mb-0 ">
                                    <img class="p-0" src="assets/img/logo.png" alt="Marketplace Services" style="width: 200px; filter: drop-shadow(2px 2px 2px white) !important;">
                                </div>
                                <div class="">
                                    <div class="form-group mt-3">
                                        <h5 class="text-dark"><small>Customer Registration</small></h5>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="email" name="Email" placeholder="Email"  value="{{old('Email')}}">
                                        @error('Email')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="password" name="Password" placeholder="Password"  value="{{old('Password')}}">
                                        @error('Password')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="password" name="Password_confirmation" placeholder="Confirm Password"  value="{{old('password_confirmation')}}">
                                        @error('password_confirmation')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button class="btn btn-primary btn-block py-1 px-4" type="button" data-bs-toggle="modal" data-bs-target="#customerRegistration2">Next</button>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <span class="text-dark text-sm" style="font-size: 13px;">Already have an account?<a data-bs-toggle="modal" data-bs-target="#login" class=" mx-1" style="color: #2c64ac; cursor: pointer;">Log In</a></span>
                                </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

        <div class="modal fade customerRegModal2" id="customerRegistration2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" >
                <div class="modal-content" style="background: none; border:none">
                    <div class="modal-body d-flex justify-content-center">
                        <div class="login-dark position-relative" style="width: 300px; padding: 30px">
                                <div class="position-absolute end-0 top-0">
                                    <button type="button" class="btn-close me-3 mt-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="position-absolute start-0 top-0">
                                    <button type="button" class="btn ms-2 mt-2" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#customerRegistration1">
                                        <i class="fa fa-arrow-left fa-lg" aria-hidden="true" style="color: gray"></i>
                                    </button>
                                </div>
                                <div class="d-flex justify-content-center mb-0 ">
                                    <img class="p-0" src="assets/img/logo.png" alt="Marketplace Services" style="width: 200px; filter: drop-shadow(2px 2px 2px white) !important;">
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <h5 class="text-dark"><small>Personal Information</small></h5>
                                        
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="Firstname" placeholder="Firstname"  value="{{old('Firstname')}}">
                                        @error('Firstname')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="Lastname" placeholder="Lastname"  value="{{old('Lastname')}}">
                                        @error('Lastname')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="Mobile_number" placeholder="Mobile Number"  value="{{old('Mobile_number')}}">
                                        @error('Mobile_number')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="Address" placeholder="Complete Address"  value="{{old('Address')}}">
                                        @error('Address')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="customerCheckbox">
                                    <label class="form-check-label text-dark" for="flexCheckChecked" style="font-size: 13px;">
                                      I agree to the <a class="text-primary" data-bs-toggle="modal" data-bs-target="#terms" style="cursor: pointer">Terms & Conditions</a>.
                                    </label>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button class="btn btn-primary btn-block py-1 px-4" type="submit" id="customerSignupBtn" disabled>Sign Up</button>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <span class="text-dark text-sm" style="font-size: 13px;">Already have an account?<a data-bs-toggle="modal" data-bs-target="#login" class=" mx-1" style="color: #2c64ac; cursor: pointer;">Log In</a></span>
                                </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </form>



        
         <!-- Service Provider Registration Modal -->
         <form method="post" action="/add-service-provider" id="serviceProviderSignupForm">
            @csrf
         <div class="modal fade" id="serviceProviderRegistration1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: none; border:none">
                    <div class="modal-body d-flex justify-content-center">
                        <div class="login-dark position-relative" style="width: 300px; padding: 30px !important">
                                <div class="position-absolute end-0 top-0">
                                    <button type="button" class="btn-close me-3 mt-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="d-flex justify-content-center mb-0 mt-n5">
                                    <img class="p-0 pt-n5" src="assets/img/logo.png" alt="Marketplace Services" style="width: 200px; filter: drop-shadow(2px 2px 2px white) !important;">
                                </div>
                                <div>
                                    <div class="form-group mt-3">
                                        <h5 class="text-dark"><small>Service Provider Registration</small></h5>
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
                                    <button class="btn btn-primary btn-block py-1 px-4" data-bs-toggle="modal" data-bs-target="#serviceProviderRegistration2" type="button">Next</button>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <span class="text-dark text-sm" style="font-size: 13px;">Already have an account?<a data-bs-toggle="modal" data-bs-target="#login" class=" mx-1" style="color: #2c64ac; cursor: pointer">Log In</a></span>
                                </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

        <div class="modal fade" id="serviceProviderRegistration2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: none; border:none">
                    <div class="modal-body d-flex justify-content-center">
                        <div class="login-dark position-relative" style="width: 300px; padding: 30px">
                                <div class="position-absolute end-0 top-0">
                                    <button type="button" class="btn-close me-3 mt-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="position-absolute start-0 top-0">
                                    <button type="button" class="btn ms-2 mt-2" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#serviceProviderRegistration1">
                                        <i class="fa fa-arrow-left fa-lg" aria-hidden="true" style="color: gray"></i>
                                    </button>
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
                                    <div class="form-group mt-2">
                                        <input class="form-control text-dark" type="text" name="street" placeholder="Purok/Street/House No."   id="street">
                                        @error('Address')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <select class="form-control text-dark" type="text" name="Barangay Select" id="selectedAddress">
                                            <option value="">Select Address</option>
                                            <option value="Aguada Norte, Magallanes Sorsogon">Aguada Norte</option>
                                            <option value="Aguada Sur, Magallanes Sorsogon">Aguada Sur</option>
                                            <option value="Anibong, Magallanes Sorsogon">Anibong</option>
                                            <option value="Bacalon, Magallanes Sorsogon">Bacalon</option>
                                            <option value="Bacolod, Magallanes Sorsogon">Bacolod</option>
                                            <option value="Banacud, Magallanes Sorsogon">Banacud</option>
                                            <option value="Biga, Magallanes Sorsogon">Biga</option>
                                            <option value="Behia, Magallanes Sorsogon">Behia</option>
                                            <option value="Binisitahan del Norte, Magallanes Sorsogon">Binisitahan del Norte</option>
                                            <option value="Binisitahan del Sur, Magallanes Sorsogon">Binisitahan del Sur</option>
                                            <option value="Biton, Magallanes Sorsogon">Biton</option>
                                            <option value="Bulala, Magallanes Sorsogon">Bulala</option>
                                            <option value="Busay, Magallanes Sorsogon">Busay</option>
                                            <option value="Caditaan, Magallanes Sorsogon">Caditaan</option>
                                            <option value="Cagbolo, Magallanes Sorsogon">Cagbolo</option>
                                            <option value="Cagtalaba, Magallanes Sorsogon">Cagtalaba</option>
                                            <option value="Cawit Extension, Magallanes Sorsogon">Cawit Extension</option>
                                            <option value="Cawit Proper, Magallanes Sorsogon">Cawit Proper</option>
                                            <option value="Ginangra, Magallanes Sorsogon">Ginangra</option>
                                            <option value="Hubo, Magallanes Sorsogon">Hubo</option>
                                            <option value="Incarizan, Magallanes Sorsogon">Incarizan</option>
                                            <option value="Lapinig, Magallanes Sorsogon">Lapinig</option>
                                            <option value="Magsaysay, Magallanes Sorsogon">Magsaysay</option>
                                            <option value="Malbog, Magallanes Sorsogon">Malbog</option>
                                            <option value="Pantalan, Magallanes Sorsogon">Pantalan</option>
                                            <option value="Pawik, Magallanes Sorsogon">Pawik</option>
                                            <option value="Pili, Magallanes Sorsogon">Pili</option>
                                            <option value="Poblacion, Magallanes Sorsogon">Poblacion</option>
                                            <option value="Salvacion, Magallanes Sorsogon">Salvacion</option>
                                            <option value="Santa Elena, Magallanes Sorsogon">Santa Elena</option>
                                            <option value="Siuton, Magallanes Sorsogon">Siuton</option>
                                            <option value="Tagas, Magallanes Sorsogon">Tagas</option>
                                            <option value="Tulatula Norte, Magallanes Sorsogon">Tulatula Norte</option>
                                            <option value="Tulatula Sur, Magallanes Sorsogon">Tulatula Sur</option>
                                        </select>
                                        @error('Address')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="serviceProviderCheckbox">
                                        <label class="form-check-label text-dark" for="flexCheckChecked" style="font-size: 13px;">
                                          I agree to the <a class="text-primary" data-bs-toggle="modal" data-bs-target="#terms" style="cursor: pointer">Terms & Conditions</a>.
                                        </label>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input id="business_address" class="form-control text-dark" type="text" name="business_address" placeholder="Business Address"   value="{{old('business_address')}}" hidden readonly>
                                        <a type="button" class="float-end text-success text-sm" id="editAdd">Edit Address</a>
                                        @error('business_address')
                                             <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="form-group d-flex justify-content-center mt-2 w-100">
                                    <button class="btn btn-primary btn-block py-1 px-4" type="submit" id="serviceProviderSignupBtn" disabled>Sign Up</button>
                                </div>
                                
                                <div class="d-flex justify-content-center mt-3">
                                    <span class="text-dark text-sm" style="font-size: 13px;">Already have an account?<a data-bs-toggle="modal" data-bs-target="#login" class=" mx-1" style="color: #2c64ac; cursor: pointer">Log In</a></span>
                                </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
         </form>


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
       
@include('LandingPage.partials.sections')

@include('LandingPage.partials.footer')