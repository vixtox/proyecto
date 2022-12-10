<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>

    

    
    <?php $__env->startSection('usuario'); ?>
    <p>Hora acceso: <?=$_SESSION['hora']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" style="color: white;" class="fa fa-sign-out"></a> Log out</p>
    <p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>
    <?php $__env->stopSection(); ?>

    
    <?php $__env->startSection('cuerpo'); ?>

    <div>
        <h1>Insertar usuario</h1>
        <form action="../controllers/procesarInsertarUsuario.php" method="post">
            <div class="form-group">
                <label for=""  class="form-label">NIF/CIF</label>
                <input class="form-control"  type="text" name="nif" value="<?=valorPost('nif')?>">
                <span><?=verError('nif')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" value="<?=valorPost('nombre')?>">
                <span><?=verError('nombre')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Clave</label>
                <textarea class="form-control" id="clave" name="clave" rows="2" cols="50"><?=valorPost('clave')?></textarea>
                <span><?=verError('clave')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Correo electrónico</label>
                <input class="form-control" type="text" name="correo" value="<?=valorPost('correo')?>">
                <span><?=verError('correo')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Teléfono</label>
                <input class="form-control" type="text" name="telefono" value="<?=valorPost('telefono')?>">
                <span><?=verError('telefono')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Selecciona tipo usuario</label><br>
                <span>Operario &nbsp;</span><input class="form-check-input" type="radio" id="es_admin" name="es_admin" value="0" <?= ValorPost('es_admin') == 0 ? 'checked' : '' ?>>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Administrador &nbsp;</span><input class="form-check-input" type="radio" id="es_admin" name="es_admin" value="1" <?= ValorPost('es_admin') == 1 ? 'checked' : '' ?>>
            <br><br>
            </div>
            <div class="form-group">
                <button class="btn btn-dark">Registrar usuario</button>
            </div>
        
        </form><br><br>

    </div>

    <?php $__env->stopSection(); ?>
    
</body>
</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\proyecto\app\views/formularioInsertarUsuario.blade.php ENDPATH**/ ?>