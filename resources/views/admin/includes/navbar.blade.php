  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <h3 class="m-2">@yield('title')</h3>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                  <i class="far fa-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">

                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">

          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">

          </li>
          <li class="nav-item">

          </li>
          <li class="nav-item">

          </li>
      </ul>
  </nav>
  <!-- /.navbar -->
