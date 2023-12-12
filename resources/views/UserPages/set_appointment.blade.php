@include('UserPages.partials.header')


<main>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Set Appointment</h3>
        </div>
        <div>
            <div class="input-group mt-4 px-4">
                <input class="form-control " type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
    <hr class="bg-dark mx-3"/>

    <section style="background-color: #eee;">
        <div class="container py-5">
            {{-- service details --}}
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
                                                    <span>{{$serviceReviews->count()}} {{$serviceReviews->count() > 1 ? 'ratings':'rating'}} | </span>
                                                    <div class=" mb-1 ms-2">
                                                        @for($i = 1; $i <= number_format($avg_rating); $i++)
                                                            <i class="fa fa-star checked"></i>
                                                        @endfor
                                                        @for($i = number_format($avg_rating)+1; $i <= 5; $i++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                    </div>
                                                    
                                                </div>
                                            
                                        </div>
                                    
                                        <div class="row">
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
                                                <small for=""><span style="font-weight: bold" class="text-success">Available: </span> {{$service->openDays}} <span style="font-weight: bold"> | </span> {{Carbon\Carbon::createFromTimestamp(strtotime($service->openTime))->format('h:i A')}} - {{Carbon\Carbon::createFromTimestamp(strtotime($service->closingTime))->format('h:i A')}}</small>
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
                                        
                                            <a class="btn btn-outline-primary btn-sm mt-2 w-100" href="{{url('/service_provider_profile/'.$service->serviceProviders->user_id)}}">View Service Provider's Profile</a>
                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- calendar --}}
            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div id="calendar">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Comments --}}
            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <h5 class="mt-3">Service Customer Reviews:</h5>
                    @forelse ($reviews as $review)
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-7">
                                                <div class="d-flex align-items-center">
                                                    <img class="rounded-circle" src="{{url($review->photo)}}" style="width: 40px;height:40px;"/>
                                                    <h5 class="mx-2">{{$review->fname." ".$review->lname}}</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end flex-row col-sm-12 col-md-12 col-lg-5">
                                                <span>Rating : </span>
                                                <div class=" mb-1 ms-2">
                                                    @for($i = 1; $i <= number_format($review->star); $i++)
                                                        <i class="fa fa-star checked"></i>
                                                    @endfor
                                                    @for($i = number_format($review->star)+1; $i <= 5; $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h6 class="text-success">Comment:</h6>
                                            <div class="mb-2 text-muted small">
                                                <p class="mb-4 mb-md-0">
                                                    {{$review->comment}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div>No Reviews Yet.</div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="appointmentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirm Appointment Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{url('/add_appointment')}}" id="form">
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                {{-- Form --}}
                            
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="service">Customer Name</label>
                                        <input name="customer_name" type="text" class="form-control" id="customer_name" placeholder="Enter service title" value="{{$user->firstname}} {{$user->lastname}}" readonly>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="service">Service</label>
                                        <input name="service_title" type="text" class="form-control" id="service" placeholder="Enter service title" value="{{$service->service_title}}" readonly>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="service">Service description</label>
                                        <textarea class="form-control" name="" id="" cols="30" rows="3" readonly>{{$service->service_description}}</textarea>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <h6 for="service">Service rate:<span class="ms-2"> &#8369;{{number_format($service->service_rate,2)}}</span></h6>
                                    </div>
                                    
                                    <input type="hidden" name="start_date" id="start_date">
                                    <input type="hidden" name="end_date" id="end_date">
                                    <input type="hidden" name="service_id" value="{{$service->id}}">
                                    <input type="hidden" name="service_provider_id" value="{{$service->service_provider_id}}">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveBtn">Confirm</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <script>

        var appointment = @json($events);
        $('#calendar').fullCalendar({
            header: {
                right: 'prev, next today',
                center: 'title',
                left: 'none', //month, agendaWeek, agendaDay
            },
            events: appointment,
            selectable: true,
            selectAllow: function (selectInfo) {
                var currentDate = new Date(); // Get the current date
                currentDate.setHours(0, 0, 0, 0); // Set hours, minutes, seconds, and milliseconds to 0 for accurate date comparison
                //currentDate.setDate(currentDate.getDate() + 1); // Set the current date to the day after the current date
                var selectedDate = selectInfo.start;
            
                return selectedDate >= currentDate;    
            },
            selectHelper: true,
            defaultView: 'month',
            select: function(start, end, allDays, info){
                $('#appointmentModal').modal('toggle');
                $('#saveBtn').click(function(){
                    var start_date = moment(start).format('YYYY-MM-DD HH:mm:ss');
                    var end_date = moment(end).format('YYYY-MM-DD HH:mm:ss');
                    $('#start_date').val(start_date);
                    $('#end_date').val(end_date);
                    $('#form').submit(); 
                });
            },
        });

        $('.fc-body tr td').css('cursor','pointer');
        $('.fc-content-skeleton table tbody').css('overflow-y','scroll');
        $('.fc-event').css('text-align','center');
        $('.fc-event').css('height','20px');
        $('.fc-title').css('white-space','nowrap');
        $('.fc-content').css('align-items','center');
        $('.fc-time').css('display','none');
        $('.fc-content').css('padding','0px 3px');
        $('.fc-content').css('text-align','left');
   
    </script>
</main

@include('UserPages.partials.footer')