<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav align-items-center">
        <li>
            <button class="btn btn-sm btn-primary" onclick="history.back()" data-toggle="tooltip" data-placement="bottom"
                title="Back"><i class="fa fa-long-arrow-left"></i></button>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo e(route('home')); ?>" class="brand-link">
                <img src="<?php echo e(asset('admin')); ?>/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="text-dark">Bundler</span>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <?php if(auth()->guard()->guest()): ?>
            <li><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(trans('titles.login')); ?></a></li>
            <?php if(Route::has('register')): ?>
                <li><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(trans('titles.register')); ?></a></li>
            <?php endif; ?>
        <?php else: ?>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    <?php if(Auth::User()->profile && Auth::user()->profile->avatar_status == 1): ?>
                        <img src="<?php echo e(Auth::user()->profile->avatar); ?>" alt="<?php echo e(Auth::user()->name); ?>"
                            class="user-avatar-nav">
                    <?php else: ?>
                        <div class="user-avatar-nav"></div>
                    <?php endif; ?>
                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                        <a class="dropdown-item <?php echo e(Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null); ?>"
                            href="<?php echo e(url('/users')); ?>">
                            <?php echo trans('titles.adminUserList'); ?>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php echo e(Request::is('roles') || Request::is('permissions') ? 'active' : null); ?>"
                            href="<?php echo e(route('laravelroles::roles.index')); ?>">
                            <?php echo trans('titles.laravelroles'); ?>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php echo e(Request::is('users/create') ? 'active' : null); ?>"
                            href="<?php echo e(url('/users/create')); ?>">
                            <?php echo trans('titles.adminNewUser'); ?>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php echo e(Request::is('package*') ? 'active' : null); ?>"
                            href="<?php echo e(route('package.index')); ?>">
                            <?php echo trans('titles.adminPackage'); ?>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php echo e(Request::is('setting*') ? 'active' : null); ?>"
                            href="<?php echo e(route('setting.index')); ?>">
                            Settings
                        </a>
                        <a class="dropdown-item <?php echo e(Request::is('payment*') ? 'active' : null); ?>"
                            href="<?php echo e(route('settings.payement.index')); ?>">
                            Payment Settings
                        </a>
                        <a class="dropdown-item <?php echo e(Request::is('plan*') ? 'active' : null); ?>"
                            href="<?php echo e(route('settings.plan.index')); ?>">
                            Plan Settings
                        </a>
                    <?php endif; ?>
                    <?php if (Auth::check() && Auth::user()->hasRole('user')): ?>
                        <a class="dropdown-item <?php echo e(Request::is('bundle*') ? 'active' : null); ?>"
                            href="<?php echo e(route('bundle.index')); ?>">
                            Bundle List
                        </a>
                        <?php
                            $enrolled_package = auth()
                                ->user()
                                ->load('enrolledPackage')->enrolledPackage;
                        ?>
                        <?php if($enrolled_package->package_id == 3): ?>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo e(route('setting.index')); ?>"
                                class="dropdown-item <?php echo e(Request::is('setting*') ? 'active' : null); ?>">
                                Settings
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item <?php echo e(Request::is('profile/' . Auth::user()->name, 'profile/' . Auth::user()->name . '/edit') ? 'active' : null); ?>"
                        href="<?php echo e(url('/profile/' . Auth::user()->name)); ?>">
                        <?php echo trans('titles.profile'); ?>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        <?php echo e(__('Logout')); ?>

                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </li>
        <?php endif; ?>

    </ul>
</nav>
<!-- /.navbar -->
<?php /**PATH D:\LSKIT\bundler\resources\views/backend/partials/navbar.blade.php ENDPATH**/ ?>