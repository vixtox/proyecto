<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirma borrar tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <form action="">
        
        <span class="form-control">Está a punto de borrar la tarea <?=$_GET['id']?></span>
        <a href="../controllers/procesarBorrarTarea.php?id=<?= $_GET['id'] ?>">SI</a>
        <a href="../controllers/procesarListaTareas.php">NO</a>
    </form>
    
</body>
</html>