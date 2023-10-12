@include('AdminPages.partials.header')


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
                            <img src="{{$user->photo}}" alt="Admin" class="rounded-circle"  width="180" height="180" style="object-fit: cover">

                            <form action="{{url('change_ad_profile_pic')}}" id="change-profile-pic-form" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="image/png, image/gif, image/jpeg" name="photo" id="profile-pic-input" hidden>
                            </form>

                            <div class="mt-3">
                                <h4>{{$user->firstname}} {{$user->lastname}}</h4>
                                <p class="text-secondary mb-1">ID: MMS-AD{{$user->user_id}}</p>
                                <p class="text-muted font-size-sm">{{$user->business_address}}</p>
                                <button type="button" onclick="uploadProfilePic()" class="btn btn-sm btn-outline-primary">Change Profile Picture</button>
                                @error('photo')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
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
                                <h5 class="mb-0 text-primary">Admin Profile</h5>
                            </div>
                        </div>
                        <hr>
                       
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">First Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->firstname}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->lastname}} 
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
                                <a class="btn btn-success btn-sm" >Change Password</a>
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
                <form action="{{url('/edit_ad_profile')}}" method="POST" id="profile-update-form">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                        
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6 class="mb-2">Firstname</h6>
                                <div class="d-flex justify-content-center">
                                    <input name="firstname" type="text float-end"  class="form-control" style="width: 400px !important" value="{{$user->firstname}}" required>
                                    @error('firstname')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6 class="mb-2">Lastname</h6>
                                <div class="d-flex justify-content-center">
                                    <input name="lastname" type="text float-end"  class="form-control" style="width: 400px !important" value="{{$user->lastname}}" required>
                                    @error('lastname')
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
    </script>
   
</main

@include('AdminPages.partials.footer')