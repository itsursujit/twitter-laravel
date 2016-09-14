<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="/upload" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <input type="file" name="image" id="image">
    <input type="submit" value="Submit">
</form>
</body>
</html>