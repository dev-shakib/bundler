  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{route('home')}}" class="brand-link">
          <img src="{{ asset('admin') }}/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Bundler</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('admin') }}/img/user2-160x160.jpg" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="{{ url('/profile/' . Auth::user()->name) }}" class="d-block">{{ Auth::user()->name }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="{{ route('public.home') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  @role('user')
                  <li class="nav-item">
                      <a href="{{ route('bundle.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              BUNDLE
                          </p>
                      </a>
                  </li>
                  @endrole
                  @role('admin')
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('roles') || Request::is('permissions') ? 'active' : null }}"
                              href="{{ route('laravelroles::roles.index') }}">
                              <i class="nav-icon fas fa-tasks"></i>
                              <p>{!! trans('titles.laravelroles') !!}</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null }}"
                              href="{{ url('/users') }}">
                              <i class="nav-icon fas fa-users"></i>
                              <p>{!! trans('titles.adminUserList') !!}</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('users/create') ? 'active' : null }}"
                              href="{{ url('/users/create') }}">
                              <i class="nav-icon fas fa-plus"></i>
                              <p> {!! trans('titles.adminNewUser') !!} </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('activity') ? 'active' : null }}"
                              href="{{ url('/activity') }}">
                              <i class="nav-icon fas fa-history"></i>
                              <p> {!! trans('titles.adminActivity') !!}</p>
                          </a>
                      </li>
                  @endrole
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
  <!-- Main Sidebar Container -->
