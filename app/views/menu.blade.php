<div><a class="navbar-brand" href="/app/controllers/procesarListaTareas.php">Ver Lista Tareas</a></div>
<div><a class="navbar-brand" href="/app/controllers/procesarListaTareasPendientes.php">Ver Lista Tareas Pendientes</a></div>
<div><a class="navbar-brand" href="/app/controllers/procesarFiltrarTareas.php">Filtrar Tareas</a></div>
<?php 
    session_start();
    if($_SESSION['rol'] == 'Administrador'){
        echo '<div><a class="navbar-brand" href="/app/controllers/procesarInsertarTarea.php">Insertar Tarea</a></div>';
    }
?>


