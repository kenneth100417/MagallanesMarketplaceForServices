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
                                        <h4 class="mb-1 me-1">&#8369;{{number_format($service->service_rate,2)}} <span class="text-primary">|</span> <small style="font-size: 16px">{{$remainingSlot}}/{{$service->slot}} {{$remainingSlot > 1 ? 'Slots Available':'Slot Available'}}</small></h4>
                                    </div>
                                    <h6 class="text-success">Rate per Service</h6>
                                    <div class="d-flex flex-column mt-4">
                                        {{-- <form action="/set_appointment/{{$service->id}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm w-100" >Set Appointment</button>
                                        </form> --}}
                                        {{-- <button class="btn btn-outline-primary btn-sm mt-2" type="button">View Service Provider's details</button> --}}
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary btn-sm mt-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                View Service Provider's details
                                            </button>
                                            <ul class="dropdown-menu px-2">
                                                <li>
                                                    <label style="font-weight: bold">Business Name:</label><br/> 
                                                    <span class="mx-3">{{$service->serviceProviders->business_name}}</span>
                                                </li>
                                                <li class="mt-2">
                                                    <label style="font-weight: bold">Business Address:</label><br/>  
                                                    <span class="mx-3"> {{$service->serviceProviders->business_address}}</span>
                                                </li>
                                                <li class="mt-2">
                                                    <label style="font-weight: bold">Business Owner's Name:</label><br/>  
                                                    <span class="mx-3">{{$service->serviceProviders->firstname}} {{$service->serviceProviders->lastname}}</span>
                                                </li>
                                                <li class="mt-2">
                                                    <label style="font-weight: bold">Contact Number:</label><br/> 
                                                    <span class="mx-3">{{$service->serviceProviders->mobile_number}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay',
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
                    var start_date = moment(start).format('YYYY-MM-DD');
                    var end_date = moment(end).format('YYYY-MM-DD');
                    $('#start_date').val(start_date);
                    $('#end_date').val(end_date);

                    $('#form').submit();
                    
                });
            },
        });

        $('.fc-event').css('height','80px');
        $('.fc-body tr td').css('cursor','pointer');
        $('.fc-event').css('text-align','center');
        $('.fc-title').css('white-space','normal');
        $('.fc-time').css('display','none');
        $('.fc-content').css('padding','10px 0px');
   
    </script>
</main

@include('UserPages.partials.footer')