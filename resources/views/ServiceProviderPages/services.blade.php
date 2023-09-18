@include('ServiceProviderPages.partials.header')


<main>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Services</h3>
        </div>
        <div>
            <div class="input-group mt-4 px-4">
                <input class="form-control " type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
    <hr class="bg-dark mx-3"/>

    <livewire:service-providers.services/>
    
   
    
    


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
           
            <div class="modal-content">
                <form action="{{url('/addService')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                    
                            <div class="row">
                                {{-- Form --}}
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="service">Service Title</label>
                                        <input name="service_title" type="text" class="form-control" id="service" placeholder="Enter service title">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="description">Service Description</label>
                                        <textarea name="service_description" class="form-control" id="service" placeholder="Enter service description"></textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="service">Service Rate</label>
                                        <input name="service_rate" type="number" class="form-control" id="service" placeholder="Enter service rate">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="description">Service Time</label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <select name="service_time" class="form-select" aria-label="Default select example">
                                            <option selected>Select Service Time</option>
                                            <option value="1">1 Hour</option>
                                            <option value="2">2 Hours</option>
                                            <option value="3">3 Hours</option>
                                            <option value="4">4 Hours</option>
                                            <option value="5">5 Hours</option>
                                            <option value="6">6 Hours</option>
                                            <option value="7">7 Hours</option>
                                            <option value="8">8 Hours</option>
                                        </select>
                                        {{-- <div class="input-group input-group-outline mb-2 date" id="datepicker">
                                            <input placeholder="Date" data-format="dd/mm/yy hh/mm" name="date" id="date" type="text" class="form-control" value="" required>
                                            <span class="input-group-append">
                                            <span class="input-group-text mx-2">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            </span>
                                        </div>
                                        <div>
                                            <input type="time">
                                        </div> --}}
                                    </div>
                                </div>

                            </div>
                        
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
                
        </div>
    </div>
    {{-- datetimepicker --}}
    <script type="text/javascript">
        $('#date').datepicker({
            
                startDate: '+2d',
                todayHighlight: true
            
           });
      </script>

    
</main

@include('ServiceProviderPages.partials.footer')
