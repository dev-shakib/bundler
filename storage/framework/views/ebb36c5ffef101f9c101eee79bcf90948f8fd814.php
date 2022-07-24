

<?php $__env->startSection('template_title'); ?>
    <?php echo e(Auth::user()->name); ?>'s' Bundle
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                                <form action="<?php echo e(route('bundle.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <input type="text" placeholder="Bundle Name" class="form-control"
                                                name="name">
                                        </div>
                                        <div class="col-sm-4"><input type="submit" class="btn btn-success"
                                                value="Create" /></div>
                                    </div>
                                </form>
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

                                                    <a href="<?php echo e(route('bundle.show_single', [$b->slug,$b->id])); ?>"
                                                        class="btn btn-outline-primary"><i class="fa fa-eye"></i> VIEW</a>
                                                    <a href="<?php echo e(route('bundle.edit', $b->id)); ?>"
                                                        class="btn btn-outline-primary"><i class="fa fa-pencil"></i> RENAME</a>
                                                    <a href="<?php echo e(route('public.bundle.generate', [$b->id])); ?>"
                                                        class="btn btn-outline-info">Generate Bundle</a>
                                                    <a href="<?php echo e(route('public.bundle.generated_bundle', [$b->id])); ?>"
                                                        class="btn btn-outline-info">View Generated Bundle</a>
                                                    <form action="<?php echo e(route('bundle.destroy',[$b->id])); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("DELETE"); ?>
                                                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i> DELETE</button>
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
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bundler\resources\views/backend/pages/bundle/index.blade.php ENDPATH**/ ?>