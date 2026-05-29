<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>S.no</th>
            <th>Image</th>
            <th>Pdf</th>
        </tr>
        <?php
        $sn = 1;
        ?>
        <?php $__currentLoopData = $display; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php //dd($key);?>
        <tr>
            <td><?=$sn++;?></td>
            <td><img src="uploads/<?php echo e($key->image); ?>" alt=""></td>
            <td><a href="bookpdf/<?php echo e($key->file); ?>">View</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html><?php /**PATH D:\laravel files\ecom\resources\views/table.blade.php ENDPATH**/ ?>