<footer class="py-4 bg-light mt-auto">
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
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script>
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
