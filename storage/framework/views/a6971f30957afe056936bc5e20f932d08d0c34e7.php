

<?php $__env->startSection('template_title'); ?>
    <?php echo e(Auth::user()->name); ?>'s' Bundle
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-css'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="<?php echo e(route("bundle.index")); ?>">Bundle</a></li>
                        <li class="breadcrumb-item "><a href="<?php echo e(route('bundle.show_single', [$section->bundle->slug, $section->bundle->id])); ?>"><?php echo e($section->bundle->name); ?></a></li>
                        <li class="breadcrumb-item "><a href="<?php echo e(route('public.bundle.section.edit', [$section->bundle->id, $section->id])); ?>"><?php echo e($section->name); ?></a></li>
                        <li class="breadcrumb-item active">Add</li>
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
                            <form action="<?php echo e(route('public.bundle.files.store')); ?>" enctype="multipart/form-data"
                                method="post" id="image-upload" class="dropzone">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="bundle_id" value="<?php echo e($bundle_id); ?>" />
                                <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>" />
                                <div>
                                    <h3>Upload .jpeg,.jpg,.png,.gif,.doc,.docx,.pdf By Click On Box</h3>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.docx,.pdf",
            init: function() {
                var home = "<?php echo e(route('section.show', [$section_id])); ?>";
                //now we will submit the form when the button is clicked
                this.on("success", function(files, response) {
                    location.href = home; // this will redirect you when the file is added to dropzone
                    //location.reload();
                });
            }
        };
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\bundler\resources\views/backend/pages/bundle/files/create.blade.php ENDPATH**/ ?>