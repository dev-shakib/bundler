

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
                            <li class="breadcrumb-item ">Section</li>
                            <li class="breadcrumb-item ">File</li>
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
                                <a href="<?php echo e(route('public.bundle.files.create', [$section->bundle_id, $section->id])); ?>"
                                    class='btn btn-primary'>ADD FILE</a>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
                                            <th width="10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="sort_files">
                                        <?php $__currentLoopData = $section->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $filename = explode('.', $f->filename);
                                            ?>
                                            <tr data-id="<?php echo e($f->id); ?>">

                                                <td><span class="handle"></span><?php echo e($filename[0] . '.' . $f->mime_types); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('public.bundle.files.show',[$section->bundle_id, $section->id,$f->id])); ?>" class="btn btn-outline-info"><i class="fa fa-eye"></i> EDIT</a>
                                                    <a href="<?php echo e(route('public.bundle.files.delete',[$f->id])); ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i> DELETE</a>
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

<script>
    $(document).ready(function(){
$('tbody').sortable();
    	function updateToDatabase(idString){
    	   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'}});

    	   $.ajax({
              url:'<?php echo e(url('/bundle/files/update-order')); ?>',
              method:'POST',
              data:{ids:idString},
              success:function(){
                //  alert('Successfully updated')
               	 //do whatever after success
              }
           })
    	}

        var target = $('.sort_files');
        target.sortable({
            update: function (e, ui){
               var sortData = target.sortable('toArray',{ attribute: 'data-id'})
               updateToDatabase(sortData.join(','))
            }
        })

    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\bundler\resources\views/backend/pages/bundle/files/index.blade.php ENDPATH**/ ?>