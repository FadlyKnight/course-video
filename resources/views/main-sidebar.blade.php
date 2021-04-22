<div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">PELATIHAN</a>
        <a href="#">BIOETIKS</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">Bio</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown">
          <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
          <a href="{{ route('user.data') }}" class="nav-link"><i class="far fa-user"></i><span>User</span></a>
        </li>
        <li class="dropdown">
          <a href="{{ route('video.data') }}" class="nav-link"><i class="fas fa-video"></i><span>Video</span></a>
        </li>
      </ul>
    </aside>
  </div>
  {{-- active --}}