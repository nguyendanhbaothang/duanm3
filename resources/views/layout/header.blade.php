<header class="top-header">
    <nav class="navbar navbar-expand">
      <div class="mobile-toggle-icon d-xl-none">
          <i class="bi bi-list"></i>
        </div>
        <div class="top-navbar d-none d-xl-block">
        </div>
        <div class="search-toggle-icon d-xl-none ms-auto">
          <i class="bi bi-search"></i>
        </div>
        <form class="searchbar d-none d-xl-flex ms-auto">
            <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i class="bi bi-x-lg"></i></div>
        </form>
        <div class="top-navbar-right ms-3">
          <ul class="navbar-nav align-items-center">
          <li class="nav-item dropdown dropdown-large">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
              <div class="user-setting d-flex align-items-center gap-1">
                <img src="assets/images/avatars/avatar-1.png" class="user-img" alt="">
                {{-- <b><span class="username">{{ auth()->user()->name }}</span></b> --}}
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                 <a class="dropdown-item" href="#">
                   <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="60" height="60">
                      <div class="ms-3">
                        {{-- <h6 class="mb-0 dropdown-user-name">{{ auth()->user()->name }}</h6> --}}
                      </div>
                   </div>
                 </a>
               </li>

                <li>
                  <a class="dropdown-item" href="authentication-signup-with-header-footer.html">

                       <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="setting-text ms-3"><a  href="{{ route('logout') }}"onclick="event.preventDefault();
                    this.closest('form').submit();"><i class="fa fa-key"></i> Log Out</a></div>
                       </form>
                   </a>
                </li>
            </ul>
          </li>
          </ul>
          </div>
    </nav>
  </header>
