<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lista de Tareas Pendientes</title>
</head>

<body>
    @extends('_template')
    @section('cuerpo')
    
    <?= creaTable('filtrarTareas', $nombreCampos, $nombreCamposTabla, $tareas, "id") ?>

    @endsection
</body>

</html>
