<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{ url('admin/dashboard') }}"><img src="{{ asset('images/logo.png') }}" alt="logo" style="max-width: 30%; height:30%; margin-left:-6%;"/>
        <span class="title-logo">Alive</span>
      </a>
      <a class="sidebar-brand brand-logo-mini" href="{{ url('admin/dashboard') }}"><img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 100%; height:100%; margin-left:-15%;"/></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{ asset('assets/uploads/profile/' . auth()->user()->image) }}" alt="User Image">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
              <span>Admin</span>
            </div>
          </div>
          {{-- <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a> --}}
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="{{ route('users.myProfile', Auth::user())}}" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-account text-primary"></i>
                </div>              
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">My Profile</p>
              </div>
            </a>
            {{-- <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div> --}}
              {{-- <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div> --}}
            </a>
            {{-- <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div> --}}
              {{-- <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div> --}}
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('admin/suppliers')}}">
          <span class="menu-icon">
            <i class="mdi mdi-account-group"></i>
          </span>
          <span class="menu-title">Manage Supplier</span>
        </a>
      </li>  
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#manage-categories" aria-expanded="false" aria-controls="manage-categories">
          <span class="menu-icon">
              <i class="mdi mdi-view-list"></i>
          </span>
          <span class="menu-title">Manage Categories</span>
          <i class="menu-arrow"></i>
        </a>      
        <div class="collapse" id="manage-categories">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">List of Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category.create')}}">Add Categories</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#manage-account" aria-expanded="false" aria-controls="manage-account">
            <span class="menu-icon">
                <i class="mdi mdi-account"></i>
            </span>
            <span class="menu-title">Manage Account</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="manage-account">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('roles.index')}}">Manage Roles</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('permissions.index')}}">Manage Permissions</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index')}}">Manage Users</a></li>
            </ul>
        </div>
    </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('logs.index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document"></i>
          </span>
          <span class="menu-title">User Logs</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('/')}}">
          <span class="menu-icon">
            <i class="mdi mdi-earth"></i>
          </span>
          <span class="menu-title">Go to Website</span>
        </a>
      </li>
    </ul>
  </nav>