<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/form_tarea.css">
</head>
<body>

    @extends('_template')
    @section('cuerpo')

    <h1>Completar tarea</h1>

    <form action="../controllers/procesarCompletarTarea.php?id=<?= $id ?>" method='post' enctype="multipart/form-data">

        <div class="form-group">
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

            <div class="form-group">
                <button class="btn btn-primary">Completar tarea</button>
            </div>

    </form>
    
    @endsection
    
</body>
</html>