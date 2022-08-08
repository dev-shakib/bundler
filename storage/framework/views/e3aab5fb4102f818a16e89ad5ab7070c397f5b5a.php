

<?php $__env->startSection('template_title'); ?>
    <?php echo e(Auth::user()->name); ?>'s' Bundle
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div style="display: none">
    <!-- Content Wrapper. Contains page content -->
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
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-12 mt-5">
                    <div class="card p-0 col-lg-4 m-auto">
                        <div class="card-header">
                            <h5>Edit Bundle</h5>
                        </div>
                        
                        <form action="<?php echo e(route('bundle.update', [$bundle->id])); ?>" method="post">
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
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <input type="text" placeholder="Bundle Name" value="<?php echo e($bundle->name); ?>"
                                        class="form-control" name="name">
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Update" />
                            </div>
                        </form>
                        
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\bundler\resources\views/backend/pages/bundle/edit.blade.php ENDPATH**/ ?>