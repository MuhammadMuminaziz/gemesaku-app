<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        {{-- image --}}
        @if (auth()->user()->image != null)
        <img alt="image" src="{{ asset('file_upload/user/' . auth()->user()->image ) }}" class="rounded-circle mr-1">
        @else
        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
        @endif

        <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="{{ route('pembimbing-sekolah', auth()->user()->username) }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="dropdown-item has-icon text-danger d-flex align-items-center small logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
          </form>
        </div>
      </li>
    </ul>
  </nav>