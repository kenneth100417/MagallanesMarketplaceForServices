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
                        <th scope="col">Customer Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Document</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->business_address}}</td>
                            <td style="max-width: 200px;">
                                {{$customer->document_type}}<br/>
                                <a href="{{$customer->document}}" download>View Document</a>
                            </td>
                            <td class="
                            {{$customer->status == '0' ? 'text-danger':''}}
                            {{$customer->status == '1' ? 'text-success':''}}
                            {{$customer->status == '2' ? 'text-danger':''}}
                            ">
                            {{$customer->status == '0' ? 'Unverified':''}}
                            {{$customer->status == '1' ? 'Verified':''}}
                            {{$customer->status == '2' ? 'Blocked':''}}
                            </td>
                            <td class="text-danger d-flex flex-column justify-content-center" style="max-width: 120px;">
                                <button class="btn btn-danger btn-sm py-1 px-3 mx-1"  style="display:{{$customer->status == '1' ? 'block':'none'}}" wire:click.prevent = 'block({{$customer->user_id}})'>Block</button>
                                <button class="btn btn-success btn-sm py-1 px-3 mx-1" style="display:
                                {{$customer->status == '0' ? 'block':''}}
                                {{$customer->status == '1' ? 'none':''}}
                                {{$customer->status == '2' ? 'block':''}}
                                " wire:click.prevent = 'activate({{$customer->user_id}})'>Activate</button>
                                <button class="btn btn-danger btn-sm py-1 px-3 mx-1 my-1" style="display:{{$customer->status == '0' ? 'block':'none'}}" wire:click.prevent = 'decline({{$customer->user_id}})'>Decline</button>
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
