<div><a class="navbar-brand" href="/app/controllers/procesarListaTareas.php">Ver Lista Tareas</a></div>
<div><a class="navbar-brand" href="/app/controllers/procesarListaTareasPendientes.php">Ver Lista Tareas Pendientes</a></div>
<div><a class="navbar-brand" href="/app/controllers/procesarFiltrarTareas.php">Filtrar Tareas</a></div>
<?php 
    session_start();
    if($_SESSION['rol'] == 'Administrador'){
        echo '<div><a class="navbar-brand" href="/app/controllers/procesarInsertarTarea.php">Insertar Tarea</a></div>
        <div><a class="navbar-brand" href="/app/controllers/procesarInsertarUsuario.php">Insertar Usuario</a></div>
        <div><a class="navbar-brand" href="/app/controllers/procesarListaUsuarios.php">Ver Lista Usuarios</a></div>';
    }

    if($_SESSION['rol'] == 'Operario'){
     
        echo '<div><a class="navbar-brand" href="/app/controllers/procesarActualizarUsuario.php?nif=' . $_SESSION['nif'] . '">Editar usuario</a></div>
        <div><a class="navbar-brand" href="/app/controllers/procesarPerfilUsuario.php?nif=' . $_SESSION['nif'] . '">Perfil usuario</a></div>';
    
    }

?>

<?php /**PATH C:\xampp\htdocs\proyecto\proyecto\app\views/menu.blade.php ENDPATH**/ ?>