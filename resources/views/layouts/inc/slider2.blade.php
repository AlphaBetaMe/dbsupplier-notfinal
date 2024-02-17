<style>
  /* .carousel-inner > .item > img, .carousel-inner > .item  > img {
    width: 100%;
    height: 20%;
  } */
  /* .carousel-caption {
    top: 50%;
    right: 75%;
    transform: translateY(-50%);
  } */
  .w-100 {
    width: 100% !important;
    height: 60vh;
  }
  .carousel-fade .carousel-item {
    opacity: 0;
    transition-duration: 0.6s;
    transition-property: opacity;
  }
  .carousel-fade .carousel-item.active,
  .carousel-fade .carousel-item-next.carousel-item-left,
  .carousel-fade .carousel-item-prev.carousel-item-right {
    opacity: 1;
  }
  .carousel-fade .active.carousel-item-left,
  .carousel-fade .active.carousel-item-right {
    opacity: 0;
  }
  .carousel-fade .carousel-item-next,
  .carousel-fade .carousel-item-prev,
  .carousel-fade .carousel-item.active,
  .carousel-fade .active.carousel-item-left,
  .carousel-fade .active.carousel-item-prev {
    transform: translateX(0);
  }
</style>

<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner align-center">
    <div class="carousel-item active">
      <img src="{{asset('images/slider/slider1.png')}}" class="d-block img-fluid"  alt="...">
      <!-- <div class="container-fluid carousel-caption d-none d-md-block float-start" id="grad1">
        <h3 class="h3-responsive">Muscle Size,Strength & Performance</h3>
        <p class="p-responsive">Crea bb bbbnv1q1qtine monohydrate has been extensively studied and shown to help support muscle size, strength and recovery when used consistently over time in conjunction with a healthy, balanced diet and regular weight training¹.</p>
      </div> -->
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/slider/slider2.png')}}}" class="d-block img-fluid" alt="...">
      <!-- <div class="carousel-caption d-none d-md-block float-start" id="grad1">
        <h3 class="h3-responsive">WHERE OUR PASSION MEETS YOUR POTENTIAL.</h3>
        <p class="p-responsive">Want to definitively separate yourself from the competition? Nitro-Tech® Elite is the culmination of decades spent obsessing over....</p>
      </div> -->
    </div>
    <div class="carousel-item">
      <img src="{{asset('assets/slider/slider1.png')}}" class="d-block w-100 h-100 " alt="...">
      <!-- <div class="carousel-caption d-none d-md-block float-start" id="grad1">
        <h3 class="h3-responsive">Change Your Life</h3>
        <p class="p-responsive">Want to definitively separate yourself from the competition? Nitro-Tech® Elite is the culmination of decades spent obsessing over formulations, acquiring patents and funding research – and...</p>
      </div> -->
    </div>
    <div class="carousel-item">
      <img src="{{asset('assets/slider/slider.png')}}" class="d-block w-100 h-100 float-end" alt="...">
      <!-- <div class="container-fluid carousel-caption d-none d-md-block float-start" id="grad1">
        <h3 class="h3-responsive">PROMATRIX MASS</h3>
        <p class="p-responsive">the solution for individuals finding it difficult to achieve Quality Muscles and Size!.</p>
        
      </div> -->
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
<script>
  $('.carousel').carousel({
  interval: 2000
})
</script>
</div>                                                                           