<?php $__env->startSection('template_title'); ?>
    <?php echo e(Auth::user()->name); ?>'s' Settings
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Settings</li>
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
                            <form action="<?php echo e(route('setting.store')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="type" id="type" required>
                                            <option value="">SELECT A TYPE</option>
                                            <option value="TEXT">TEXT</option>
                                            <option value="IMG">IMAGE</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4" id="datas">
                                        <div id="text">

                                        </div>
                                        <div id="img">

                                        </div>
                                    </div>
                                    <div class="col-sm-4"><input type="submit" class="btn btn-success" value="Create" />
                                    </div>
                                </div>
                            </form>
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
<script>
    $(document).ready(function(){
        $('#text').empty();
        $('#img').empty();
        $('#datas').hide();
        $("#type").change(function(){
            var values = $(this).val();
            if(values == "TEXT"){

                $('#datas').show();
                $('#text').append('<input type="text" name="values" value="<?php echo e($setting->value); ?>" class="form-control" id="" required>');
                $('#img').empty();
            }else{
                $('#datas').show();
                $('#img').append('<input type="file" name="values" class="form-control" id="" required> <br>(267px X 104px)');
                $('#text').empty();
            }
        })
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LSKIT\bundler\resources\views/backend/pages/settings/index.blade.php ENDPATH**/ ?>