<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('template_title'); ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo e(asset('admin/')); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/')); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/')); ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/')); ?>/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/')); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/')); ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/')); ?>/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- hopscotch -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/')); ?>/css/hopscotch.min.css">
    <link href="<?php echo e(mix('/css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('custom-css'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo e(asset('admin')); ?>/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>
        <?php echo $__env->make('backend.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('backend.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </div>


        <?php echo $__env->make('backend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        // $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo e(asset('admin/')); ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/moment/moment.min.js"></script>
    <script src="<?php echo e(asset('admin/')); ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo e(asset('admin/')); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('admin/')); ?>/js/adminlte.js"></script>
    <!-- hopscotch -->
    <script src="<?php echo e(asset('admin/')); ?>/js/hopscotch.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo e(asset('admin/')); ?>/js/demo.js"></script>
    <!-- Custom js for a perticular page -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <?php echo $__env->yieldPushContent('custom-script'); ?>
    
    <?php echo $__env->yieldContent('footer_scripts'); ?>
    <?php echo $__env->make('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
            $(this).css('cursor', 'pointer');
        });
        $(".clickable-row").hover(function() {
            $(this).css('cursor', 'pointer');
        });
    </script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('admin/')); ?>/js/pages/dashboard.js"></script>
</body>

</html>
<?php /**PATH D:\LSKIT\bundler\resources\views/backend/layouts/app.blade.php ENDPATH**/ ?>