<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver detalles tarea</title>
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
            <th>ID</th>
            <td><?= $datosTarea['id'] ?></td>
        </tr>
        <tr>
            <th>NIF/CIF</th>
            <td><?= $datosTarea['nif_cif'] ?></td>
        </tr>
        <tr>
        <th>Nombre</th> 
        <td><?= $datosTarea['nombre'] ?></td>
        </tr>
        <tr>
        <th>Apellidos</th>
        <td><?= $datosTarea['apellidos'] ?></td>
        </tr>
        <tr>
        <th>Teléfono</th>
        <td><?= $datosTarea['telefono'] ?></td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td><?= $datosTarea['descripcion'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $datosTarea['correo'] ?></td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td><?= $datosTarea['direccion'] ?></td>
        </tr>
        <tr>
            <th>Población</th>
            <td><?= $datosTarea['poblacion'] ?></td>
        </tr>
        <tr>
            <th>Código Postal</th>
            <td><?= $datosTarea['codigo_postal'] ?></td>
        </tr>
        <tr>
            <th>Provincias</th>
            <td><?= $datosTarea['provincia'] ?></td>
        </tr>
        <tr>
            <th>Estado</th>
            <td><?= $datosTarea['estado'] ?></td>
        </tr>
        <tr>
            <th>Provincias</th>
            <td><?= $datosTarea['provincia'] ?></td>
        </tr>
        <tr>
            <th>Fecha de Creacion</th>
            <td><?= $datosTarea['fecha_creacion'] ?></td>
        </tr>
        <tr>
            <th>Operario</th>
            <td><?= $datosTarea['operario_encargado'] ?></td>
        </tr>
        <tr>
            <th>Fecha de Realizacion</th>
            <td><?= $datosTarea['fecha_realizacion'] ?></td>
        </tr>
        <tr>
            <th>Anotaciones Anteriores</th>
            <td><?= $datosTarea['anotaciones_ant'] ?></td>
        </tr>
        <tr>
            <th>Anotaciones Posteriores</th>
            <td><?= $datosTarea['anotaciones_pos'] ?></td>
        </tr>
        <tr>
            <th>Archivo Resumen</th>
            <td><?= ($datosTarea['arch_resumen'] != "") ? "<a class='btn btn-warning' href='../archivos/" . $datosTarea['arch_resumen'] . "' download='" . $datosTarea['arch_resumen'] . "'>Descargar</a>" : "" ?> </td>
        </tr>
        <tr>
            <th>Fotos</th>
            <td><?= ($datosTarea['fotos'] != "") ? "<a class='btn btn-warning' href='../archivos/" . $datosTarea['fotos'] . "' download='" . $datosTarea['fotos'] . "'>Descargar</a>" : "" ?> </td>
        </tr>

    </table>

    <a class="btn btn-dark" href="..//controllers/procesarlistaTareas.php">Volver atras</a><br><br>
    @endsection

</body>

</html>