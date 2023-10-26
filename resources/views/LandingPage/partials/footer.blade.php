<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Marketplace for Services 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session()->has('message'))
<script>
    Swal.fire(
        'Oops!',
        '{{session('message')}}',
        'info'
    );
</script>
@endif

{{-- Customer REgistration --}}
@error('Firstname')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('Lastname')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('Address')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('Mobile_number')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('Email')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('Password')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

{{-- SErvice Provider Registration --}}
@error('business_name')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('business_address')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('firstname')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('lastname')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('address')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('mobile_number')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('email')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror

@error('password')
<script>
    Swal.fire(
        'Oops!',
        '{{$message}}',
        'info'
    );
</script>
@enderror
</body>
</html>
