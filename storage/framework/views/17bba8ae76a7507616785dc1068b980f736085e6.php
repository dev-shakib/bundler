

<?php $__env->startSection('template_title'); ?>
    <?php echo e(Auth::user()->name); ?>'s' Bundle
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-css'); ?>
<?php $__env->stopPush(); ?>
<?php
$enrolled_package = auth()
    ->user()
    ->load('enrolledPackage')->enrolledPackage;
?>
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
                        <li class="breadcrumb-item "><a href="<?php echo e(route('bundle.index')); ?>">Bundle</a></li>
                        <li class="breadcrumb-item active"><?php echo e($bundle->name); ?> List</li>
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
                <section class="col-lg-12 connectedSortable">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="row align-items-center">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <h2 class="text-center py-4 m-0"><b><?php echo e($bundle->name); ?></b></h2>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <button type="button" class="btn btn-lg btn-warning" id="bundle-tour-button">
                                        <i class="fa fa-question"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <span class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Add Section">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#sectioncreatemodal" id="bundle-tour-1">
                                            <i class="fa fa-folder-open-o"></i>
                                        </button>
                                    </span>
                                    <div class="modal fade" id="sectioncreatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Create Section</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?php echo e(route('section.store')); ?>" method="post">
                                                    <div class="modal-body">
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
                                                        <input type="hidden" name="bundle_id" value="<?php echo e($bundle->id); ?>">
                                                        <input type="text" placeholder="Section Name" class="form-control" name="name" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Create" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <span class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Upload Document">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"  id="bundle-tour-2"
                                            data-target="#exampleModal">
                                            <i class="fa fa-upload"></i>
                                        </button>
                                    </span>

                                    <?php if($enrolled_package->package_id == 1): ?>
                                        <?php if($bundle->totalPages() < 60): ?>
                                            <?php if($bundle->generated->count() == 0): ?>
                                                <a href="<?php echo e(route('public.bundle.generate', [$bundle->id])); ?>" data-toggle="tooltip" data-placement="top" title="Generate Bundle" id="bundle-tour-3"
                                                    class="btn btn-info"><i class="fa fa-file-text"></i></a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="#" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Generate Bundle" id="bundle-tour-3"><i class="fa fa-file-text"></i></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if($bundle->generated->count() == 0): ?>
                                            <a href="<?php echo e(route('public.bundle.generate', [$bundle->id])); ?>" data-toggle="tooltip" data-placement="top" title="Generate Bundle" id="bundle-tour-3"
                                                class="btn btn-info"><i class="fa fa-file-text"></i></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($enrolled_package->package_id == 1): ?>
                                        <?php if($bundle->totalPages() < 60): ?>
                                            <a href="<?php echo e(route('public.bundle.generated_bundle', [$bundle->id])); ?>" data-toggle="tooltip" data-placement="top" title="View Generated Bundle" id="bundle-tour-4"
                                                class="btn btn-info"><i class="fa fa-file-pdf-o"></i></a>
                                        <?php else: ?>
                                            <a href="#" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View Generated Bundle" id="bundle-tour-4"><i class="fa fa-file-pdf-o"></i></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('public.bundle.generated_bundle', [$bundle->id])); ?>" data-toggle="tooltip" data-placement="top" title="View Generated Bundle" id="bundle-tour-4"
                                            class="btn btn-info"><i class="fa fa-file-pdf-o"></i></a>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-6">
                                    <ol class="breadcrumb float-sm-right m-0 p-0 bg-transparent">
                                        <li class="breadcrumb-item text-uppercase text-bold "><a href="<?php echo e(route('bundle.index')); ?>">Bundle</a></li>
                                        <li class="breadcrumb-item text-bold"><?php echo e($bundle->name); ?> List</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Section Name</th>
                                        <th>Total Page</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="sort_section">
                                    <?php $__currentLoopData = $bundle->section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($s->isHiddenInList == 1): ?>
                                        <?php else: ?>
                                            <tr data-id="<?php echo e($s->id); ?>"  class="clickable-row" data-href="<?php echo e(route('section.show', $s->id)); ?>">
                                                <td class="py-1 pl-3 align-middle">
                                                    <?php echo e($s->name); ?>

                                                </td>
                                                <td class="py-1 pl-3 align-middle">
                                                    <?php echo e($s->files->sum('totalPage')); ?>

                                                </td>
                                                <td class="py-1 pl-3 align-middle text-right">
                                                    <a href="<?php echo e(route('section.show', $s->id)); ?>" data-toggle="tooltip" data-placement="top" title="View"
                                                        class="btn btn-primary d-inline-block"><i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('public.bundle.section.edit', [$bundle->id, $s->id])); ?>" data-toggle="tooltip" data-placement="top" title="Rename"
                                                        class="btn btn-primary d-inline-block"><i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('public.bundle.section.destroy', [$s->id])); ?>" data-toggle="tooltip" data-placement="top" title="Delete"
                                                        class="btn btn-danger d-inline-block"><i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
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
                                <?php if($item->isHiddenInList == 1): ?>
                                <?php else: ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select><br>
                        <input type="hidden" name="bundle_id" value="<?php echo e($bundle->id); ?>" />
                        <div class="text-center">
                            <p>Upload .jpeg,.jpg,.png,.gif,.doc,.docx,.pdf By Click On Box</p>
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

        // tour setup 
        var tour = {
            id: 'bundle-tour',
            steps: [
                {
                    target: 'bundle-tour-1',
                    title: 'Click to Create New Section',
                    content: 'Click Here to create new Section',
                    placement: 'top',
                    arrowOffset: 5
                },
                {
                    target: 'bundle-tour-2',
                    title: 'Click to Upload Document',
                    content: 'Click to Upload Document',
                    placement: 'top',
                    arrowOffset: 5
                },
                {
                    target: 'bundle-tour-3',
                    title: 'Click to Generate Bundle',
                    content: 'Click to Generate Bundle',
                    placement: 'top',
                    arrowOffset: 5
                },
                {
                    target: 'bundle-tour-4',
                    title: 'Click to View Generated Bundle',
                    content: 'Click to View Generated Bundle',
                    placement: 'top',
                    arrowOffset: 5
                },
            ],
            showPrevButton: true,
        },
        addClickListener = function(el, fn) {
            if (el.addEventListener) {
            el.addEventListener('click', fn, false);
            }
            else {
            el.attachEvent('onclick', fn);
            }
        },
        init = function() {
            var startBtnId = 'bundle-tour-button',
                calloutId = 'startTourCallout',
                mgr = hopscotch.getCalloutManager(),
                state = hopscotch.getState();
        
            addClickListener(document.getElementById(startBtnId), function() {
            if (!hopscotch.isActive) {
                mgr.removeAllCallouts();
                hopscotch.startTour(tour);
            }
            });
        };
        init();
        init();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\bundler\resources\views/backend/pages/bundle/show.blade.php ENDPATH**/ ?>