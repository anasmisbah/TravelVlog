<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
      <li><a href="{{ route('kategori.index') }}"><i class="fa fa-tags"></i> Kategori</a></li>
      <li><a href="{{ route('tiket.index') }}"><i class="fa fa-ticket"></i> Tiket</a></li>
      <li><a href="{{ route('pembeli.index') }}"><i class="fa fa-users"></i> Pembeli</a></li>
      <li><a href="{{ route('kota.index') }}"><i class="fa fa-building"></i> Kota</a></li>
      <li><a href="{{ route('order.index') }}"><i class="fa fa-laptop"></i> Order</a></li>
      <li><a href="{{ route('admin.index') }}"><i class="fa fa-user"></i> Admin</a></li>

      <li><a><i class="fa fa-home"></i> Admin <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('admin.profile',['id'=> auth()->user()->admin->id])}}">profile</a></li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
            </a>
            {{-- <a href="{{route('admin.profile',['id' => Auth::user()->admin->id])}}">Profile</a> --}}

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
