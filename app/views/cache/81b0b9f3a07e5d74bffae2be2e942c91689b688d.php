<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lista de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>

    

    <?php $__env->startSection('usuario'); ?>
    <p><a href="../index.php" style="color: white;" class="fa fa-sign-out"></a>  Hora inicio sesion: <?=$_SESSION['hora']?></p>
    <p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>
    <?php $__env->stopSection(); ?>


    <?php $__env->startSection('cuerpo'); ?>

    <?= creaTable('listaTareas', $nombreCampos, $nombreCamposTabla, $listaValores) ?>

    <a href="?pagina=1" class="btn btn-dark" role='button'>Primera</a>

    <a href="?pagina=<?=($pagina==1) ? $pagina : $pagina - 1 ?>" class="btn btn-dark" role='button'><<</a>

    <span>Página <?=$pagina ?></span>

    <a href="?pagina=<?=($pagina==$totalPaginas) ? $pagina : $pagina + 1 ?>" class="btn btn-dark" role='button'>>></a>

    <a href="?pagina=<?=$totalPaginas?>" class="btn btn-dark" role='button'>Última</a>

    <span>Nº páginas: <?=$totalPaginas ?></span>
    <br><br>

    <form action="../controllers/procesarListaTareas.php" method="get">
            <input class="form-control" type="text" name="numPag">
            <button class="btn btn-dark">Ir a página</button>
    </form>

    <?php $__env->stopSection(); ?>

</body>
</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\proyecto\app\views/listaTareas.blade.php ENDPATH**/ ?>