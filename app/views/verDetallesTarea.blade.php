<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @extends('_template')
    @section('cuerpo')

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NIF/CIF</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Descripción</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Población</th>
            <th>Código Postal</th>
            <th>Provincias</th>
            <th>Estado</th>
            <th>Fecha de Creacion</th>
            <th>Operario Encargado</th>
            <th>Fecha de Realizacion</th>
            <th>Anotaciones Anteriores</th>
            <th>Anotaciones Posteriores</th>
            <th>Archivo Resumen</th>
            <th>Fotos</th>
        </tr>
        <tr>
            <td><?= $datosTarea['id'] ?></td>
            <td><?= $datosTarea['nif_cif'] ?></td>
            <td><?= $datosTarea['nombre'] ?></td>
            <td><?= $datosTarea['apellidos'] ?></td>
            <td><?= $datosTarea['telefono'] ?></td>
            <td><?= $datosTarea['descripcion'] ?></td>
            <td><?= $datosTarea['correo'] ?></td>
            <td><?= $datosTarea['direccion'] ?></td>
            <td><?= $datosTarea['poblacion'] ?></td>
            <td><?= $datosTarea['codigo_postal'] ?></td>
            <td><?= $datosTarea['provincia'] ?></td>
            <td><?= $datosTarea['estado'] ?></td>
            <td><?= $datosTarea['fecha_creacion'] ?></td>
            <td><?= $datosTarea['operario_encargado'] ?></td>
            <td><?= $datosTarea['fecha_realizacion'] ?></td>
            <td><?= $datosTarea['anotaciones_ant'] ?></td>
            <td><?= $datosTarea['anotaciones_pos'] ?></td>
            <td><?= ($datosTarea['arch_resumen'] != "") ? "<a class='btn btn-warning' href='../archivos/" . $datosTarea['arch_resumen'] . "' download='" . $datosTarea['arch_resumen'] . "'>Descargar</a>" : "" ?> </td>
            <td><?= ($datosTarea['fotos'] != "") ? "<a class='btn btn-warning' href='../archivos/" . $datosTarea['fotos'] . "' download='" . $datosTarea['fotos'] . "'>Descargar</a>" : "" ?> </td>
        </tr>
    </table>
    <a class="btn btn-info" href="..//controllers/procesarlistaTareas.php">Volver atras</a>
    @endsection

</body>

</html>