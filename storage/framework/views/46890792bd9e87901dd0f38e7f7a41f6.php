<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="image_insert" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
       

        <label for="comment">Comment</label>
        <input type="file" name="file" id="comment">

        <button type="submit">Sumbit</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html><?php /**PATH D:\ecom\resources\views/ima.blade.php ENDPATH**/ ?>