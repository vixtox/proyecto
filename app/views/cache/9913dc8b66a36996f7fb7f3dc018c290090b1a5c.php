<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lista de Tareas Pendientes</title>
</head>

<body>
    
    <?php $__env->startSection('cuerpo'); ?>
    
    <?= creaTable('filtrarTareas', $nombreCampos, $nombreCamposTabla, $tareas, "id") ?>

    <?php $__env->stopSection(); ?>
</body>

</html>

<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\proyecto\app\views/listaFiltrarTarea.blade.php ENDPATH**/ ?>