<h1 style="text-align:center">INDEX</h1>
<table style="width:100%;text-align:left">
    <thead>
        <tr>
            <th></th>
            <th>Pages</th>
        </tr>
    </thead>
    <?php
        $filePageStart = 1;
        $filePageEnd = 0;
        $j = 0;
        $start = 1;
    ?>
    <?php $__currentLoopData = $allsections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($sec->isDefault == 1): ?>
        <?php else: ?>
            <?php $__currentLoopData = $sec->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $j = $j + $item->totalPage;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th><?php echo e($sec->name); ?></th>
                <th><?php echo e($start); ?>-<?php echo e($j); ?></th>
            </tr>
            <?php $__currentLoopData = $sec->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($sec->name); ?></td>
                    <td><?php echo e($filePageStart); ?>-<?php echo e($filePageEnd = $filePageEnd + $item->totalPage); ?></td>
                </tr>
                <?php
                    $filePageStart += $item->totalPage;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php
                $start += $sec->files->sum('totalPage');
            ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php /**PATH D:\LSKIT\bundler\resources\views/indexAllPdf.blade.php ENDPATH**/ ?>