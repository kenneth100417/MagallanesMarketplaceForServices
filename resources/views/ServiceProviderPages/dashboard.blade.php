@include('ServiceProviderPages.partials.header')


<main>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Home</h3>
        </div>
        <div>
            {{-- <div class="input-group mt-4 px-4">
                <input class="form-control " type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div> --}}
        </div>
    </div>
    <hr class="bg-dark mx-3"/>
    <div class="">
        <div class="container-fluid px-4 d-flex flex-column justify-content-between">
            <div class="row">
                <div class="text-center">
                    <img class="px-0" src="assets/img/logo.png" alt="Marketplace Services" style="width: 730px; filter: drop-shadow(2px 2px 2px white) !important; margin-top: -50px;">
                    <h3><blockquote style="font-style: italic; margin-top: -20px;margin-bottom:50px">"A better way to discover services."</blockquote></h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-4 col-md-6">
                    <a class="text-white" href="{{url('/service_provider_top_services')}}" style="text-decoration: none;">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Top Services</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{url('/service_provider_top_services')}}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                    <a class="text-white" href="{{url('/service_provider_services')}}" style="text-decoration: none;">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Services Offered</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{url('/service_provider_services')}}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                    <a class="text-white" href="{{url('/service_provider_appointments')}}" style="text-decoration: none;">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Appointments</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{url('/service_provider_appointments')}}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</main

@include('ServiceProviderPages.partials.footer'),