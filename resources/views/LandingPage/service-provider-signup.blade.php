@include('LandingPage.partials.header')

@include('LandingPage.partials.header')

<!-- About section-->
@include('LandingPage.partials.header')

<!-- About section-->
<section id="home" style="background-image: url('assets/img/background.png'); min-height: 100vh !important;background-repeat: no-repeat;background-size: cover;">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center align-items-center">
            <div class="col-lg-8 ">
            <div class="login-dark">
                <form method="post" action="/add-service-provider" class="mt-5 pt-3 px-4">
                    @csrf
                    <div class="d-flex justify-content-center mb-0 mt-n5">
                        <img class="p-0 pt-n5" src="assets/img/logo.png" alt="Marketplace Services" style="width: 200px; filter: drop-shadow(2px 2px 2px white) !important;">
                    </div>
                    <div class="overflow-auto" style=" max-height: 40vh">
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
                        <span class="text-dark text-sm" style="font-size: 13px;">Already have an account?<a href="/" class=" mx-1" style="color: #2c64ac;">Log In</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>





@include('LandingPage.partials.sections')

@include('LandingPage.partials.footer')





@include('LandingPage.partials.sections')

@include('LandingPage.partials.footer')




@include('LandingPage.partials.sections')

@include('LandingPage.partials.footer')

