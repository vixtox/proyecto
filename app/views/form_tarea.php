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

    <h1>Formulario insertar Tarea</h1>

    <div>

        <form action="../controllers/procesarForm.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for=""  class="form-label">NIF/CIF</label>
                <input class="form-control"  type="text" name="nif_cif" value="<?=valorPost('nif_cif')?>">
                <span><?=verError('nif_cif')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" value="<?=valorPost('nombre')?>">
                <span><?=verError('nombre')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Apellidos</label>
                <input class="form-control" type="text" name="apellidos" value="<?=valorPost('apellidos')?>">
                <span><?=verError('apellidos')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Teléfono</label>
                <input class="form-control" type="text" name="telefono" value="<?=valorPost('telefono')?>">
                <span><?=verError('telefono')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="2" cols="50"><?=valorPost('descripcion')?></textarea>
                <span><?=verError('descripcion')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Correo electrónico</label>
                <input class="form-control" type="text" name="correo" value="<?=valorPost('correo')?>">
                <span><?=verError('correo')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Dirección</label>
                <input class="form-control" type="text" name="direccion" value="<?=valorPost('direccion')?>">
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Población</label>
                <input class="form-control" type="text" name="poblacion" value="<?=valorPost('poblacion')?>">
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Código postal</label>
                <input class="form-control" type="text" name="codigo_postal" value="<?=valorPost('codigo_postal')?>">
                <span><?=verError('codigo_postal')?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Selecciona provincia</label>
                <?= creaSelect('provincia', Provincia::listaParaSelect(), filter_input(INPUT_POST, 'provincia')) ?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Selecciona estado</label>
                <select class="form-select" name="estado" id="estado">
                    <option value="B">B (Esperando ser aprobada)</option>
                    <option value="P">P (Pendiente)</option>
                    <option value="R">R (Realizada)</option>
                    <option value="C">C (Cancelada)</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Selecciona operario</label>
                <?= creaSelect('operario_encargado', Operario::listaParaSelect(), filter_input(INPUT_POST, 'operario_encargado')) ?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Fecha de realización</label>
                <input class="form-control" type="date" name="fecha_realizacion" value="<?=valorPost('fecha_realizacion')?>">
                <span><?=verError('fecha_realizacion')?></span>
            </div>
            <br>
        <!--  <div class="form-group">
                <label for="" class="form-label">Anotaciones anteriores</label>
                <textarea class="form-control" id="anotaciones_ant" name="anotaciones_ant" rows="2" cols="50"><?=valorPost('anotaciones_ant')?></textarea><br><br>
            </div>

            <div class="form-group">
                <label for="" class="form-label">Anotaciones posteriores</label>
                <textarea class="form-control" id="anotaciones_post" name="anotaciones_pos" rows="2" cols="50"><?=valorPost('anotaciones_pos')?></textarea><br><br>
            </div>

            <div class="form-group">
                <label for="" class="form-label">Subir archivo</label>
                <input class="form-control" type="file" name="arch_resumen"><br><br>
            </div>

            <div class="form-group">
                <label for="" class="form-label">Subir fotos</label>
                <input class="form-control" type="file" name="fotos"><br><br>
            </div>
    -->
            <div class="form-group">
                <button class="btn btn-primary">Enviar tarea</button>
            </div>
        
        </form>

    </div>
    
</body>
</html>