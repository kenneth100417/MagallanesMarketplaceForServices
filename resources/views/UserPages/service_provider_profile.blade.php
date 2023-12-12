@include('UserPages.partials.header')


<main>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Service Provider Profile</h3>
        </div>
    </div>
    <hr class="bg-dark mx-3"/>
    <div class="container" >
        <div class="row gutters-sm" >
            <div class="col-md-4 mb-3">
                <div class="card" >
                    <div class="card-body mt-4 mb-3" >
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{url($serviceProvider->photo)}}" alt="Service Provider" class="rounded-circle"  width="180" height="180" style="object-fit: cover">

                            <div class="mt-3">
                                <h4>{{$serviceProvider->business_name}}</h4>
                                <p class="text-secondary mb-1">ID: MMS-SP{{$serviceProvider->user_id}}</p>
                                <p class="text-muted font-size-sm">{{$serviceProvider->business_address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" >
                <div class="card mb-3" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 text-primary">Business Profile</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Business Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$serviceProvider->business_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Owner's Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$serviceProvider->firstname}} {{$serviceProvider->lastname}} 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$serviceProvider->user->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile Number</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$serviceProvider->mobile_number}}
                            </div>
                         </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Business Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$serviceProvider->business_address}}
                            </div>
                        </div>
                        <hr>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-12" >
                <div class="card mb-3" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 text-primary">List of Services Available</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="container">
            
                            @forelse ($services as $service)
                                <div class="row justify-content-center mb-3">
                                    <div class="col-md-12 col-xl-10">
                                        <div class="card shadow-0 border rounded-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-8 col-xl-8">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-7">
                                                                    <h5>{{$service->service_title}}</h5>
                                                                </div>
                                                                <div class="d-flex justify-content-end flex-row col-sm-12 col-md-12 col-lg-5">
                                                                    <span>{{$service->rating_count}} ratings | </span>
                                                                    <div class=" mb-1 ms-2">
                                                                        @for($i = 1; $i <= number_format($service->avg_rating); $i++)
                                                                            <i class="fa fa-star checked"></i>
                                                                        @endfor
                                                                        @for($i = number_format($service->avg_rating)+1; $i <= 5; $i++)
                                                                            <i class="fa fa-star"></i>
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h6 class="text-success">Service Description</h6>
                                                                    <div class="mb-2 text-muted small">
                                                                        <p class="mb-4 mb-md-0">
                                                                        {{$service->service_description}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-4 col-xl-4 border-sm-start-none border-start">
                                                        <div class="d-flex flex-row align-items-center mb-1">
                                                            <h4 class="mb-1 me-1">&#8369;{{number_format($service->service_rate,2)}}</h4>
                                                        </div>
                                                        <h6 class="text-success">Rate per Service</h6>
                                                        <div class="d-flex flex-column mt-4">
                                                            <form action="/set_appointment/{{$service->id}}" method="GET">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary btn-sm w-100" {{$user->status == '0' ? 'disabled':''}}>Set Appointment</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @empty
                                <div class="text-center mt-5">
                                    No Services Found.
                                </div>
                            @endforelse
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main

@include('UserPages.partials.footer')