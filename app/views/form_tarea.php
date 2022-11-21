<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario tareas</title>
</head>
<body>

    <h1>Formulario recogida de datos de Tareas</h1>

    <form action="../controllers/procesar_form.php" method="post">

        <label for="">NIF/CIF</label><!--CIF: A58818501-->
        <input type="text" name="nifCif" value="<?=ValorPost('nifCif')?>">
        <span><?=verError('nifCif')?></span>
        <br><br>

        <label for="">Persona de contacto</label>
        <input type="text" name="persContact" value="<?=ValorPost('persContact')?>">
        <span><?=verError('persContact')?></span>
        <br><br>

        <label for="">Teléfono</label>
        <input type="text" name="tel" value="<?=ValorPost('tel')?>">
        <span><?=verError('tel')?></span>
        <br><br>

        <label for="">Descripción</label>
        <textarea id="desc" name="desc" rows="2" cols="50"><?=ValorPost('desc')?></textarea>
        <span><?=verError('desc')?></span>
        <br><br>
        
        <label for="">Correo electrónico</label>
        <input type="text" name="email" value="<?=ValorPost('email')?>">
        <span><?=verError('email')?></span>
        <br><br>

        <label for="">Dirección</label>
        <input type="text" name="dir" value="<?=ValorPost('dir')?>"><br><br>

        <label for="">Población</label>
        <input type="text" name="pob" value="<?=ValorPost('pob')?>"><br><br>

        <label for="">Código postal</label>
        <input type="text" name="codPostal" value="<?=ValorPost('codPostal')?>">
        <span><?=verError('codPostal')?></span>
        <br><br>

        <select name="prov" id="prov">
            <option value="0">Selecciona provincia</option>

            <?php foreach ($conexion->getProvincias() AS $id => $valor): ?>

            <option value="<?php echo $id ?>"><?php echo $valor ?></option>

            <?php endforeach; ?>
        </select><br><br>

        <select name="estado" id="estado">
            <option value="">Selecciona estado de la tarea</option>
            <option value="B">B (Esperando ser aprobada)</option>
            <option value="P">P (Pendiente)</option>
            <option value="R">R (Realizada)</option>
            <option value="C">C (Cancelada)</option>
        </select><br><br>

        <select name="operario" id="operario">
            <option value="0">Selecciona operario</option>

            <?php foreach ($conexion->getOperarios() as $id => $valor): ?>

            <option value="<?php echo $id ?>"><?php echo $id . " " . $valor ?></option>

            <?php endforeach; ?>
        </select><br><br>

        <label for="">Fecha de realización</label>
        <input type="date" name="fechaReal" value="<?=ValorPost('fechaReal')?>">
        <span><?=verError('fechaReal')?></span>
        <br><br>

        <label for="">Anotaciones anteriores</label>
        <textarea id="anot_ant" name="anot_ant" rows="2" cols="50"><?=ValorPost('anot_ant')?></textarea><br><br>

        <label for="">Anotaciones posteriores</label>
        <textarea id="anot_post" name="anot_post" rows="2" cols="50"><?=ValorPost('anot_ant')?></textarea><br><br>

        <label for="">Subir archivo</label>
        <input type="file" name="arch_resumen"><br><br>

        <label for="">Subir fotos</label>
        <input type="file" name="fotos"><br><br>
        
        <button>Enviar tarea</button>

    </form>
    
</body>
</html>