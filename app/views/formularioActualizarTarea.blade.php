<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Actualizar Tarea</title>
</head>

<body>

    @extends('_template')

    @section('usuario')
    <p>Hora acceso: <?=$_SESSION['hora']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" style="color: white;" class="fa fa-sign-out"></a> Log out</p>
    <p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>
    @endsection

    @section('cuerpo')

    <h1>Actualizar Tarea</h1>

    <form action='../controllers/procesarActualizarTarea.php?id=<?= $id ?>' method="post" enctype="multipart/form-data">
  
    <div class="form-group">
                <label for=""  class="form-label">NIF/CIF</label>
                <input class="form-control"  type="text" name="nif_cif" value="<?= isset($datosTarea["nif_cif"]) ? $datosTarea["nif_cif"] : valorPost('nif_cif')?>">
                <?=verError('nif_cif')?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" value="<?= isset($datosTarea["nombre"]) ? $datosTarea["nombre"] : valorPost('nombre')?>">
                <?=verError('nombre')?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Apellidos</label>
                <input class="form-control" type="text" name="apellidos" value="<?= isset($datosTarea["apellidos"]) ? $datosTarea["apellidos"] : valorPost('apellidos')?>">
                <?=verError('apellidos')?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Teléfono</label>
                <input class="form-control" type="text" name="telefono" value="<?= isset($datosTarea["telefono"]) ? $datosTarea["telefono"] : valorPost('telefono')?>">
                <?=verError('telefono')?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="2" cols="50"><?= isset($datosTarea["descripcion"]) ? $datosTarea["descripcion"] : valorPost('descripcion')?></textarea>
                <?=verError('descripcion')?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Correo electrónico</label>
                <input class="form-control" type="text" name="correo" value="<?= isset($datosTarea["correo"]) ? $datosTarea["correo"] : valorPost('correo')?>">
                <?=verError('correo')?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Dirección</label>
                <input class="form-control" type="text" name="direccion" value="<?= isset($datosTarea["direccion"]) ? $datosTarea["direccion"] : valorPost('direccion')?>">
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Población</label>
                <input class="form-control" type="text" name="poblacion" value="<?= isset($datosTarea["poblacion"]) ? $datosTarea["poblacion"] : valorPost('poblacion')?>">
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Código postal</label>
                <input class="form-control" type="text" name="codigo_postal" value="<?= isset($datosTarea["codigo_postal"]) ? $datosTarea["codigo_postal"] : valorPost('codigo_postal')?>">
                <?=verError('codigo_postal')?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Selecciona provincia</label>
                <?= creaSelect('provincia', Provincia::listaParaSelect(), isset($datosTarea["provincia"]) ? $datosTarea["provincia"] : ValorPost('provincia'), filter_input(INPUT_POST, 'provincia')) ?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Selecciona estado</label>
                <select class="form-select" name="estado" id="estado" <?= isset($datosTarea["nif_cif"]) ? $datosTarea["nif_cif"] : ValorPost('nif_cif') ?>>
                    <option value="B" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'B' ? 'selected' : '' ?>>B (Esperando ser aprobada)</option>
                    <option value="P" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'P' ? 'selected' : '' ?>>P (Pendiente)</option>
                    <option value="R" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'R' ? 'selected' : '' ?>>R (Realizada)</option>
                    <option value="C" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'C' ? 'selected' : '' ?>>C (Cancelada)</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Selecciona operario</label>
                <?= creaSelect('operario_encargado', Operario::listaParaSelect(), isset($datosTarea["operario_encargado"]) ? $datosTarea["operario_encargado"] : ValorPost('operario_encargado'), filter_input(INPUT_POST, 'operario_encargado')) ?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Fecha de realización</label>
                <input class="form-control" type="date" name="fecha_realizacion" value="<?= isset($datosTarea["fecha_realizacion"]) ? $datosTarea["fecha_realizacion"] : valorPost('fecha_realizacion')?>">
                <?=verError('fecha_realizacion')?>
            </div>
            <br>
            <div class="form-group">
                <label for="" class="form-label">Anotaciones anteriores</label>
                <textarea class="form-control" id="anotaciones_ant" name="anotaciones_ant" rows="2" cols="50"><?= isset($datosTarea["anotaciones_ant"]) ? $datosTarea["anotaciones_ant"] : valorPost('anotaciones_ant')?></textarea><br><br>
            </div>

            <div class="form-group">
                <label for="" class="form-label">Anotaciones posteriores</label>
                <textarea class="form-control" id="anotaciones_post" name="anotaciones_pos" rows="2" cols="50"><?= isset($datosTarea["anotaciones_pos"]) ? $datosTarea["anotaciones_pos"] : valorPost('anotaciones_pos')?></textarea><br><br>
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
                <button class="btn btn-dark">Actualizar tarea</button>
            </div>
        
        </form><br>

    </div>

    @endsection
    
</body>

</html>