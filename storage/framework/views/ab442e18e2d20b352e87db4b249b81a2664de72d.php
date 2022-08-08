
<div>
    <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <img src="<?php echo e(storage_path('app/public/files/' . $img)); ?>" alt='<?php echo e($img); ?>' style="width: 100%"><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php /**PATH E:\laragon\www\bundler\resources\views/imgPdf.blade.php ENDPATH**/ ?>