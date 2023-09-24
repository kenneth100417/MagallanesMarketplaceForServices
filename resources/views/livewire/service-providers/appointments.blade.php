<div>
    <div class="card mb-1 mx-3" style="min-height: 70vh">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
            List of Appointments
            </div>
            
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Appointment ID</th>
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
                        <td class="overflow-auto" style="max-width: 150px;" >{{$appointment->service->service_title}}</td>
                        <td style="max-width: 150px;">{{date("F d, Y",strtotime($appointment->start_date))}}</td>
                        <td>&#8369;{{number_format($appointment->service->service_rate,2)}}</td>
                        <td class="{{$appointment->status == 'pending' ? 'text-success':'text-warning'}}" style="min-width: 98px;">{{$appointment->status == 'pending' ? 'pending':'completed'}}</td>
                        <td style="max-width: 150px;">
                            <div class="d-flex align-items-center">

                                <button class="btn btn-success btn-sm py-1 px-3 mx-1 my-auto" style="min-width: 90px !important">Completed</button>
                                
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
</div>
