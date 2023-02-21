<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-text mx-3">Dashboard</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  @role('super-admin')
  <li class="nav-item active">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Home Admin</span></a>
  </li>
  @endrole

  @role('guru')
  <li class="nav-item active">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Home Guru</span></a>
  </li>
  @endrole

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Umum
  </div>

  @hasrole('super-admin')
  <li class="nav-item @requestRoute('user-manajement.index') active @endrequestRoute">
    <a class="nav-link" href="{{ route('user-manajement.index') }}">
      <i class="fas fa-fw fa-table"></i>
      <span>User</span>
    </a>
  </li>

  <li class="nav-item @requestRoute('banner.index') active @endrequestRoute">
    <a class="nav-link" href="{{ route('banner.index') }}">
      <i class="fas fa-fw fa-table"></i>
      <span>Galeri</span>
    </a>
  </li>
  @endhasrole

  <li class="nav-item
  @if (request()->routeIs('berita') || request()->routeIs('kategory')) active @endif">
      <a
        class="@if (request()->routeIs('berita') || request()->routeIs('kategory'))
        nav-link
        @else
        nav-link collapsed
        @endif"
        href="#"
        data-toggle="collapse"
        data-target="#collapseBerita"
        aria-expanded="false"
        aria-controls="collapseBerita"
         >
          <i class="fas fa-fw fa-wrench"></i>
          <span>Berita</span>
      </a>
      <div
        id="collapseBerita"
        class="collapse @if (request()->routeIs('berita') || request()->routeIs('kategory')) show @endif"
        aria-labelledby="headingBerita"
        data-parent="#accordionSidebar"
        @requestRoute('berita') style="" @endrequestRoute
        >
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item @requestRoute('berita') active @endrequestRoute" href="{{ route('berita') }}">Berita</a>
              <a class="collapse-item @requestRoute('kategory') active @endrequestRoute" href="{{ route('kategory') }}">Kategory</a>
          </div>
      </div>
  </li>

  {{-- component=============================================================== --}}
  {{-- baca di doct tentang laravel request is --}}

  {{-- <li class="nav-item">
      <a
        class="nav-link"
        href="#"
        data-toggle="collapse"
        data-target="#collapseUtilities"
        aria-expanded="true"
        aria-controls="collapseUtilities"
        >
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
      </a>
      <div
        id="collapseUtilities"
        class="collapse show"
        aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar"
        style=""
        >
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Utilities:</h6>
              <a class="collapse-item" href="#">Colors</a>
              <a class="collapse-item" href="#">Borders</a>
              <a class="collapse-item" href="#">Animations</a>
              <a class="collapse-item" href="#">Other</a>
          </div>
      </div>
  </li> --}}

  <!-- Nav Item - Pages Collapse Menu -->
  {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Components:</h6>
              <a class="collapse-item" href="buttons.html">Buttons</a>
              <a class="collapse-item" href="cards.html">Cards</a>
          </div>
      </div>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Akademik
  </div>

  @hasrole('super-admin')
  <li class="nav-item @requestRoute('banner.index') active @endrequestRoute">
    <a class="nav-link" href="{{ route('banner.index') }}">
      <i class="fas fa-fw fa-table"></i>
      <span>Guru</span>
    </a>
  </li>

  <li class="nav-item @requestRoute('mata-pelajaran.index') active @endrequestRoute">
    <a class="nav-link" href="{{ route('mata-pelajaran.index') }}">
      <i class="fas fa-fw fa-table"></i>
      <span>Mata Pelajaran</span>
    </a>
  </li>
  @endhasrole

  @role('guru|super-admin')
  <li class="nav-item @requestRoute('jurnal.index') active @endrequestRoute">
    <a class="nav-link" href="{{ route('jurnal.index') }}">
      <i class="fas fa-fw fa-table"></i>
      <span>Jurnal Kelas</span>
    </a>
  </li>
  @endrole


  {{-- @role('super-admin|guru')
  <li class="nav-item @requestRoute('jurnal.index') active @endrequestRoute">
    <a class="nav-link" href="{{ route('jurnal.index') }}">
      <i class="fas fa-fw fa-table"></i>
      <span>Jurnal Kelas</span>
    </a>
  </li> --}}

   {{-- <li class="nav-item
  @if (request()->routeIs('kelasx.index') || request()->routeIs('kelasxi.index') || request()->routeIs('kelasxii.index')) active @endif">
      <a
        class="@if (request()->routeIs('kelasx.index') || request()->routeIs('kelasxi.index') || request()->routeIs('kelasxii.index'))
        nav-link
        @else
        nav-link collapsed
        @endif"
        href="#"
        data-toggle="collapse"
        data-target="#collapseJurnal"
        aria-expanded="false"
        aria-controls="collapseJurnal"
         >
          <i class="fas fa-fw fa-wrench"></i>
          <span>Jurnal</span>
      </a>
      <div
        id="collapseJurnal"
        class="collapse @if (request()->routeIs('kelasx.index') || request()->routeIs('kelasxi.index') || request()->routeIs('kelasxii.index')) show @endif"
        aria-labelledby="headingJurnal"
        data-parent="#accordionSidebar"
        @if (request()->routeIs('kelasx.index') || request()->routeIs('kelasxi.index') || request()->routeIs('kelasxii.index')) style="" @endif
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @requestRoute('kelasx.index') active @endrequestRoute" href="{{ route('kelasx.index') }}">Kelas X</a>
            <a class="collapse-item @requestRoute('kelasxi.index') active @endrequestRoute" href="{{ route('kelasxi.index') }}">Kelas XI</a>
            <a class="collapse-item @requestRoute('kelasxii.index') active @endrequestRoute" href="{{ route('kelasxii.index') }}">Kelas XII</a>
          </div>
      </div>
  </li>
  @endrole --}}

  <!-- Nav Item - Pages Collapse Menu -->
  {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
          aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Login Screens:</h6>
              <a class="collapse-item" href="login.html">Login</a>
              <a class="collapse-item" href="register.html">Register</a>
              <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
              <div class="collapse-divider"></div>
              <h6 class="collapse-header">Other Pages:</h6>
              <a class="collapse-item" href="404.html">404 Page</a>
              <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
      </div>
  </li> --}}

  @hasrole('super-admin')
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Fitur Website
    </div>

    <li class="nav-item @if (request()->routeIs('banner.index') ||
        request()->routeIs('jurusan.index') ||
        request()->routeIs('testimoni.index') ||
        request()->routeIs('telepon.index') ||
        request()->routeIs('social_media.index') ||
        request()->routeIs('pertanyaan.index')) active @endif">
        <a
          class="@if (request()->routeIs('banner.index') ||
                      request()->routeIs('jurusan.index') ||
                      request()->routeIs('testimoni.index') ||
                      request()->routeIs('telepon.index') ||
                      request()->routeIs('social_media.index') ||
                      request()->routeIs('pertanyaan.index'))
                      nav-link
                  @else
                      nav-link collapsed
                  @endif"
          href="#"
          data-toggle="collapse"
          data-target="#collapseWebsite"
          aria-expanded="false"
          aria-controls="collapseWebsite"
           >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Website</span>
        </a>
        <div
          id="collapseWebsite"
          class="collapse @if (request()->routeIs('banner.index') ||
                               request()->routeIs('jurusan.index') ||
                               request()->routeIs('testimoni.index') ||
                               request()->routeIs('telepon.index') ||
                               request()->routeIs('social_media.index') ||
                               request()->routeIs('pertanyaan.index')) show @endif"
          aria-labelledby="headingBerita"
          data-parent="#accordionSidebar"
          @if (request()->routeIs('banner.index') ||
              request()->routeIs('jurusan.index') ||
              request()->routeIs('testimoni.index') ||
              request()->routeIs('telepon.index') ||
              request()->routeIs('social_media.index') ||
              request()->routeIs('pertanyaan.index')) style="" @endif>
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @requestRoute('banner.index') active @endrequestRoute" href="{{ route('banner.index') }}">Banner</a>
                <a class="collapse-item @requestRoute('jurusan.index') active @endrequestRoute" href="{{ route('jurusan.index') }}">Jurusan</a>
                <a class="collapse-item @requestRoute('testimoni.index') active @endrequestRoute" href="{{ route('testimoni.index') }}">Testimoni</a>
                <a class="collapse-item @requestRoute('telepon.index') active @endrequestRoute" href="{{ route('telepon.index') }}">Telepon</a>
                <a class="collapse-item @requestRoute('social_media.index') active @endrequestRoute" href="{{ route('social_media.index') }}">Social Media</a>
                <a class="collapse-item @requestRoute('pertanyaan.index') active @endrequestRoute" href="{{ route('pertanyaan.index') }}">Pertanyaan Pendaftaran</a>
            </div>
        </div>
    </li>
  @endhasrole

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
