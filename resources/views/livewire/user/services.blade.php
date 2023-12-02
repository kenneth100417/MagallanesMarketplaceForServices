<div>
    <div class="d-flex justify-content-between mb-0">
        <div>
            <h3 class="text-dark mt-4 mx-4">Discover Services</h3>
        </div>
        <div class="d-flex">
            <div class="input-group mt-4 px-4">
                <input wire:model.live="search" name="search" id="search" class="form-control " type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button" x-on:click="$dispatch('search')"><i class="fas fa-search" ></i></button>
            </div>
            
        </div>
    </div>
    <hr class="bg-dark mx-3"/>
    <section style="background-color: #eee;">
       
        <div class="container py-5">
            
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

                                            

                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <div class="d-flex">
                                                        <h6 class="text-success">Service Provider:</h6>
                                                        <h6 class="text-dark mx-2">{{$service->serviceProviders->business_name}}</h6>
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
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center">
                                                    <small for=""><span style="font-weight: bold" class="text-success">Avialable: </span> {{$service->openDays}} <span style="font-weight: bold"> | </span> {{Carbon\Carbon::createFromTimestamp(strtotime($service->openTime))->format('h:i A')}} - {{Carbon\Carbon::createFromTimestamp(strtotime($service->closingTime))->format('h:i A')}}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="d-flex">
                                                    <small for=""></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-4 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">&#8369;{{number_format($service->service_rate,2)}}</h4>
                                        </div>
                                        <h6 class="text-success">Average Rate Per Service</h6>
                                        <div class="d-flex flex-column mt-4">
                                            <form action="/set_appointment/{{$service->id}}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm w-100" >Set Appointment</button>
                                            </form>
                                                <a class="btn btn-outline-primary btn-sm mt-2 w-100" href="{{url('/service_provider_profile/'.$service->serviceProviders->user_id)}}">View Service Provider's Profile</a>
                                  
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


       
    </section>
</div>
