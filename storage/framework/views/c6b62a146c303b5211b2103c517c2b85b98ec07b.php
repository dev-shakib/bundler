

<?php $__env->startSection('template_title'); ?>
    <?php echo e(Auth::user()->name); ?>'s' Bundle
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
                    <h1 class="m-0">Bundle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route("public.home")); ?>">Home</a></li>
                        <li class="breadcrumb-item "><a href="<?php echo e(route('bundle.index')); ?>">Bundle</a></li>
                        <li class="breadcrumb-item active"><?php echo e($bundle->name); ?> List</li>
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
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <h2><u>Bundle Name:</u> <?php echo e($bundle->name); ?></h2>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class=" card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Section Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sort_section">
                                            <?php $__currentLoopData = $bundle->section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-id="<?php echo e($s->id); ?>">
                                                    <td>
                                                        <?php echo e($s->name); ?>

                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(route('public.bundle.section.edit', [$bundle->id, $s->id])); ?>"
                                                            class="btn btn-outline-primary"><i class="fa fa-pencil"></i>
                                                            Rename
                                                        </a>
                                                        <a href="<?php echo e(route('public.bundle.files.create', [$bundle->id, $s->id])); ?>"
                                                            class="btn btn-outline-primary"><i class="fa fa-plus"></i>
                                                            Add
                                                            File</a>
                                                        <a href="<?php echo e(route('section.show', $s->id)); ?>"
                                                            class="btn btn-outline-primary"><i class="fa fa-eye"></i>
                                                            View
                                                            File</a>
                                                        <a href="<?php echo e(route('public.bundle.section.destroy', [$s->id])); ?>"
                                                            class="btn btn-outline-danger"><i class="fa fa-trash"></i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card ">
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
                                    <form action="<?php echo e(route('section.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="bundle_id" value="<?php echo e($bundle->id); ?>">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="text" placeholder="Section Name" class="form-control"
                                                    name="name">
                                            </div>
                                            <div class="col-sm-4"><input type="submit" class="btn btn-success"
                                                    value="Create" /></div>
                                        </div>
                                    </form>
                                </div>
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
        $(document).ready(function() {
            $('tbody').sortable();

            function updateToDatabase(idString) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    }
                });

                $.ajax({
                    url: '<?php echo e(url('/bundle/section/update-order')); ?>',
                    method: 'POST',
                    data: {
                        ids: idString
                    },
                    success: function() {
                        //  alert('Successfully updated')
                        //do whatever after success
                    }
                })
            }

            var target = $('.sort_section');
            target.sortable({
                update: function(e, ui) {
                    var sortData = target.sortable('toArray', {
                        attribute: 'data-id'
                    })
                    updateToDatabase(sortData.join(','))
                }
            })

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\bundler\resources\views/backend/pages/bundle/show.blade.php ENDPATH**/ ?>