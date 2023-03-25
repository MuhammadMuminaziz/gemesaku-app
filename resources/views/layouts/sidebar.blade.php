<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Gemesaku</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
          @if (auth()->user()->role->name == 'Super Admin')
          <li class="menu-header">Sekolah</li>
          <li class="{{ request()->is('sekolah') ? 'active' : '' }}"><a href="{{ route('sekolah.index') }}" class="nav-link"><i class="fas fa-school"></i><span>Sekolah</span></a></li>
          <li class="{{ request()->is('pembimbing') ? 'active' : '' }}"><a href="{{ route('pembimbing.index') }}" class="nav-link"><i class="fas fa-user"></i><span>Pembimbing</span></a></li>
          <li class="{{ request()->is('kegiatan') ? 'active' : '' }}"><a href="{{ route('kegiatan.index') }}" class="nav-link"><i class="fas fa-images"></i><span>Photo Kagiatan</span></a></li>
          <li class="{{ request()->is('profile/' . auth()->user()->username) ? 'active' : '' }}"><a href="{{ route('pembimbing-sekolah', auth()->user()->username) }}" class="nav-link"><i class="fas fa-user-cog"></i><span>Profile</span></a></li>
          @endif
          @if (auth()->user()->role->name == 'Admin')
          <li class="menu-header">Siswa</li>
          <li class="{{ request()->is('siswa*') ? 'active' : '' }}"><a href="{{ route('siswa.index') }}" class="nav-link"><i class="fas fa-user"></i><span>Siswa</span></a></li>
          <li class="{{ request()->is('profile/' . auth()->user()->username) ? 'active' : '' }}"><a href="{{ route('pembimbing-sekolah', auth()->user()->username) }}" class="nav-link"><i class="fas fa-user-cog"></i><span>Profile</span></a></li>
          @endif
        </ul>
    </aside>
  </div>