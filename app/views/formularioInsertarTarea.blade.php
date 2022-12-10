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

    @extends('_template')

    
    @section('usuario')
    <p>Hora acceso: <?=$_SESSION['hora']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" style="color: white;" class="fa fa-sign-out"></a> Log out</p>
    <p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>
    @endsection

    
    @section('cuerpo')

    <div>
        <h1>Insertar tarea</h1>
        <form action="../controllers/procesarInsertarTarea.php" method="post" enctype="multipart/form-data">
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
       
            <div class="form-group">
                <button class="btn btn-dark">Enviar tarea</button>
            </div>
        
        </form><br><br>

    </div>

    @endsection
    
</body>
</html>