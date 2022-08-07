<h1 style="text-align:center"><?php echo $heading; ?></h1>
<table style="width:100%;text-align:left">
    <thead>
        <tr>
            <th style="width: 15%;"></th>
            <th style="width: 80%;"></th>
            <th style="width: 10%;text-align:right">Pages</th>
        </tr>
    </thead>
    <?php
        $filePageStart = 1;
        $filePageEnd = 0;
        $j = 0;
        $start = 1;
        $i = 1;
    ?>
    <?php $__currentLoopData = $allsections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($sec->isDefault == 1 && $sec->isHiddenInList == 1): ?>
        <?php else: ?>
            <?php $__currentLoopData = $sec->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $j = $j + $item->totalPage;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th>Section <?php echo e($i++); ?> : </th>
                <th style="text-align:left"><?php echo e($sec->name); ?></th>
                <th style="text-align:right"><?php echo e($start); ?>-<?php echo e($j); ?></th>
            </tr>
            <?php $__currentLoopData = $sec->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $filePageEnd = $filePageEnd + $item->totalPage;
                ?>
                <tr>
                    <td></td>
                    <td style="text-align:left"><?php echo e($item->filename); ?></td>
                    <td style="text-align:right"><?php echo e($filePageStart); ?>-<?php echo e($filePageEnd); ?></td>
                </tr>
                <?php
                    $filePageStart += $item->totalPage;
                ?>
                
                <?php
                    if ($heading == 'INDEX'):
                        DB::table('files')
                            ->where('id', $item->id)
                            ->update(['pages' => $filePageStart . '-' . $filePageEnd]);
                    endif;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php
                $start += $sec->files->sum('totalPage');
            ?>
            
            <?php
                if ($heading == 'INDEX'):
                    DB::table('sections')
                        ->where('id', $sec->id)
                        ->update(['pages' => $start . '-' . $j]);
                endif;
            ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php /**PATH E:\laragon\www\bundler\resources\views/indexAllPdf.blade.php ENDPATH**/ ?>