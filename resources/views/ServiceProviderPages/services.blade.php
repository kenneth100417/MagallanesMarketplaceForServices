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

    <div class="card mb-1 mx-3" style="min-height: 70vh">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
            List of Services
            </div>
            <div>
                <a  class="align items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus-square text-success" style="cursor: pointer; font-size: 24px"></i> </a>
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
                        <th scope="col">Maximum Service Time</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MMS_1</td>
                        <td>Computer Repair</td>
                        <td style="max-width: 200px;">Computer Hardware and Software troubleshooting</td>
                        <td>&#8369;350.00</td>
                        <td style="max-width: 50px;">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select Service Time</option>
                                <option value="1">1 HOUR</option>
                                <option value="2">2 HOURS</option>
                                <option value="3">3 HOURS</option>
                                <option value="4">4 HOURS</option>
                                <option value="5">5 HOURS</option>
                                <option value="6">6 HOURS</option>
                                <option value="7">7 HOURS</option>
                                <option value="8">8 HOURS</option>
                            </select>
                        </td>
                        <td class="text-success">Available</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
       
    </div>
    
   
    
    


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="">
                        <div class="row">
                            {{-- Form --}}
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="service">Service Title</label>
                                    <input type="text" class="form-control" id="service" placeholder="Enter service title">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="description">Service Description</label>
                                    <textarea class="form-control" id="service" placeholder="Enter service description"></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="description">Service Schedule Availability</label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">Sun</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                        <label class="form-check-label" for="defaultCheck2">Mon</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                        <label class="form-check-label" for="defaultCheck3">Tues</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                        <label class="form-check-label" for="defaultCheck4">Wed</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                                        <label class="form-check-label" for="defaultCheck5">Thu</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck6">
                                        <label class="form-check-label" for="defaultCheck6">Fri</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck7">
                                        <label class="form-check-label" for="defaultCheck7">Sat</label>
                                    </div>
                                    <div class="input-group input-group-outline mb-2 date" id="datepicker">
                                        <input placeholder="Date" data-format="dd/mm/yy hh/mm" name="date" id="date" type="text" class="form-control" value="" required>
                                        <span class="input-group-append">
                                          <span class="input-group-text mx-2">
                                            <i class="fa fa-calendar"></i>
                                          </span>
                                        </span>
                                    </div>
                                    <div>
                                        <input type="time">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
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
