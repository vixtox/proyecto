<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lista de Tareas Filtrando</title>
    <link rel="stylesheet" href="">
</head>

<body>
    

   <?php $__env->startSection('usuario'); ?>
    <p>Hora acceso: <?=$_SESSION['hora']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" style="color: white;" class="fa fa-sign-out"></a> Log out</p>
    <p><?=$_SESSION['rol'] . ": " . $_SESSION['nombre']?></p>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('cuerpo'); ?>

    <h1>Filtrar tareas</h1>
    <form action="/app/controllers/procesarFiltrarTareas.php" method="post">

        <table class="table table-bordered">
            <tr>
                <thead class="table-dark">
                    <th>Campo</th>
                    <th>Criterio</th>
                    <th>Valor</th>
                </thead>
            </tr>
            <tr>
                <th>
                    <select class="form-select" name="campo1" id="">
                        <option value="nif_cif">NIF/CIF</option>
                        <option value="codigo_postal">Codigo Postal</option>
                        <option value="correo">Email</option>
                    </select>
                </th>
                <th>
                    <select class="form-select" name="criterio1" id="">
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value=">">></option>
                    </select>
                </th>
                <th>
                    <input class="form-control" type="text" name="valor1">
                </th>
            </tr>
            <tr>
                <td>
                    <select class="form-select" name="campo2" id="">
                        <option value="nif_cif">NIF/CIF</option>
                        <option value="codigo_postal">Codigo Postal</option>
                        <option value="correo">Email</option>
                    </select>
                </td>
                <td>
                    <select name="criterio2" class="form-select" id="">
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value=">">></option>
                    </select>
                </td>
                <td>
                    <input class="form-control" type="text" name="valor2">
                </td>
            </tr>
            <tr>
                <td>
                    <select class="form-select" name="campo3" id="">
                        <option value="nif_cif">NIF/CIF</option>
                        <option value="codigo_postal">Codigo Postal</option>
                        <option value="correo">Email</option>
                    </select>
                </td>
                <td>
                    <select name="criterio3" class="form-select" id="">
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value=">">></option>
                    </select>
                </td>
                <td>
                    <input class="form-control" type="text" name="valor3">
                </td>
            </tr>
        </table>
        <button class="btn btn-dark mb-3" type="submit">Filtrar</button>
    </form>
    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\proyecto\app\views/formularioFiltrarTareas.blade.php ENDPATH**/ ?>