<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="">
</head>

<body>
    @extends('_template')
    @section('cuerpo')

    <?= creaTable('listaTareasPendientes', $nombreCampos, $tareas) ?>

    <a href="?pagina=1" class='btn btn-info' role='button'>Primera</a>

    <a href="?pagina=<?= ($pagina == 1) ? $pagina : $pagina - 1 ?>" class='btn btn-info' role='button'>Anterior</a>

    <span>Página <?= $pagina ?></span>

    <a href="?pagina=<?= ($pagina == $totalPaginas) ? $pagina : $pagina + 1 ?>" class='btn btn-info' role='button'>Sigiente</a>

    <a href="?pagina=<?= $totalPaginas ?>" class='btn btn-info' role='button'>Última</a>

    <span>Nº páginas: <?= $totalPaginas ?></span>

    <br> <br>

    <form action="../controllers/procesarlistaTareasPendientes.php" method="get">
        <input type="text" name="numPag">
        <button>Ir a página</button>
    </form>
    @endsection
</body>

</html>