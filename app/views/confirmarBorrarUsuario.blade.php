<!DOCTYPE html>
<html lang="en">
<head>
    <title>Confirma borrar tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    @extends('_template')

    @section('usuario')
    <p>Hora acceso: <?=$_SESSION['hora']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" style="color: white;" class="fa fa-sign-out"></a> Log out</p>
    <p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>
    @endsection

    @section('cuerpo')

    <div class="container">
    <form action="">
        <br>
        <span class="form-control">Confirme para borrar el usuario <?=$_GET['nif']?></span><br>
        <a href="../controllers/procesarBorrarUsuario.php?nif=<?= $_GET['nif'] ?>" class='btn btn-danger' role='button'>SI</a>
        <a href="../controllers/procesarListaUsuarios.php" class='btn btn-primary' role='button'>NO</a><br><br>

    </form>
    </div>

    @endsection
    
</body>
</html>