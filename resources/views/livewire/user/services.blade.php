<div>
    <div class="d-flex justify-content-between mb-0">
        <div>
            <h3 class="text-dark mt-4 mx-4">Services</h3>
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
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>{{$service->service_title}}</h5>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <div class="text-warning mb-1 me-2">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <span>310</span>
                                            </div>
                                        </div>
                                     
                                        <h6 class="text-dark">{{$service->serviceProviders->business_name}}</h6>
                                        <h6 class="text-success mt-3">Service Description</h6>
                                        <div class="mb-2 text-muted small">
                                            <p class="mb-4 mb-md-0">
                                            {{$service->service_description}}
                                            </p>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-4 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">&#8369;{{number_format($service->service_rate,2)}}</h4>
                                        </div>
                                        <h6 class="text-success">Rate per Service</h6>
                                        <div class="d-flex flex-column mt-4">
                                            <button type="submit" class="btn btn-primary btn-sm" >Set Appointment</button>
                                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">View Service Provider's datails</button>
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
