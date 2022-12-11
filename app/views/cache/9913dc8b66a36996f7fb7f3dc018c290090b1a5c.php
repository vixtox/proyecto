<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lista de Tareas Pendientes</title>
</head>

<body>
    

    <?php $__env->startSection('usuario'); ?>
    <p>Hora acceso: <?=$_SESSION['hora']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" style="color: white;" class="fa fa-sign-out"></a> Log out</p>
    <p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('cuerpo'); ?>
    
    <?= creaTable('filtrarTareas', $nombreCampos, $nombreCamposTabla, $listaValores, "id") ?>

    <a href="../controllers/procesarFiltrarTareas.php?pagina=1&condicion=<?=$condicion?>" class="btn btn-dark" role='button'>Primera</a>

    <a href="../controllers/procesarFiltrarTareas.php?pagina=<?=($pagina==1) ? $pagina : $pagina - 1 ?>&condicion=<?=$condicion?>" class="btn btn-dark" role='button'><<</a>

    <span>Página <?=$pagina ?></span>

    <a href="../controllers/procesarFiltrarTareas.php?pagina=<?=($pagina==$totalPaginas) ? $pagina : $pagina + 1 ?>&condicion=<?=$condicion?>" class="btn btn-dark" role='button'>>></a>

    <a href="../controllers/procesarFiltrarTareas.php?pagina=<?=$totalPaginas?>&condicion=<?=$condicion?>" class="btn btn-dark" role='button'>Última</a>

    <span>Nº páginas: <?=$totalPaginas ?></span>
    <br><br>

    <?php $__env->stopSection(); ?>
</body>

</html>

<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\proyecto\app\views/listaFiltrarTarea.blade.php ENDPATH**/ ?>