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
                        <th scope="col">Service Title</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Service Rate</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $appointment)
                        <tr>
                            <td class="overflow-auto" style="max-width: 150px;" >{{$appointment->service->service_title}}</td>
                            <td style="max-width: 150px;">{{date("F d, Y",strtotime($appointment->start_date))}}</td>
                            <td>&#8369;{{number_format($appointment->service->service_rate,2)}}</td>
                            <td class="{{$appointment->status == 'pending' ? 'text-success':'text-warning'}}" style="min-width: 98px;">{{$appointment->status == 'pending' ? 'pending':'completed'}}</td>
                            <td style="max-width: 150px;">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-success btn-sm py-1 px-3 mx-1 " style="min-width: 90px !important; display:{{$appointment->status == 'served' ? 'none !important':''}}" onclick="location.href='{{url('/set_appointment/'.$appointment->service_id)}}'" >Edit</button>
                                    <button class="btn btn-danger btn-sm py-1 px-3 mx-1" wire:click = 'Cancel({{$appointment->id}})' style="display:{{$appointment->status == 'served' ? 'none':''}}">Cancel</button>
                                    <button class="btn btn-warning btn-sm py-1 px-3 mx-1" style="display:{{$appointment->status == 'served' ? 'block':'none'}}" wire:click="setRateID({{$appointment->service_id}})">Rate Service</button>

                                    
                                </div>
                            </td>
                        </tr>
                        <!-- Rating Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/rate_service/{{$rateID}}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Rate Service</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="rating d-flex flex-row-reverse justify-content-center ">
                                            <input type="radio" id="star5" name="rating" value="5">
                                            <label for="star5"><i class="fa fa-star fa-lg"></i></label>
                                            <input type="radio" id="star4" name="rating" value="4">
                                            <label for="star4"><i class="fa fa-star fa-lg"></i></label>
                                            <input type="radio" id="star3" name="rating" value="3">
                                            <label for="star3"><i class="fa fa-star fa-lg"></i></label>
                                            <input type=radio id="star2" name="rating" value="2">
                                            <label for="star2"><i class="fa fa-star fa-lg"></i></label>
                                            <input type=radio id="star1" name="rating" value="1" checked>
                                            <label for="star1"><i class="fa fa-star fa-lg"></i></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
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
