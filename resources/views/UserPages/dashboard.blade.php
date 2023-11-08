@include('UserPages.partials.header')


<main>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Home</h3>
        </div>
        <div>
            <div class="input-group mt-4 px-4">
                <a href="{{url('/user_services')}}" style="cursor: pointer;text-decoration: none"><h5 class="text-success">Discover Services<i class="fa fa-arrow-right mx-2 text-warning" aria-hidden="true"></i></h5></a>
            </div>
        </div>
    </div>
    <hr class="bg-dark mx-3"/>
    <div class="">
        <div class="container" >
            {{-- <div class="row">
                <div class="text-center">
                    <img class="p-0" src="assets/img/logo.png" alt="Marketplace Services" style="width: 800px; filter: drop-shadow(2px 2px 2px white) !important;">
                </div>
            </div> --}}
            <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="true" >
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                  <img src="assets/img/carousel/front.png" class="d-block w-100" alt="..." style="height: 70vh;object-fit: cover;">
                  <div class="carousel-caption d-none d-md-block" style="bottom: 20%">
                    <h3><blockquote style="font-style: italic">"A better way to discover services."</blockquote></h3>
                    {{-- <p>Some representative placeholder content for the first slide.</p> --}}
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <img src="assets/img/carousel/barber.jpg" class="d-block w-100" alt="..." style="height: 70vh;object-fit: cover;">
                  <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255, 255, 255, 0.4);width:100%;max-width:100%;left:0;">
                    <h3>Hair Salon Services</h3>
                    <p>Discover a world of beauty and pampering at our hair salon, where skilled stylists offer a wide range of services to enhance your hair's natural beauty and boost your confidence.</p>
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <img src="assets/img/carousel/electronic.jpg" class="d-block w-100" alt="..." style="height: 70vh;object-fit: cover;">
                  <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255, 255, 255, 0.4);width:100%;max-width:100%;left:0;">
                    <h3>Electronic Repair Services</h3>
                    <p>Discover a full spectrum of electronic repair services performed by skilled technicians, ensuring your gadgets and devices are restored to peak performance.</p>
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <img src="assets/img/carousel/gadget.jpeg" class="d-block w-100" alt="..." style="height: 70vh;object-fit: cover;">
                  <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255, 255, 255, 0.4);width:100%;max-width:100%;left:0;">
                    <h3>Gadget Repair Services</h3>
                    <p>Experience a diverse range of gadget repair services delivered by skilled technicians, guaranteeing your devices are restored to their full functionality.</p>
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <img src="assets/img/carousel/welding.jpeg" class="d-block w-100" alt="..." style="height: 70vh;object-fit: cover;">
                  <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255, 255, 255, 0.4);width:100%;max-width:100%;left:0;">
                    <h3>Welding Services</h3>
                    <p>Explore a variety of professional welding services by experienced craftsmen, ensuring precision and durability for your projects.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
        </div>
    </div>
</main

@include('UserPages.partials.footer')