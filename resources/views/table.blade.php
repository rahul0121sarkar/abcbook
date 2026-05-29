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
        @foreach($display as $key)
        <?php //dd($key);?>
        <tr>
            <td><?=$sn++;?></td>
            <td><img src="uploads/{{$key->image}}" alt=""></td>
            <td><a href="bookpdf/{{$key->file}}">View</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>