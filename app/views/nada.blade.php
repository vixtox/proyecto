<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/94d5779c24.js" crossorigin="anonymous"></script>
</head>
<body>
@extends('_template')

@section('usuario')
<p><a href="../index.php" style="color: white;" class="fa fa-sign-out"></a>  Hora inicio sesion: <?=$_SESSION['hora']?></p>
<p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>

@endsection

@section('cuerpo')

@endsection
</body>
</html>