  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo e(route('home')); ?>" class="brand-link">
          <img src="<?php echo e(asset('admin')); ?>/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Bundler</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?php echo e(asset('admin')); ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="<?php echo e(url('/profile/' . Auth::user()->name)); ?>" class="d-block"><?php echo e(Auth::user()->name); ?></a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                  <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                      <li class="nav-item">
                          <a href="<?php echo e(route('public.home')); ?>" class="nav-link <?php echo e(Request::is('home') ? 'active' : null); ?>">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                              </p>
                          </a>
                      </li>
                  <?php endif; ?>
                  <?php if (Auth::check() && Auth::user()->hasRole('user')): ?>
                      <li
                          class="nav-item <?php echo e(Request::is('bundle*') ? 'menu-open' : null); ?> <?php echo e(Request::is('home') ? 'menu-open' : null); ?>">
                          <a class="nav-link <?php echo e(Request::is('bundle*') ? 'active' : null); ?>">
                              <i class="nav-icon fas fa-th"></i>
                              <p>
                                  BUNDLE
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?php echo e(route('bundle.index')); ?>"
                                      class="nav-link <?php echo e(Request::is('bundle') ? 'active' : null); ?>">
                                      <i class="nav-icon fas fa-list"></i>
                                      <p>
                                          BUNDLE List
                                      </p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <?php
                          $enrolled_package = auth()
                              ->user()
                              ->load('enrolledPackage')->enrolledPackage;
                      ?>
                      <?php if($enrolled_package->package_id == 3): ?>
                          <li class="nav-item <?php echo e(Request::is('setting*') ? 'menu-open' : null); ?>">
                              <a href="<?php echo e(route('setting.index')); ?>" class="nav-link">
                                  <i class="nav-icon fas fa-cogs"></i>
                                  <p>
                                      SETTINGS
                                  </p>
                              </a>
                          </li>
                      <?php endif; ?>
                  <?php endif; ?>
                  <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                      <li class="nav-item">
                          <a class="nav-link <?php echo e(Request::is('roles') || Request::is('permissions') ? 'active' : null); ?>"
                              href="<?php echo e(route('laravelroles::roles.index')); ?>">
                              <i class="nav-icon fas fa-tasks"></i>
                              <p><?php echo trans('titles.laravelroles'); ?></p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo e(Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null); ?>"
                              href="<?php echo e(url('/users')); ?>">
                              <i class="nav-icon fas fa-users"></i>
                              <p><?php echo trans('titles.adminUserList'); ?></p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo e(Request::is('users/create') ? 'active' : null); ?>"
                              href="<?php echo e(url('/users/create')); ?>">
                              <i class="nav-icon fas fa-plus"></i>
                              <p> <?php echo trans('titles.adminNewUser'); ?> </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo e(Request::is('package*') ? 'menu-open' : null); ?>"
                              href="<?php echo e(route('package.index')); ?>">
                              <i class="nav-icon fas fa-plus"></i>
                              <p> <?php echo trans('titles.adminPackage'); ?> </p>
                          </a>
                      </li>
                      <li class="nav-item <?php echo e(Request::is('setting*') ? 'menu-open' : null); ?>">
                          <a href="<?php echo e(route('setting.index')); ?>" class="nav-link">
                              <i class="nav-icon fas fa-cogs"></i>
                              <p>
                                  SETTINGS
                              </p>
                          </a>
                      </li>
                  <?php endif; ?>
                  <li class="nav-item <?php echo e(Request::is('profile*') ? 'menu-open' : null); ?>">
                      <a class="nav-link <?php echo e(Request::is('profile*') ? 'active' : null); ?>">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Profile
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a class="nav-link <?php echo e(Request::is('profile/' . Auth::user()->name) ? 'active' : null); ?>"
                                  href="<?php echo e(url('/profile/' . Auth::user()->name)); ?>">
                                  <i class="nav-icon fas fa-user-circle"></i>
                                  <p>
                                      View Profile
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link <?php echo e(Request::is('profile/' . Auth::user()->name . '/edit') ? 'active' : null); ?>"
                                  href="<?php echo e(url('/profile/' . Auth::user()->name) . '/edit'); ?>">
                                  <i class="nav-icon fas fa-edit"></i>
                                  <p>
                                      Edit Profile
                                  </p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="<?php echo e(route('logout')); ?>" class="nav-link"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>
                              Logout
                          </p>
                      </a>
                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo csrf_field(); ?>
                      </form>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
  <!-- Main Sidebar Container -->
<?php /**PATH D:\LSKIT\bundler\resources\views/backend/partials/sidebar.blade.php ENDPATH**/ ?>