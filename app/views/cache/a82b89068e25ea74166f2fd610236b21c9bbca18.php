<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Actualizar Tarea</title>
</head>

<body>

    

    <?php $__env->startSection('usuario'); ?>
    <p>Hora acceso: <?=$_SESSION['hora']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" style="color: white;" class="fa fa-sign-out"></a> Log out</p>
    <p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('cuerpo'); ?>

    <h1>Actualizar usuario</h1>

    <form action='../controllers/procesarActualizarUsuario.php?nif=<?= $nif ?>' method="post">
  
            <div class="form-group">
                <label for="" class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" value="<?= isset($datosUsuario["nombre"]) ? $datosUsuario["nombre"] : valorPost('nombre')?>">
                <?=verError('nombre')?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Clave</label>
                <input class="form-control" type="text" name="clave" value="<?= isset($datosUsuario["clave"]) ? $datosUsuario["clave"] : valorPost('clave')?>">
                <?=verError('clave')?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Teléfono</label>
                <input class="form-control" type="text" name="telefono" value="<?= isset($datosUsuario["telefono"]) ? $datosUsuario["telefono"] : valorPost('telefono')?>">
                <?=verError('telefono')?>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-dark">Actualizar usuario</button><br><br>
            </div>
        
        </form>

    </div>

    <?php $__env->stopSection(); ?>
    
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\proyecto\app\views/formularioActualizarUsuario.blade.php ENDPATH**/ ?>