<!-- 
LAYOUT DE LA APLICACIÓN 
ESTA PÁGINA DISPONE DONDE IRÁN LOS DIFERENTES BLOQUES QUE CONFORMAN LA APLICACIÓN

Se centra solamente en la presentación.
Deberemos indicarle:
    - titulo
    - menu
    - cuerpo

Podría tener tantos parámetros como quisiesemos
Igualmente nuestra aplicación podría tener tantos layouts como deseasemos
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestor Tareas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <div style="background: #ccffff; text-align: center; font-size: 2em">
            Bunglebuild S.L.
        </div>
    </header>
    <nav id="menu">
        <?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </nav>
    <main id="cuerpo">
        <?php echo $__env->yieldContent('cuerpo'); ?>
    </main>
    <footer style="background: #ccffcc; clear: both;">
        Pie de página
    </footer>
</body>

</html><?php /**PATH C:\xampp\htdocs\proyecto\proyecto\app\views/_template.blade.php ENDPATH**/ ?>