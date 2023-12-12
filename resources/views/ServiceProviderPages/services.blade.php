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
        
        <div class="modal-dialog modal-dialog-centered">
           
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
                                        <input name="service_title" type="text" class="form-control" placeholder="Enter service title">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="description">Service Description</label>
                                        <textarea name="service_description" class="form-control" placeholder="Enter service description"></textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="service">Open Hour Per Day</label>
                                        <div class="input-group mb-3">
                                            <input type="time" class="form-control" id="start-time" name="openTime">
                                            <span class="input-group-text">to</span>
                                            <input type="time" class="form-control" id="end-time" name="closingTime">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="service">Days Available in a Week</label>
                                        <select class="selectpicker form-control" multiple aria-label="size 3 select example">
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select>
                                        <input hidden name="openDays" id="days">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="service">Average Rate Per Service</label>
                                        <input name="service_rate" type="number" class="form-control" >
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="service">Slot per day</label>
                                        <input name="slot" type="number" class="form-control" id="serviceSlot" placeholder="Maximum Slot allowed: 100">
                                    </div>
                                </div>

                            </div>
                        
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Submit</button>
                </div>
                </form>
            </div>
                
        </div>
    </div>
    <!-- {{-- datetimepicker --}} -->
    <script type="text/javascript">


        $('#date').datepicker({
                startDate: '+2d',
                todayHighlight: true
           });

        var slotInput = document.getElementById('serviceSlot');
        var submitBtn = document.getElementById('submitBtn');

        slotInput.addEventListener('change', function(){
            submitBtn.disabled = true;

            if(slotInput.value > 100 ){
                Swal.fire({
                title: 'Warning!',
                text: "Maximum slot allowed is 100.",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
                }).then((result) => {
                if (result.isConfirmed) {
                    slotInput.value = '';
                    submitBtn.disabled = true
                }
                })
            }else{
            submitBtn.disabled = false;

            }
        });


        // check valid time range


        let startTime = document.getElementById('start-time');
        let endTime = document.getElementById('end-time');

        endTime.addEventListener('change', function(){
                
            if(startTime.value > endTime.value){
                Swal.fire({
                    title: "Oop!",
                    text: "Invalid Time Range",
                    icon: 'info',
                    showConfirmButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        startTime.value = "";
                        endTime.value = "";

                    }
                })
            }
        })

        //set days value
        $('.selectpicker').change(function () {
            let days = $('.selectpicker').val();
            $('#days').val(days);   
        });

    </script>
    
    

    
</main

@include('ServiceProviderPages.partials.footer')
