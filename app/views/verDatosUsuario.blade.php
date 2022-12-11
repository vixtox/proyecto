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

    <table class="table table-bordered">
        <tr>   
            <thead class="table-dark">
                <th>NIF</th>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Es Admin</th>
            </thead>
        </tr>
        <tr>
            <td><?=$datosUsuario['nif']?></td>
            <td><?=$datosUsuario['nombre']?></td>
            <td><?=$datosUsuario['clave']?></td>
            <td><?=$datosUsuario['correo']?></td>
            <td><?=$datosUsuario['telefono']?></td>
            <td><?=$datosUsuario['es_admin']?></td>
        </tr>
    </table>

    @endsection
    
</body>
</html>