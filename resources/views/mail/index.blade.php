<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Page</title>
</head>
<body>
<?php $x = App\Models\InternamlInvetation::find($invitation);?> 
    <h1>Hello M.r {{$x->fullName }} </h1>
    <p style="fontsize:18px;"> 
        please click on link below to verify your attendance
    </p>   
    <a href="http://localhost:8000/emailVerify/{{$x->id}}">verify</a>
</body>
</html>