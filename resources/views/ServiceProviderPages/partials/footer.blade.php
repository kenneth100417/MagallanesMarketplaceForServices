<footer class="py-4 bg-light mt-auto ">
    <div class="container-fluid px-4 mb-3">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Marketplace for Services 2023</div>
            <div>
                <a data-bs-toggle="modal" data-bs-target="#terms" style="cursor: pointer">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


<script>
    //confirtaion alerts
    window.addEventListener('show-delete-confirmation', event =>{
        Swal.fire({
            title: "Are you sure you want to delete this service?",
            text: "You won't be able to revert this.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('deleteConfirmed');
            }
        })
    });

    window.addEventListener('show-delete-successful', event =>{
        Swal.fire({
            title: "Success!",
            text: "Service deleted successfully!",
            icon: 'success',
            showConfirmButton: true
        })
    });
    
    // Alert AutoCLose
    $(".alert-dismissible").fadeTo(5000, 500).slideUp(500, function(){
        $(".alert-dismissible").alert('close');
    });
</script>

@if(session()->has('success'))
    <script type="text/javascript">
        Swal.fire({
            title: "Success!",
            text: "{{session('success')}}",
            icon: 'success',
            showConfirmButton: true
        })
    </script>
@endif


@if(session()->has('error'))
    <script type="text/javascript">
        Swal.fire({
            title: "Error!",
            text: "{{session('error')}}",
            icon: 'error',
            showConfirmButton: true
        })
    </script>
@endif

</body>
</html>
