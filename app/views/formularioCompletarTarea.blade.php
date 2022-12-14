<!DOCTYPE html>
<html lang="en">

<body>

    @extends('_template')

    @section('usuario')
    <p>Hora acceso: <?=$_SESSION['hora']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" style="color: white;" class="fa fa-sign-out"></a> Log out</p>
    <p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>
    @endsection

    @section('cuerpo')

    <h1>Completar tarea</h1>

    <table class="table table-bordered border-secondary">
        <tr>
        <thead class="table-dark">
            <th>ID</th>
            <th>NIF/CIF</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Población</th>
            <th>Estado</th>
            <th>Fecha de Creacion</th>
            <th>Operario Encargado</th>
            <th>Fecha de Realizacion</th>
        </thead>
        </tr>
        <tr>
            <td><?= $datosTarea['id'] ?></td>
            <td><?= $datosTarea['nif_cif'] ?></td>
            <td><?= $datosTarea['nombre'] ?></td>
            <td><?= $datosTarea['descripcion'] ?></td>
            <td><?= $datosTarea['poblacion'] ?></td>
            <td><?= $datosTarea['estado'] ?></td>
            <td><?= $datosTarea['fecha_creacion'] ?></td>
            <td><?= $datosTarea['operario_encargado'] ?></td>
            <td><?= $datosTarea['fecha_realizacion'] ?></td>
        </tr>
    </table>

    <select class="form-select" name="estado">
        <option value="B" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'B' ? 'selected' : '' ?>>B=Esperando ser aprobada</option>
        <option value="P" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'P' ? 'selected' : '' ?>>P=Pendiente</option>
        <option value="R" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'R' ? 'selected' : '' ?>>R=Realizada</option>
        <option value="C" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'C' ? 'selected' : '' ?>>C=Cancelada</option>
    </select> <br>

    <form action="../controllers/procesarCompletarTarea.php?id=<?= $id ?>" method='post' enctype="multipart/form-data">

        <div class="form-group">
            <label for="" class="form-label">Anotaciones anteriores</label>
            <textarea class="form-control" name="anotaciones_ant" rows="2" cols="50"><?= isset($datosTarea["anotaciones_ant"]) ? $datosTarea["anotaciones_ant"] : "" ?></textarea><br><br>
         <?=verError('anotaciones_ant')?>
        </div>

        <div class="form-group">
            <label for="" class="form-label">Anotaciones posteriores</label>
            <textarea class="form-control" name="anotaciones_pos" rows="2" cols="50"><?= isset($datosTarea["anotaciones_pos"]) ? $datosTarea["anotaciones_pos"] : "" ?></textarea><br><br>
            <?=verError('anotaciones_pos')?>
        </div>

        <div class="form-group">
            <label for="" class="form-label">Subir archivo</label>
            <input class="form-control" type="file" name="arch_resumen"><br><br>
        </div>

        <div class="form-group">
            <label for="" class="form-label">Subir fotos</label>
            <input class="form-control" type="file" name="fotos"><br><br>
        </div>

        <div class="form-group">
            <button class="btn btn-dark">Completar tarea</button><br><br>
        </div>

    </form>

    @endsection

</body>

</html>