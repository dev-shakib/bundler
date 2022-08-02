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
                        <li class="breadcrumb-item"><a href="<?php echo e(route('public.home')); ?>">Home</a></li>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal"><i class="fa fa-plus"></i>
                                        Add
                                        File
                                    </button><br>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Section Name</th>
                                                <th>Total Page</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sort_section">
                                            <?php $__currentLoopData = $bundle->section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($s->name == 'Index'): ?>
                                                <?php else: ?>
                                                    <tr data-id="<?php echo e($s->id); ?>">
                                                        <td>
                                                            <?php echo e($s->name); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($s->files->sum('totalPage')); ?>

                                                        </td>
                                                        <td>
                                                            <a href="<?php echo e(route('public.bundle.section.edit', [$bundle->id, $s->id])); ?>"
                                                                class="btn btn-outline-primary"><i class="fa fa-pencil"></i>
                                                                Rename
                                                            </a>

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
                                                <?php endif; ?>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('public.bundle.files.store')); ?>" enctype="multipart/form-data" method="post"
                        id="image-upload" class="dropzone">
                        <?php echo csrf_field(); ?>
                        <label>SECTION</label>
                        <select class="form-control" id="sectionId" name="section_id" required>
                            <?php $__currentLoopData = $bundle->section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->name == 'Index'): ?>
                                <?php else: ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select><br>
                        <input type="hidden" name="bundle_id" value="<?php echo e($bundle->id); ?>" />
                        <div>
                            <h3>Upload .jpeg,.jpg,.png,.gif,.doc,.docx,.pdf By Click On Box</h3>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onClick="window.location.reload();"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        $("#sectionId").on('change', function() {
            if (!$(this).val() == "") {
                $('#image-upload').addClass('dropzone');
            } else {
                $('#image-upload').removeClass('dropzone');
            }
        });
        Dropzone.options.imageUpload = {
            maxFilesize: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.docx,.pdf",
            init: function() {
                //now we will submit the form when the button is clicked
                this.on("success", function(files, response) {
                    // location.href = home; // this will redirect you when the file is added to dropzone
                    location.reload();
                });
            }

        };
    </script>
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LSKIT\bundler\resources\views/backend/pages/bundle/show.blade.php ENDPATH**/ ?>