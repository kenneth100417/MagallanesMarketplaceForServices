@include('AdminPages.partials.header')


<main>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Home</h3>
        </div>
    </div>
    <hr class="bg-dark mx-3"/>
    <div class="">
        <div class="container-fluid px-4 d-flex flex-column justify-content-between">
            <div class="row">
                <div class="text-center" style="margin-top: -3% !important;">
                    <img class="px-0" src="assets/img/logo.png" alt="Marketplace Services" style="max-width: 100%; filter: drop-shadow(2px 2px 2px white) !important;">
                    <h3><blockquote style="font-style: italic; margin-top: -20px; margin-bottom:50px">"A better way to discover services."</blockquote></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <a class="text-white" href="{{url('/admin_top_services')}}" style="text-decoration: none;">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Top Services</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link text-start" href="{{url('/admin_top_services')}}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                    <a class="text-white" href="{{url('/admin_customers')}}" style="text-decoration: none;">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Customers</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link text-start" href="{{url('/admin_customers')}}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                   <a class="text-white" href="{{url('/admin_service_providers')}}" style="text-decoration: none;">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Service Providers</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{url('/admin_service_providers')}}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                   </a>
                </div>
            </div>
        </div>
    </div>
</main

@include('AdminPages.partials.footer')