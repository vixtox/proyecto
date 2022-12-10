<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    @extends('_template')

    @section('usuario')
    <p><a href="../index.php" style="color: white;" class="fa fa-sign-out"></a>  Hora inicio sesion: <?=$_SESSION['hora']?></p>
    <p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>
    @endsection

    @section('cuerpo')

    <?= creaTable('listaTareas', $nombreCampos, $nombreCamposTabla, $listaValores) ?>

    <a href="?pagina=1" class="btn btn-dark" role='button'>Primera</a>

    <a href="?pagina=<?=($pagina==1) ? $pagina : $pagina - 1 ?>" class="btn btn-dark" role='button'><<</a>

    <span>Página <?=$pagina ?></span>

    <a href="?pagina=<?=($pagina==$totalPaginas) ? $pagina : $pagina + 1 ?>" class="btn btn-dark" role='button'>>></a>

    <a href="?pagina=<?=$totalPaginas?>" class="btn btn-dark" role='button'>Última</a>

    <span>Nº páginas: <?=$totalPaginas ?></span>
    <br><br>

    <form action="../controllers/procesarListaTareasPendientes.php" method="get">
            <input class="form-control" type="text" name="numPag">
            <button class="btn btn-dark">Ir a página</button>
    </form>

    @endsection

</body>
</html>