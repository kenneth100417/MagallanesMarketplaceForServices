@include('ServiceProviderPages.partials.header')


<main>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Profile</h3>
        </div>
    </div>
    <hr class="bg-dark mx-3"/>
    <div class="container" >
        <div class="row gutters-sm" >
            <div class="col-md-4 mb-3">
                <div class="card" >
                    <div class="card-body mt-5 mb-5" >
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{$user->photo}}" alt="Service Provider" class="rounded-circle"  width="180" height="180" style="object-fit: cover">

                            <form action="{{url('change_sp_profile_pic')}}" id="change-profile-pic-form" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="image/png, image/gif, image/jpeg" name="photo" id="profile-pic-input" hidden>
                            </form>

                            <div class="mt-3">
                                <h4>{{$user->business_name}}</h4>
                                <p class="text-secondary mb-1">ID: MMS-SP{{$user->user_id}}</p>
                                <p class="text-muted font-size-sm">{{$user->business_address}}</p>
                                <div class="d-flex flex-column">
                                    <div >
                                        <button type="button" class="btn btn-sm btn-success" style="display: {{$user->status == 1 ? '':'none'}}">Verified <i class="fa fa-check" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" style="display: {{$user->status == 1 ? 'none':''}}"  data-bs-toggle="modal" data-bs-target="#submitVerReq">Submit Verification Request</button>
                                    </div>
                                    <div class="my-2">
                                        <button type="button" onclick="uploadProfilePic()" class="btn btn-sm btn-outline-primary">Change Profile Picture</button>
                                        @error('photo')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" >
                <div class="card mb-3" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 text-primary">Business Profile</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Business Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->business_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Owner's Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->firstname}} {{$user->lastname}} 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile Number</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->mobile_number}}
                            </div>
                         </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Business Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->business_address}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 mt-3">
                                <h5 class="mb-0 text-primary">Account Information</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->user->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Account Type</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->user->access == 'admin' ? 'Admin':''}}
                                {{$user->user->access == 'service_provider' ? 'Service Provider':''}}
                                {{$user->user->access == 'customer' ? 'Customer':''}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#changePassword" >Change Password</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-5">
                            <div class="col-sm-12 text-end me-4 mb-3">
                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Edit Profile Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('/edit_sp_profile')}}" method="POST" id="profile-update-form">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row ">
                                <div class="col-md-12">
                                    <h6 class="mb-2">Business Name</h6>
                                <div class="d-flex justify-content-center">
                                    <input name="business_name" type="text" class="form-control" style="width: 400px !important" value="{{$user->business_name}}" required>
                                    @error('business_name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6 class="mb-2">Owner's Firstname</h6>
                                <div class="d-flex justify-content-center">
                                    <input name="firstname" type="text "  class="form-control" style="width: 400px !important" value="{{$user->firstname}}" required>
                                    @error('firstname')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6 class="mb-2">Owner's Lastname</h6>
                                <div class="d-flex justify-content-center">
                                    <input name="lastname" type="text"  class="form-control" style="width: 400px !important" value="{{$user->lastname}}" required>
                                    @error('lastname')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6 class="mb-2">Mobile Number</h6>
                                <div class="d-flex justify-content-center">
                                    <input name="mobile_number" type="text"  class="form-control" style="width: 400px !important" value="{{$user->mobile_number}}" required>
                                    @error('mobile_number')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6 class="mb-2">Business Address</h6>
                                <div class="d-flex justify-content-center">
                                    <input name="business_address" type="text"  class="form-control" style="width: 400px !important" value="{{$user->business_address}}" required>
                                    @error('business_address')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="profile-update-button" disabled>Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


     <!-- Change Password Modal -->
     <div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('/sp_change_password')}}" method="POST" id="change-password-form">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6 class="mb-2">Current Password</h6>
                                <div class="d-flex justify-content-center">
                                    <input name="current_password" type="password" id="currentPass" class="form-control" style="width: 400px !important" required>
                                </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6 class="mb-2">New Password</h6>
                                <div class="d-flex justify-content-center">
                                    <input name="password" type="password" id="newPass" class="form-control" style="width: 400px !important" required>
                                </div>
                                
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6 class="mb-2">Confirm New Password</h6>
                                <div class="d-flex justify-content-center">
                                    <input name="password_confirmation" type="password" id="confirmNewPass" class="form-control" style="width: 400px !important" required>
                                </div>
                                <p class="text-danger" id="errorMessage"></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="changePassBtn" disabled>Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   
<!-- Modal -->
    <div class="modal fade" id="submitVerReq" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Submit Verification Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <form action="/submitVerificationRequest" method="POST" id="submitVerReqForm" enctype="multipart/form-data">
                            @method('PUT')
                        @csrf
                        <div class="col-lg-12 mt-2">
                            <label style="font-weight: bold;">Owner's Name:</label>
                            <input name="name" type="text" class="form-control" value="{{$user->firstname.' '.$user->lastname}}" readonly>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label style="font-weight: bold;">Business Name:</label>
                            <input name="business_name" type="text" class="form-control" value="{{$user->business_name}}" readonly>
                            @error('business_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label style="font-weight: bold;">Business Address:</label>
                            <input name="business_address" type="text" class="form-control" value="{{$user->business_address}}" readonly>
                            @error('busines_Address')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label style="font-weight: bold;">Type of Document:</label>
                            <select class="form-select" name="document_type">
                                <option selected value="">-- Select document type -- </option>
                                <option value="Business Permit">Business Permit</option>
                                <option value="PhilSys ID">National ID/PhilSys ID</option>
                                <option value="Driver's License">Driver's License</option>
                                <option value="Brgy. Clearance">Brgy. Clearance</option>
                                <option value="Police Clearance">Police Clearance</option>
                                <option value="PhilHealth ID">PhilHealth ID</option>
                                <option value="UMID">UMID</option>
                                <option value="SSS ID">SSS ID</option>
                            </select>
                            @error('document_type')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label style="font-weight: bold;">Upload ID:</label>
                            <input type="file" accept="image/png, image/jpeg, image/jpg, .pdf" class="form-control" name="document">
                            @error('document')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            <small class="text-success">*Accepted file types: .png, .jpeg, .jpg, .pdf</small><br/>
                            <small class="text-success">*Make sure that the document content is readable.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
            </div>
        </div>
    </div>

    <script>

        //edit profile
        var profileUpdateForm =  document.getElementById('profile-update-form');
        var profileUpdateButton =  document.getElementById('profile-update-button');

        profileUpdateForm.addEventListener('change', function(){
            profileUpdateButton.disabled = false;
        });

        //change profile pic
        
        var changeProfilePicForm =  document.getElementById('change-profile-pic-form');
        var profilePicInput =  document.getElementById('profile-pic-input');
        function uploadProfilePic(){
            profilePicInput.click();
        }

        changeProfilePicForm.addEventListener('change', function(){
            changeProfilePicForm.submit();
        });

        //change password
        var changePasswordForm = document.getElementById('change-password-form');
        var submitButton = document.getElementById('changePassBtn');
        var currentPass = document.getElementById('currentPass');
        var newPass = document.getElementById('newPass');
        var confirmNewPass = document.getElementById('confirmNewPass');
        var errorMessage = document.getElementById('errorMessage');
        var submitButton = document.getElementById('changePassBtn');

        changePasswordForm.addEventListener('change', function(){
            if(newPass.value != confirmNewPass.value){
                errorMessage.innerHTML = "Password confirmation does not match."
                submitButton.disabled = true;
            }else{
                if(newPass.value == currentPass.value){
                    errorMessage.innerHTML = "Current password and new password cannot be the same."
                    submitButton.disabled = true;
                }else{
                    errorMessage.innerHTML = ""
                    submitButton.disabled = false;
                }
            }
        });

    </script>
   
</main

@include('ServiceProviderPages.partials.footer'),