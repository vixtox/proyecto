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

        <label for="">NIF/CIF</label><!--A58818501-->
        <input type="text" name="nifCif" value="<?= isset($_POST['nifCif']) ? $_POST['nifCif'] : '' ?>">
        <span><?= isset($_POST['nifCif']) ? $gestor->Error($_POST["nifCif"]) : ''?></span>
        <br><br>

        <label for="">Persona de contacto</label>
        <input type="text" name="persContact" value="<?= isset($_POST['persContact']) ? $_POST['persContact'] : '' ?>">
        <span><?= isset($_POST['persContact']) ? $gestor->Error($_POST["persContact"]) : ''?></span>
        <br><br>

        <label for="">Teléfono</label>
        <input type="text" name="tel"><br><br>

        <label for="">Descripción</label>
        <textarea id="desc" name="desc" rows="2" cols="50"><?= isset($_POST['desc']) ? $_POST['desc'] : '' ?></textarea>
        <span><?= isset($_POST['desc']) ? $gestor->Error($_POST["desc"]) : ''?></span>
        <br><br>
        
        <label for="">Correo electrónico</label>
        <input type="text" name="email"><br><br>

        <label for="">Dirección</label>
        <input type="text" name="dir"><br><br>

        <label for="">Población</label>
        <input type="text" name="pob"><br><br>

        <label for="">Código postal</label>
        <input type="text" name="cod_p"><br><br>

        <!--select Provincia-->

        <select name="estado" id="estado">
        <option value="">Selecciona estado de la tarea</option>
        <option value="B">B (Esperando ser aprobada)</option>
        <option value="P">P (Pendiente)</option>
        <option value="R">R (Realizada)</option>
        <option value="C">C (Cancelada)</option>
        </select><br><br>

        <!--select Operario encargado-->

        <label for="">Fecha de realización</label>
        <input type="date" name="fech_realiz"><br><br>

        <label for="">Anotaciones anteriores</label>
        <textarea id="anot_ant" name="anot_ant" rows="2" cols="50"></textarea><br><br>

        <label for="">Anotaciones posteriores</label>
        <textarea id="anot_post" name="anot_post" rows="2" cols="50"></textarea><br><br>

        <label for="">Subir archivo</label>
        <input type="file" name="arch_resumen"><br><br>

        <label for="">Subir fotos</label>
        <input type="file" name="fotos"><br><br>
        
        <button>Enviar tarea</button>

    </form>
    
</body>
</html>