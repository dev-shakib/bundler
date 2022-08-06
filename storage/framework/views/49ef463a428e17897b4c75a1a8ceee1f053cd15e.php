

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

    <div style="display: none">
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

            <div class="row mt-3 justify-content-center">
                <div class="col-5 text-center">
                    <?php if($enrolled_package->package_id == 1): ?>
                        <div class="card bg-danger">
                            <div class="card-body p-2">
                                You are now free Plan Please Upgrad Your Plan
                                <a href="<?php echo e(route('public.choosePlan')); ?>" class="btn btn-dark ml-3">UPGRADE</a>
                            </div>
                        </div>
                    <?php elseif($enrolled_package->package_id == 2): ?>
                        <div class="card bg-primary">
                            <div class="card-body p-2">
                                UPGRADE TO UNLIMITED
                                <a href="<?php echo e(route('public.choosePlan')); ?>" class="btn btn-success ml-3">UPGRADE</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                
                <div class="mb-3">
                    <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i>
                        New Bundle
                    </button>
                </div>
                  
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">New Bundle</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
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
                                        <div class="modal-body">
                                            <input type="text" placeholder="Bundle Name" class="form-control"
                                                    name="name" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary"
                                                value="Create" />
                                        </div>
                                    </form>
                                    <?php else: ?>
                                        <div class="modal-body text-danger">
                                            You are now free Plan Please Upgrad Your Plan
                                        </div>
                                        
                                        <div class="modal-footer justify-content-start">
                                                <a href="<?php echo e(route('public.choosePlan')); ?>" class="btn btn-danger">UPGRADE</a>
                                            </div>
                                <?php endif; ?>
                            <?php elseif($enrolled_package->package_id == 2): ?>
                                <?php if(intval(count($bundle)) < 5): ?>
                                    <form action="<?php echo e(route('bundle.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="modal-body">
                                            <input type="text" placeholder="Bundle Name" class="form-control"
                                                    name="name" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary"
                                                value="Create" />
                                        </div>
                                    </form>
                                <?php endif; ?>
                            <?php else: ?>
                                <form action="<?php echo e(route('bundle.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                        <input type="text" placeholder="Bundle Name" class="form-control"
                                                name="name" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary"
                                            value="Create" />
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                    <?php if(Session::has('message')): ?>
                        <div class="alert alert-success">
                            <h4><?php echo e(Session::get('message')); ?></h4>
                        </div>
                    <?php endif; ?>

                    <div style="display: none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Bundle Name</th>
                                <th>Created</th>
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
                                    <td><?php echo e($b->created_at); ?></td>
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

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Bundle Name</th>
                                <th>Created</th>
                                <th>Total Page</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $bundle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <a href="">
                                <td class="py-1 pl-3 align-middle">
                                    <?php echo e($b->name); ?>

                                </td>

                                <td class="py-1 pl-3 align-middle"><?php echo e($b->created_at); ?></td>

                                <td class="py-1 pl-3 align-middle">
                                    <?php echo e($b->totalPages()); ?>

                                </td>

                                <td class="py-1 pl-3 align-middle text-right">
                                    <a title="view" href="<?php echo e(route('bundle.show_single', [$b->slug, $b->id])); ?>" class="text-white">
                                        <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                    </a>

                                    <a title="rename" href="<?php echo e(route('bundle.edit', $b->id)); ?>">
                                    <button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button>
                                    </a>

                                    <form title="delete" action="<?php echo e(route('bundle.destroy', [$b->id])); ?>" method="post" class="d-inline-block">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
    <!-- <script>
        $(document).ready(function() {
            $('table').DataTable({
                select: false,
                searching: false,
                paging: false,
            });
        });
    </script> -->
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\bundler\resources\views/backend/pages/bundle/index.blade.php ENDPATH**/ ?>