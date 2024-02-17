<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #343a40;padding: 10px 20px;">
  <div class="container-fluid">
    <a class="navbar-brand ms-3 d-flex align-items-center" href="{{url('/')}}">
      <img src="{{asset('images/logo.png')}}" alt="Logo" height="60" width="60" id="aliveLogo">
      <h4 class="ms-2 me-3 mb-0" id="alive"><strong>Alive</strong></h4>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleNavbar()">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link ms-3 me-3" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-3 me-3" href="{{ route('frontend.supplierList') }}">Supplier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-3 me-3" href="{{ route('frontend.contact') }}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-3 me-3" href="{{ route('frontend.about') }}">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto" id="navbar">
        <li class="nav-item">
          <a id="becomeSupplierBtn" class="nav-link rounded-btn ms-3 me-3" href="{{route('frontend.registersupplier')}}">
            <span class="bi bi-person-plus-fill me-1"></span> Become a Supplier
          </a>
          
        </li>
        @guest
          @if (Route::has('register'))
            <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link ms-3 me-3">
                <span class="bi bi-person-plus-fill me-1"></span> Register
              </a>
            </li>
          @endif
          @if (Route::has('login'))
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link ms-3 me-3">
                <span class="bi bi-box-arrow-in-right me-1"></span> Login
              </a>
            </li>
          @endif
        @else
          {{-- <li class="nav-item">
            @hasanyrole('Admin|Supplier')
              <a class="nav-link ms-3 me-3" href="{{ url('admin/dashboard')}}">Admin Dashboard</a>
            @endhasanyrole
          </li> --}}
          <li class="nav-item">
            @if(auth()->user()->hasRole('Admin'))
                <a class="nav-link ms-3 me-3" href="{{ url('admin/dashboard') }}">Admin Dashboard</a>
            @elseif(auth()->user()->hasRole('Supplier'))
                <a class="nav-link ms-3 me-3" href="{{ url('supplier/dashboard') }}">Supplier Dashboard</a>
            @endif
          </li>        
          <li class="nav-item">
            @hasanyrole('Customer| ')
              <a class="nav-link ms-3 me-3" href="{{url('myOrders')}}">My Bookings</a>
            @endhasanyrole
          </li>
          <li class="nav-item">
            <a class="nav-link ms-3 me-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
<style>
  body {
    margin: 0;
    font-family: 'Prata', serif;
  }

  .navbar {
    margin: 0;
    padding: 10px 20px;
    border-bottom: 2px solid #ffffff;
  }

  .navbar-nav {
    margin: 0;
  }

  .nav-link {
    text-decoration: none !important;
    color: #FFFFFF !important;
    padding: 10px;
    transition: background-color 0.3s ease;
  }

  .nav-link:hover {
    background-color: #555555;
    border-radius: 5px;
  }

  .rounded-btn {
    border-radius: 5px;
    display: inline-block;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    background-color: #ffffff;
    color: #000000 !important;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .rounded-btn:hover {
    background-color: #555555;
    color: #ffffff !important;
  }

  .navbar-toggler {
    transition: background-color 0.3s ease;
  }

  .navbar-toggler:hover {
    background-color: #555555;
  }
</style>

<script>
  function toggleNavbar() {
    var navbar = document.getElementById("navbarNav");
    navbar.classList.toggle("show");

    // Add the following lines to toggle the class for the "Become a Supplier" button
    var supplierButton = document.getElementById("becomeSupplierBtn");
    supplierButton.classList.toggle("full-width", navbar.classList.contains("show"));
  }
</script>
<script>
  function toggleNavbar() {
    var navbar = document.getElementById("navbarNav");
    if (navbar.style.display === "none" || !navbar.style.display) {
      navbar.style.display = "block";
    } else {
      navbar.style.display = "none";
    }
  }
</script>