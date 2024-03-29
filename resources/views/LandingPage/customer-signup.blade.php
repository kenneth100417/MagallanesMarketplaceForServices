@include('LandingPage.partials.header')

<!-- home section-->
<section id="home" style="background-image: url('assets/img/background.png'); min-height: 100vh !important;background-repeat: no-repeat;background-size: cover;">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center align-items-center">
            <div class="col-lg-8">
            <div class="login-dark">
                <form action="/add-customer" method="post" role="form"  class="mt-5 pt-3 px-4">
                    @csrf
                    <div class="d-flex justify-content-center mb-0 ">
                        <img class="p-0" src="assets/img/logo.png" alt="Marketplace Services" style="width: 200px; filter: drop-shadow(2px 2px 2px white) !important;">
                    </div>
                    <div class="overflow-auto" style=" max-height: 40vh">
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
                        <div class="form-group mt-3">
                            <h5 class="text-dark"><small>Account Details</small></h5>
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
                        <span class="text-dark text-sm" style="font-size: 13px;">Already have an account?<a href="/" class=" mx-1" style="color: #2c64ac;">Log In</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>





@include('LandingPage.partials.sections')

@include('LandingPage.partials.footer')