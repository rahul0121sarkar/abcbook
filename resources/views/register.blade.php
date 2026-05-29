<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="insert" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="title">Title</label>
        <input type="text" name="title" id="title">

        <label for="author_name">Author_name</label>
        <input type="text" name="author_name" id="author_name">

        <label for="price">Price</label>
        <input type="text" name="price" id="price">

        <label for="description">Description</label>
        <input type="text" name="description" id="description">

        <label for="author">Author</label>
        <input type="text" name="author" id="author">

        <label for="comment">Comment</label>
        <input type="text" name="comment" id="comment">

        <button type="submit">Sumbit</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>