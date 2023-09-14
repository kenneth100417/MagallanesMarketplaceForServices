@include('LandingPage.partials.header')
       
        <!-- About section-->
        <section id="home" style="background-image: url('assets/img/background.png'); min-height: 100vh !important;background-repeat: no-repeat;background-size: cover;">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center align-items-center">
                    <div class="col-lg-8">
                    <div class="login-dark">
                        <form action="/login" method="post" role="form">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <img class="p-0" src="assets/img/logo.png" alt="Marketplace Services" style="width: 200px; filter: drop-shadow(2px 2px 2px white) !important;">
                            </div>
                            <div class="illustration">
                                <i class="icon ion-ios-locked-outline"></i>
                            </div>
                            <div class="form-group">
                                <input class="form-control text-dark" type="email" name="email" placeholder="Email"  value="{{old('email')}}">
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <input class="form-control text-dark" type="password" name="password" placeholder="Password"  value="{{old('password')}}">
                                @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button class="btn btn-primary btn-block py-1 px-2" type="submit">Log In</button>
                            </div>
                            <a href="#" class="forgot mt-3">Forgot your email or password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
       
       
@include('LandingPage.partials.sections')

@include('LandingPage.partials.footer')