<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Marketplace for Services 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    var selectedAddress = document.getElementById('selectedAddress');
    var street = document.getElementById('street');
    var address = document.getElementById('business_address');
    var edit = document.getElementById('editAdd');
    edit.hidden = true;

    selectedAddress.addEventListener('change', function(){
        address.value = street.value+", "+selectedAddress.value;
        if(selectedAddress.value != '' && street.value != ''){
            selectedAddress.hidden = true;
            street.hidden = true;
            address.hidden = false;
            edit.hidden = false;
        }
    });

   edit.addEventListener('click', function(){
        selectedAddress.value = '';
        street.value = '';
        selectedAddress.hidden = false;
        street.hidden = false;
        address.hidden = true;
        edit.hidden = true;

    });

</script>

@if(session()->has('message'))
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{session('message')}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#login').modal("toggle");
    }
    });
</script>
@endif

{{-- Customer Registration --}}
@error('Firstname')

<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#customerRegistration2').modal("toggle");
    }
    });
</script>
@enderror

@error('Lastname')
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#customerRegistration2').modal("toggle");
    }
    });
</script>
@enderror

@error('Address')
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#customerRegistration2').modal("toggle");
    }
    });
</script>
@enderror

@error('Mobile_number')

<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#customerRegistration2').modal("toggle");
    }
    });
</script>
@enderror

@error('Email')
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#customerRegistration1').modal("toggle");
    }
    });
</script>
@enderror

@error('Password')
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#customerRegistration1').modal("toggle");
    }
    });
    
</script>
@enderror

{{-- SErvice Provider Registration --}}
@error('business_name')
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#serviceProviderRegistration2').modal("toggle");
    }
    });
</script>
@enderror

@error('business_address')
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#serviceProviderRegistration2').modal("toggle");
    }
    });
</script>
@enderror

@error('firstname')
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#serviceProviderRegistration2').modal("toggle");
    }
    });
</script>
@enderror

@error('lastname')
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#serviceProviderRegistration2').modal("toggle");
    }
    });
</script>
@enderror


@error('mobile_number')
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#serviceProviderRegistration2').modal("toggle");
    }
    });
</script>
@enderror

@error('email')
<script>
   Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#serviceProviderRegistration1').modal("toggle");
    }
    });
</script>
@enderror

@error('password')
<script>
    Swal.fire({
    title: "Ooops!",
    text: "{{$message}}",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "OK"
    }).then((result) => {
    if (result.isConfirmed) {
        $('#serviceProviderRegistration1').modal("toggle");
    }
    });
</script>
@enderror
</body>
</html>
