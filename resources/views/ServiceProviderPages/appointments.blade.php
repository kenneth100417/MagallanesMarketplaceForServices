@include('ServiceProviderPages.partials.header')


<main>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Appointments</h3>
        </div>
        <div>
            <div class="input-group mt-4 px-4">
                <input class="form-control " type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
    <hr class="bg-dark mx-3"/>
    
    <div class="card mb-4 mx-3">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
            List of Services
            </div>
            {{-- <div>
                <a class="align items-center"><i class="fas fa-plus-square text-success" style="cursor: pointer; font-size: 24px"></i> </a>
            </div> --}}
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Appointment ID</th>
                        <th scope="col">Client's Name</th>
                        <th scope="col">Service</th>
                        <th scope="col">Schedule</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MMS-APT_1</td>
                        <td>Juan de La Crus</td>
                        <td style="max-width: 200px;">Coputer Repair</td>
                        <td>15/10/2023 4pm</td>
                        <td class="text-danger">To Serve</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main

@include('ServiceProviderPages.partials.footer'),