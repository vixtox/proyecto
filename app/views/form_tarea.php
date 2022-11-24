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
        <input type="text" name="nif_cif" value="<?=valorPost('nif_cif')?>">
        <span><?=verError('nif_cif')?></span>
        <br><br>

        <label for="">Nombre</label>
        <input type="text" name="nombre" value="<?=valorPost('nombre')?>">
        <span><?=verError('nombre')?></span>
        <br><br>

        <label for="">Apellidos</label>
        <input type="text" name="apellidos" value="<?=valorPost('apellidos')?>">
        <span><?=verError('apellidos')?></span>
        <br><br>

        <label for="">Teléfono</label>
        <input type="text" name="telefono" value="<?=valorPost('telefono')?>">
        <span><?=verError('telefono')?></span>
        <br><br>

        <label for="">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="2" cols="50"><?=valorPost('descripcion')?></textarea>
        <span><?=verError('descripcion')?></span>
        <br><br>
        
        <label for="">Correo electrónico</label>
        <input type="text" name="correo" value="<?=valorPost('correo')?>">
        <span><?=verError('correo')?></span>
        <br><br>

        <label for="">Dirección</label>
        <input type="text" name="direccion" value="<?=valorPost('direccion')?>"><br><br>

        <label for="">Población</label>
        <input type="text" name="poblacion" value="<?=valorPost('poblacion')?>"><br><br>

        <label for="">Código postal</label>
        <input type="text" name="codigo_postal" value="<?=valorPost('codigo_postal')?>">
        <span><?=verError('codigo_postal')?></span>
        <br><br>

        <?= creaSelect('provincia', Provincia::listaParaSelect(), filter_input(INPUT_POST, 'provincia')) ?>
        <br><br>

        <select name="estado" id="estado">
            <option value="B">B (Esperando ser aprobada)</option>
            <option value="P">P (Pendiente)</option>
            <option value="R">R (Realizada)</option>
            <option value="C">C (Cancelada)</option>
        </select><br><br>

        <input type="date" name="fecha_creacion" readonly value="<?= $fecha ?>"> <br>

        <?= creaSelect('operario_encargado', Operario::listaParaSelect(), filter_input(INPUT_POST, 'operario_encargado')) ?>
        <br><br>

        <label for="">Fecha de realización</label>
        <input type="date" name="fecha_realizacion" value="<?=valorPost('fecha_realizacion')?>">
        <span><?=verError('fecha_realizacion')?></span>
        <br><br>

        <label for="">Anotaciones anteriores</label>
        <textarea id="anotaciones_ant" name="anotaciones_ant" rows="2" cols="50"><?=valorPost('anotaciones_ant')?></textarea><br><br>

        <label for="">Anotaciones posteriores</label>
        <textarea id="anotaciones_post" name="anotaciones_pos" rows="2" cols="50"><?=valorPost('anotaciones_pos')?></textarea><br><br>

        <label for="">Subir archivo</label>
        <input type="file" name="arch_resumen"><br><br>

        <label for="">Subir fotos</label>
        <input type="file" name="fotos"><br><br>
        
        <button>Enviar tarea</button>

    </form>
    
</body>
</html>