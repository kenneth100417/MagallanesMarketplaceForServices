<div>
    <div class="card mb-1 mx-3" style="min-height: 70vh">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
            List of Services
            </div>
            <div>
                <button  class="align items-center px-3 py-1 btn btn-sm btn-success  rounded" data-bs-toggle="modal" data-bs-target="#staticBackdrop" {{$user->status == '0' ? 'disabled':''}} ><span class="px-2" style="font-size: 16px">Add Service</span><i class="fa fa-plus text-white text-sm" style="cursor: pointer; font-size: 18px;"  ></i> </button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Service ID</th>
                        <th scope="col">Service Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col" style="max-width: 100px;">Slot per day</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                    <tr>
                        <td>MMS_{{$service->id}}</td>
                        <td class="overflow-auto" style="max-width: 150px;" >{{$service->service_title}}</td>
                        <td style="max-width: 150px;">{{$service->service_description}}</td>
                        <td>&#8369;{{number_format($service->service_rate,2)}}</td>
                        <td style="max-width: 100px;">
                            {{$service->slot}}
                        </td>
                        <td class="{{$service->status == '1' ? 'text-success':'text-danger'}}" style="min-width: 98px;">{{$service->status == '1' ? 'Available':'Unavailable'}}</td>
                        <td style="max-width: 200px;">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-warning btn-sm py-1 px-3 mx-1 my-auto" {{$service->status == '1' ? '':'hidden'}} wire:click.prevent = 'disable({{$service->id}})' style="min-width: 90px !important">Disable</button>
                                <button class="btn btn-success btn-sm py-1 px-3 mx-1 my-auto" {{$service->status == '1' ? 'hidden':''}} wire:click.prevent = 'enable({{$service->id}})' style="min-width: 90px !important">Enable</button>
                                <button class="btn btn-danger btn-sm py-1 px-3 mx-1 my-auto" wire:click.prevent = 'showDeleteConfirmation({{$service->id}})' >Delete</button>
                                <a class="btn btn-info btn-sm py-1 px-3 mx-1 my-auto" href="{{url('/view_service_details/'.$service->id)}}">View</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <div class="text-center mt-5">You don't have services offered yet.</div>
                    @endforelse
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{$services->links()}}
            </div>
            
        </div>
       
    </div>
</div>
