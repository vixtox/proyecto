<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/form_tarea.css">
</head>
<body>

    <div class="form-floating mb-3">

        <h1>Formulario recogida de datos de Tareas</h1>

        <!--<form action="../library/subirArchivo.php" method="post"  enctype="multipart/form-data">-->
        <form action="../controllers/procesar_form.php" method="post" enctype="multipart/form-data">

            <label for="">NIF/CIF</label><!--CIF: A58818501-->
            <input class="form-control"  type="text" name="nif_cif" value="<?=valorPost('nif_cif')?>">
            <span><?=verError('nif_cif')?></span>
            <br><br>

            <label for="">Nombre</label>
            <input class="form-control" type="text" name="nombre" value="<?=valorPost('nombre')?>">
            <span><?=verError('nombre')?></span>
            <br><br>

            <label for="">Apellidos</label>
            <input class="form-control" type="text" name="apellidos" value="<?=valorPost('apellidos')?>">
            <span><?=verError('apellidos')?></span>
            <br><br>

            <label for="">Teléfono</label>
            <input class="form-control" type="text" name="telefono" value="<?=valorPost('telefono')?>">
            <span><?=verError('telefono')?></span>
            <br><br>

            <label for="">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="2" cols="50"><?=valorPost('descripcion')?></textarea>
            <span><?=verError('descripcion')?></span>
            <br><br>
            
            <label for="">Correo electrónico</label>
            <input class="form-control" type="text" name="correo" value="<?=valorPost('correo')?>">
            <span><?=verError('correo')?></span>
            <br><br>

            <label for="">Dirección</label>
            <input class="form-control" type="text" name="direccion" value="<?=valorPost('direccion')?>"><br><br>

            <label for="">Población</label>
            <input class="form-control" type="text" name="poblacion" value="<?=valorPost('poblacion')?>"><br><br>

            <label for="">Código postal</label>
            <input class="form-control" type="text" name="codigo_postal" value="<?=valorPost('codigo_postal')?>">
            <span><?=verError('codigo_postal')?></span>
            <br><br>

            <label for="">Selecciona provincia</label>
            <?= creaSelect('provincia', Provincia::listaParaSelect(), filter_input(INPUT_POST, 'provincia')) ?>
            <br><br>

            <label for="">Selecciona estado</label>
            <select class="form-select" name="estado" id="estado">
                <option value="B">B (Esperando ser aprobada)</option>
                <option value="P">P (Pendiente)</option>
                <option value="R">R (Realizada)</option>
                <option value="C">C (Cancelada)</option>
            </select><br><br>

            <label for="">Fecha de creación</label>
            <input class="form-control" type="date" name="fecha_creacion" readonly value="<?= $fecha ?>"> <br><br>

            <label for="">Selecciona operario</label>
            <?= creaSelect('operario_encargado', Operario::listaParaSelect(), filter_input(INPUT_POST, 'operario_encargado')) ?>
            <br><br>

            <label for="">Fecha de realización</label>
            <input class="form-control" type="date" name="fecha_realizacion" value="<?=valorPost('fecha_realizacion')?>">
            <span><?=verError('fecha_realizacion')?></span>
            <br><br>

            <label for="">Anotaciones anteriores</label>
            <textarea class="form-control" id="anotaciones_ant" name="anotaciones_ant" rows="2" cols="50"><?=valorPost('anotaciones_ant')?></textarea><br><br>

            <label for="">Anotaciones posteriores</label>
            <textarea class="form-control" id="anotaciones_post" name="anotaciones_pos" rows="2" cols="50"><?=valorPost('anotaciones_pos')?></textarea><br><br>

            <label for="">Subir archivo</label>
            <input class="form-control" type="file" name="arch_resumen"><br><br>

            <label for="">Subir fotos</label>
            <input class="form-control" type="file" name="fotos"><br><br>
            
            <button class="btn btn-primary">Enviar tarea</button>

        </form>

    </div>
    
</body>
</html>