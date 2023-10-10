<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4 mb-3">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Marketplace for Services 2023</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script>
    // //Carousel
    // const myCarouselElement = document.querySelector('#carouselExampleCaptions')
    // const carousel = new bootstrap.Carousel(myCarouselElement, {
    //     interval: 1000,
    //     wrap: false
    // })
    // Alert AutoCLose
    $(".alert-dismissible").fadeTo(5000, 500).slideUp(500, function(){
        $(".alert-dismissible").alert('close');
    });

    window.addEventListener('confirm-cancel', event=>{
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Cancel!'
        }).then((result) => {
            Livewire.dispatch('cancel-confirmed')
        })
    });

    window.addEventListener('cancelled-successfully', event=>{
        Swal.fire({
            title: "Success!",
            text: "Appointment cancelled successfully",
            icon: 'success',
            showConfirmButton: true
        })
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
@if(session()->has('info'))
    <script type="text/javascript">
        Swal.fire({
            title: "Ooops!",
            text: "{{session('info')}}",
            icon: 'info',
            showConfirmButton: true
        })
    </script>
@endif
</body>
</html>
