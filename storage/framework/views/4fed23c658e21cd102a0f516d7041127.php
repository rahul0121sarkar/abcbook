<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Book  elements</h4>
            <p class="card-description"> Book Details </p>
            <form action="<?php echo e(route('update', $show->id)); ?>" method="POST" enctype="multipart/form-data" class="forms-sample">
              <?php echo csrf_field(); ?>

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Enter Book Name" value="<?php echo e($show->title); ?>">
              </div>
              <div class="form-group">
                <label for="author_name">Author Name</label>
                <input type="text" name="author_name" class="form-control" id="exampleInputName1" placeholder="Enter Author Name" value="<?php echo e($show->author_name); ?>">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Book Price" value="<?php echo e($show->price); ?>">
              </div>
              <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" class="form-control" name="description" id="Description" placeholder="Enter book Description" value="<?php echo e($show->description); ?>">
              </div>
             
             
              <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="detail of author" value="<?php echo e($show->author); ?>">
              </div>
              <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" name="comment" id="exampleTextarea1" rows="4" placeholder="Enter books comment" value="<?php echo e($show->comment); ?>"></textarea>
              </div>

              <div class="form-group">
                <label>File upload</label>
                <input type="file" name="image" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" value="<?php echo e($show->image); ?>">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-dark">Cancel</button>
            </form>
          </div>
        </div>
      </div>
</body>
</html><?php /**PATH D:\laravel files\ecom\resources\views/detail.blade.php ENDPATH**/ ?>