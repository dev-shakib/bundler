<?php $__env->startSection('template_title'); ?>
    <?php echo e(Auth::user()->name); ?>'s' Bundle
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <?php
    $enrolled_package = auth()
        ->user()
        ->load('enrolledPackage')->enrolledPackage;
    ?>
    <?php if($enrolled_package->package_id == 1): ?>
        <div class="card bg-danger">
            <div class="card-body">
                You are now free Plan Please Upgrad Your Plan
                <a href="<?php echo e(route('public.choosePlan')); ?>" class="btn btn-success">UPGRADE</a>
            </div>
        </div>
    <?php elseif($enrolled_package->package_id == 2): ?>
        <div class="card bg-primary">
            <div class="card-body">
                UPGRADE TO UNLIMITED
                <a href="<?php echo e(route('public.choosePlan')); ?>" class="btn btn-success">UPGRADE</a>
            </div>
        </div>
    <?php endif; ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bundle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Bundle</li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <div class="card">
                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php if($enrolled_package->package_id == 1): ?>
                                <?php if(count($bundle) == 0): ?>
                                    <form action="<?php echo e(route('bundle.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="text" placeholder="Bundle Name" class="form-control"
                                                    name="name">
                                            </div>
                                            <div class="col-sm-4"><input type="submit" class="btn btn-success"
                                                    value="Create" />
                                            </div>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            <?php elseif($enrolled_package->package_id == 2): ?>
                                <?php if(count($bundle) <= 5): ?>
                                    <form action="<?php echo e(route('bundle.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="text" placeholder="Bundle Name" class="form-control"
                                                    name="name">
                                            </div>
                                            <div class="col-sm-4"><input type="submit" class="btn btn-success"
                                                    value="Create" />
                                            </div>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            <?php else: ?>
                                <form action="<?php echo e(route('bundle.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <input type="text" placeholder="Bundle Name" class="form-control"
                                                name="name">
                                        </div>
                                        <div class="col-sm-4"><input type="submit" class="btn btn-success"
                                                value="Create" />
                                        </div>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <?php if(Session::has('message')): ?>
                                <div class="alert alert-success">
                                    <h4><?php echo e(Session::get('message')); ?></h4>
                                </div>
                            <?php endif; ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Bundle Name</th>
                                        <th>Total Page</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody class="">
                                    <?php $__currentLoopData = $bundle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($b->name); ?>

                                            </td>
                                            <td>
                                                <?php echo e($b->totalPages()); ?>

                                            </td>
                                            <td>
                                                <?php if($enrolled_package->package_id == 1): ?>
                                                    <?php if($b->totalPages() > 60): ?>
                                                        <span class="text-danger">You do not have permission to generate
                                                            bundle
                                                            more then 60 pages</span><br>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <a href="<?php echo e(route('bundle.show_single', [$b->slug, $b->id])); ?>"
                                                    class="btn btn-outline-primary"><i class="fa fa-eye"></i> VIEW</a>
                                                <a href="<?php echo e(route('bundle.edit', $b->id)); ?>"
                                                    class="btn btn-outline-primary"><i class="fa fa-pencil"></i> RENAME</a>
                                                <?php if($enrolled_package->package_id == 1): ?>
                                                    <?php if($b->totalPages() < 60): ?>
                                                        <?php if($b->generated->count() == 0): ?>
                                                            <a href="<?php echo e(route('public.bundle.generate', [$b->id])); ?>"
                                                                class="btn btn-outline-info">Generate Bundle</a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="#" class="btn btn-outline-info">Generate
                                                            Bundle</a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($b->generated->count() == 0): ?>
                                                        <a href="<?php echo e(route('public.bundle.generate', [$b->id])); ?>"
                                                            class="btn btn-outline-info">Generate Bundle</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if($enrolled_package->package_id == 1): ?>
                                                    <?php if($b->totalPages() < 60): ?>
                                                        <a href="<?php echo e(route('public.bundle.generated_bundle', [$b->id])); ?>"
                                                            class="btn btn-outline-info">View Generated Bundle</a>
                                                    <?php else: ?>
                                                        <a href="#" class="btn btn-outline-info">View Generated
                                                            Bundle</a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('public.bundle.generated_bundle', [$b->id])); ?>"
                                                        class="btn btn-outline-info">View Generated Bundle</a>
                                                <?php endif; ?>
                                                <form action="<?php echo e(route('bundle.destroy', [$b->id])); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-outline-danger"><i
                                                            class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LSKIT\bundler\resources\views/backend/pages/bundle/index.blade.php ENDPATH**/ ?>