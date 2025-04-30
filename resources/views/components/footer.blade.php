<!-- Footer -->
<footer class="text-center text-lg-start text-muted" id="footer">
  <!-- Section: Social media -->
  
  <section class="d-flex justify-content-center justify-content-lg-between border-top">
    <!-- Left -->
    {{-- <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div> --}}
    <!-- Left -->
    
    <!-- Right -->
    <div>
      
      
      {{-- <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a> --}}
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->
  
  <!-- Section: Links  -->
  <section class="">
    <div class="container-fluid text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <div class="col-md-3 col-lg-3 col-xl-2 mx-auto ps-lg-5 mb-4">
          <img src="{{Storage::url('media/imageGruppo.webp')}}" alt="Woof Woof Bitc*" id="footerLogo">
        </div>
        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-2 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem"></i>DALMA.TA S.P.A.
          </h6>
          <p>
            {{__('ui.footerInfo')}}
          </p>
        </div>
        <!-- Grid column -->
        
        <!-- Grid column -->
        {{-- <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div> --}}
        
        <!-- Grid column -->
        
        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            {{__('ui.footerLinks')}}
          </h6>
          <p>
            <a href="#!" class="text-reset">{{__('ui.aboutUs')}}</a>
          </p>
          <p>
            <a href="#!" class="text-reset">{{__('ui.support')}}</a>
          </p>
          <p>
            <a href="#!" class="text-reset">{{__('ui.services')}}</a>
          </p>
          <p>
            <a href="#!" class="text-reset">{{__('ui.accessibility')}}</a>
          </p>
        </div>
        <!-- Grid column -->
        
        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">{{__('ui.contacts')}}</h6>
          <p><i class="fas fa-home"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope"></i>
            Dalma.ta@hotmail.com
          </p>
          <p><i class="fas fa-phone"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
  @if(Auth::user() && !Auth::user()->is_revisor)
  <div class="d-flex w-100 mb-3">
    <div class="justify-content-center align-items-center text-center w-100">                
        <h5 class="title_m">Vuoi diventare revisore?</h5>
        <p class="text-muted">Clicca il bottone sottostante e inoltra una richiesta al nostro admin!</p>
        <a href="{{ route('become.revisor') }}" class="btn buttonOpacity">Diventa revisore</a>        
    </div>
  </div>
  @endif 
  
  <!-- Copyright -->
  <div class="text-center p-4" id="footerBottomBar">
    © 2025 Copyright:
    <a class="fw-bold" href="#" id="footerBottomBarText">Presto.it</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->