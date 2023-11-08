<div>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Customers</h3>
        </div>
        <div>
            <div class="input-group mt-4 px-4">
                <input class="form-control " type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" wire:model="searchTerm" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button" wire:click="search()"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
    <hr class="bg-dark mx-3"/>
    <div class="card mb-4 mx-3">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
            List of Customers
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
                            <td class="{{$customer->status == '1' ? 'text-success':'text-danger'}}" style="width: 100px">{{$customer->status == '1' ? 'Active':'Inactive'}}</td>
                            <td class="text-danger d-flex" style="width: 120px">
                                <button class="btn btn-danger btn-sm py-1 px-3 mx-1 w-100" style="display:{{$customer->status == '1' ? '':'none'}}"  wire:click.prevent = 'block({{$customer->id}})'>Block</button>
                                <button class="btn btn-success btn-sm py-1 px-3 mx-1 w-100" style="display:{{$customer->status == '1' ? 'none':''}}"  wire:click.prevent = 'activate({{$customer->id}})'>Activate</button>
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
