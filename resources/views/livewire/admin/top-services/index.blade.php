<div>
    <div class="card mb-4 mx-3">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
            List of Top Services
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Service ID</th>
                        <th scope="col">Service Title</th>
                        <th scope="col">Service Provider</th>
                        <th scope="col">Service Descripton</th>
                        <th scope="col">Ratings</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($topServices as $service)
                        <tr>
                            <td style="max-width: 50px;">MMS_{{$service->id}}</td>
                            <td>{{$service->service_title}}</td>
                            <td>{{$service->service_provider}}</td>
                            <td style="max-width: 200px;">{{$service->service_description}}</td>
                            <td>
                                @for($i = 1; $i <= number_format($service->average_rating); $i++)
                                <i class="fa fa-star checked"></i>
                                @endfor
                                @for($i = number_format($service->average_rating)+1; $i <= 5; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </td>
                            
                        </tr>
                    @empty
                        <div class="text-center">No Service Found.</div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
