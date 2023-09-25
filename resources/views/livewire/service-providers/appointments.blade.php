<div>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Appointments</h3>
        </div>
        <div>
            <div class="input-group mt-4 px-4">
                <input class="form-control " type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
    <hr class="bg-dark mx-3"/>
    <div class="card mb-1 mx-3" style="min-height: 70vh">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
            List of Appointments
            </div>
            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Showing {{$sort == '' ? 'All':$sort}}

                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" wire:click.prevent = "showPending()">Pending</a></li>
                      <li><a class="dropdown-item" wire:click.prevent = "showServed()">Served</a></li>
                      <li><a class="dropdown-item" wire:click.prevent = "showExpired()">Expired</a></li>
                      <li><a class="dropdown-item text-center" wire:click.prevent = "showAll()">Show All</a></li>
                    </ul>
                </div>
                <button class="btn btn-success btn-sm mx-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-calendar-alt"></i> Calendar</button>
                <button class="btn btn-info btn-sm " wire:click.prevent = "showToday()">Today's Schedule</button>
               
            </div>
            
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Appointment ID</th>
                        <th scope="col">Customer's Name</th>
                        <th scope="col">Service Title</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Service Rate</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $appointment)
                    <tr>
                        <td>MMS_APPT{{$appointment->id}}</td>
                        <td class="overflow-auto" style="max-width: 150px;" >{{$appointment->customer->firstname}} {{$appointment->customer->lastname}}</td>
                        <td class="overflow-auto" style="max-width: 150px;" >{{$appointment->service->service_title}}</td>
                        <td style="max-width: 150px;">{{date("F d, Y",strtotime($appointment->start_date))}}</td>
                        <td>&#8369;{{number_format($appointment->service->service_rate,2)}}</td>
                        <td class="
                        {{$appointment->status == 'pending' ? 'text-success':''}}
                        {{$appointment->status == 'served' ? 'text-primary':''}}
                        {{$appointment->status == 'expired' ? 'text-danger':''}}
                        " style="min-width: 98px;">
                            {{$appointment->status == 'pending' ? 'Pending':''}}
                            {{$appointment->status == 'served' ? 'Served':''}}
                            {{$appointment->status == 'expired' ? 'Expired':''}}
                        </td>
                        <td style="max-width: 150px;">
                            <div class="d-flex align-items-center">

                                <button class="btn btn-success btn-sm py-1 px-3 mx-1 my-auto" style="min-width: 90px !important;{{$appointment->status == 'pending' ? '':'display:none'}}" wire:click.prevent = "completed({{$appointment->id}})">Served</button>
                                <small>{{$appointment->status == 'pending' ? '':'No action needed'}}</small>
                                
                            </div>
                        </td>
                    </tr>
                    @empty
                        <div class="text-center mt-5">You don't have an appointment yet.</div>
                    @endforelse
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{$appointments->links()}}
            </div>
            
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Appointment Calendar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
            
        </div>
        </div>
    </div>






    
</div>
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

       
        $('.fc-body tr td').css('cursor','pointer');
        $('.fc-event').css('text-align','center');
        $('.fc-event').css('height','80px');
        $('.fc-title').css('white-space','normal');
        $('.fc-time').css('display','none');
        $('.fc-content').css('padding','10px 0px');
        

        $('.modal').focus(function(){
            $('.fc-month-button').trigger('click');
        });
   
    </script>