<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$title}}</h1>
    <img src="{{ asset('storage/img') }}/{{$item}}" alt="" height="300px" width="300px">
    <p>{{$desc}}</p>

</body>
</html>