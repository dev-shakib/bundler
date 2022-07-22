<?php $__env->startSection('template_title'); ?>
    <?php echo e(Auth::user()->name); ?>'s' Bundle
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-css'); ?>
<style>
    .social-links{

    }
    .social-links ul{
        padding: 0;
        margin: 0;
    }
    .social-links ul li{
        display: inline-block;
    }
</style>
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
                            <li class="breadcrumb-item active">Generated BUNDLE</li>
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
                                 <?php if(Session::has('message')): ?>

                                    <div class="alert alert-success">
                                        <h4><?php echo e(Session::get('message')); ?></h4>
                                    </div>
                                <?php endif; ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Generated Bundle Name</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php $__currentLoopData = $bundle->generated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php echo e($b->filename); ?>

                                                </td>
                                                <td>

                                                    <a href="<?php echo e(asset($b->filename)); ?>" class="btn btn-outline-primary" ><i class="fa fa-download"></i> DOWNLOAD</a>
                                                    <div class="social-links">
                                                        <?php echo Share::page(asset($b->filename))->facebook()->twitter()->linkedin()->whatsapp(); ?>


                                                    </div>
                                                    <form action="<?php echo e(route('bundle.generated.destroy',[$b->id])); ?>" method="post">
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
<script src="<?php echo e(asset('js/share.js')); ?>"></script>
<script>
    $(document).ready(function(){
        $('.social-links ul li a').addClass('btn');
        $('.social-links ul li a').addClass('btn-outline-primary');
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LSKIT\bundler\resources\views/backend/pages/bundle/generated_bundle.blade.php ENDPATH**/ ?>