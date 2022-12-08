<!DOCTYPE html>
<html lang="en">

<body>

    
    <?php $__env->startSection('cuerpo'); ?>

    <h1>Completar tarea</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NIF/CIF</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Población</th>
            <th>Estado</th>
            <th>Fecha de Creacion</th>
            <th>Operario Encargado</th>
            <th>Fecha de Realizacion</th>
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
            <textarea class="form-control" name="anotaciones_ant" rows="2" cols="50"><?= valorPost('anotaciones_ant') ?></textarea><br><br>
        </div>

        <div class="form-group">
            <label for="" class="form-label">Anotaciones posteriores</label>
            <textarea class="form-control" name="anotaciones_pos" rows="2" cols="50"><?= valorPost('anotaciones_pos') ?></textarea><br><br>
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
            <button class="btn btn-primary">Completar tarea</button>
        </div>

    </form>

    <?php $__env->stopSection(); ?>

</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\proyecto\app\views/formularioCompletarTarea2.blade.php ENDPATH**/ ?>