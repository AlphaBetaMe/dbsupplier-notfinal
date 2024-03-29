<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Supplier | @yield('title')</title>

  <link rel="website icon" href="{{ asset('images/logo.png')}}">

  <!-- plugins:css -->
  <link href="{{ asset('supplier/vendors/feather/feather.css') }}" rel="stylesheet">
  <link href="{{ asset('supplier/vendors/ti-icons/css/themify-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('supplier/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link href="{{ asset('supplier/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <link href="{{ asset('supplier/vendors/ti-icons/css/themify-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('supplier/js/select.dataTables.min.css') }}" rel="stylesheet">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link href="{{ asset('supplier/css/vertical-layout-light/style.css') }}" rel="stylesheet">
  <!-- endinject -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

  <script src="{{ asset('supplier/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/admin-main.css">

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ url('supplier/dashboard') }}"><img src="{{asset('images/logo.png')}}" alt="logo" />
          <span style="font-family:Arial, Helvetica, sans-serif; text-decoration:none; font-size:20px;">Alive</span>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('supplier/dashboard') }}"><img src="{{asset('images/logo.png')}}" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('assets/uploads/profile/' . auth()->user()->image) }}" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          {{-- <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li> --}}
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('supplier/dashboard') }}">
              {{-- <i class="icon-grid menu-icon"></i> --}}
              <i class="fa fa-dashboard menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-services" aria-expanded="false" aria-controls="manage-services">
              <i class="fa fa-folder menu-icon"></i>
              <span class="menu-title">Manage Services</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manage-services">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">List of Services</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('products.create') }}">Add Services</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('promos.index') }}">Vouchers</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#payment" aria-expanded="false" aria-controls="payment">
              <i class="fa fa-credit-card menu-icon"></i>
              <span class="menu-title">Payment Methods</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="payment">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('paymentQR.create') }}">Add Payment</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('paymentQR.index') }}">Payment Lists</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-book" aria-expanded="false" aria-controls="manage-book">
              <i class="fa fa-calendar menu-icon"></i>
              <span class="menu-title">Booking Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manage-book">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('supplier/orders') }}">Manage Bookings</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('events.index')}}">Calendar</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('timelines.index') }}">
              <i class="fa fa-clock-o menu-icon"></i>
              <span class="menu-title">Timeline</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contacts.index') }}">
              <i class="fa fa-phone menu-icon"></i>
              <span class="menu-title">Contact Us</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
              <i class="fa fa-globe menu-icon"></i>
              <span class="menu-title">Go to Website</span>
            </a>
          </li>
        </ul>
      </nav>
      @yield('content')
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <!-- <script src="{{ asset('supplier/vendors/js/vendor.bundle.base.js') }}"></script> -->
  <!-- endinject -->

  <!-- Plugin js for this page -->
  <script src="{{ asset('supplier/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('supplier/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('supplier/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('supplier/js/dataTables.select.min.js') }}"></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="{{ asset('supplier/js/off-canvas.js') }}"></script>
  <script src="{{ asset('supplier/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('supplier/js/template.js') }}"></script>
  <script src="{{ asset('supplier/js/settings.js') }}"></script>
  <script src="{{ asset('supplier/js/todolist.js') }}"></script>
  <!-- endinject -->

  <!-- Custom js for this page-->
  <script src="{{ asset('supplier/js/dashboard.js') }}"></script>
  <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (session('success'))
  <script>
    Swal.fire(
      '',
      '{{ session('
      success ') }}',
      'success'
    )
  </script>
  @endif


  @if (session('error'))
  <script>
    Swal.fire({
      icon: 'error',
      text: '{{ session('
      error ') }}',
    })
  </script>
  @endif
</body>

</html>