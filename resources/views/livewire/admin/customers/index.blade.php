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
                        <th scope="col">Customer ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td style="max-width: 50px;">MMS-C{{$customer->id}}</td>
                            <td>{{$customer->firstname}} {{$customer->lastname}}</td>
                            <td>{{$customer->address}}</td>
                            <td style="max-width: 200px;">{{$customer->mobile_number}}</td>
                            <td class="{{$customer->status == '1' ? 'text-success':'text-danger'}}">{{$customer->status == '1' ? 'Active':'Inactive'}}</td>
                            <td class="text-danger d-flex" style="max-width: 120px;">
                                <button class="btn btn-danger btn-sm py-1 px-3 mx-1" {{$customer->status == '1' ? '':'disabled'}} wire:click.prevent = 'block({{$customer->id}})'>Block</button>
                                <button class="btn btn-success btn-sm py-1 px-3 mx-1" {{$customer->status == '1' ? 'disabled':''}} wire:click.prevent = 'activate({{$customer->id}})'>Activate</button>
                            </td>
                        </tr>
                    @empty
                        <div class="text-center">No Customers Found.</div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
