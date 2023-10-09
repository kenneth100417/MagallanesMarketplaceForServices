<div>
    <div class="card mb-4 mx-3">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
            List of Service Providers
            </div>
            {{-- <div>
                <a class="align items-center"><i class="fas fa-plus-square text-success" style="cursor: pointer; font-size: 24px"></i> </a>
            </div> --}}
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Service Provider ID</th>
                        <th scope="col">Owner's Name</th>
                        <th scope="col">Business Name</th>
                        <th scope="col">Business Address</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($serviceProviders as $serviceProvider)
                        <tr>
                            <td style="max-width: 50px;">MMS-SP{{$serviceProvider->id}}</td>
                            <td>{{$serviceProvider->firstname}} {{$serviceProvider->lastname}}</td>
                            <td>{{$serviceProvider->business_name}}</td>
                            <td style="max-width: 200px;">{{$serviceProvider->business_address}}</td>
                            <td class="{{$serviceProvider->status == '1' ? 'text-success':'text-danger'}}">{{$serviceProvider->status == '1' ? 'Verified':'Unverified'}}</td>
                            <td class="text-danger d-flex" style="max-width: 120px;">
                                <button class="btn btn-danger btn-sm py-1 px-3 mx-1"  style="display:{{$serviceProvider->status == '1' ? 'block':'none'}}" wire:click.prevent = 'block({{$serviceProvider->id}})'>Deactivate</button>
                                <button class="btn btn-success btn-sm py-1 px-3 mx-1" style="display:{{$serviceProvider->status == '0' ? 'block':'none'}}" wire:click.prevent = 'activate({{$serviceProvider->id}})'>Activate</button>
                            </td>
                        </tr>
                    @empty
                        <div class="text-center">No Service Providers Found.</div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
