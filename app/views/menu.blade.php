<div><a class="navbar-brand" href="/app/controllers/procesarListaTareas.php">Ver Lista Tareas <i class="fa-solid fa-bars"></i></a></div>
<div><a class="navbar-brand" href="/app/controllers/procesarListaTareasPendientes.php">Ver Lista Tareas Pendientes <i class="fa-solid fa-grip-lines"></i></a></div>
<div><a class="navbar-brand" href="/app/controllers/procesarFiltrarTareas.php">Filtrar Tareas <i class="fa-solid fa-magnifying-glass"></i> <i class="fa-solid fa-pen"></i></a></div>
<?php 
    session_start();
    if($_SESSION['rol'] == 'Administrador'){
        echo '<div><a class="navbar-brand" href="/app/controllers/procesarInsertarTarea.php">Insertar Tarea <i class="fa-solid fa-plus"></i> <i class="fa-solid fa-pen"></i></a></div>
        <div><a class="navbar-brand" href="/app/controllers/procesarInsertarUsuario.php">Insertar Usuario <i class="fa-solid fa-plus"></i> <i class="fa-solid fa-user"></i></a></div>
        <div><a class="navbar-brand" href="/app/controllers/procesarListaUsuarios.php">Ver Lista Usuarios <i class="fa-solid fa-magnifying-glass"></i> <i class="fa-solid fa-users"></i></a></div>';
    }

    if($_SESSION['rol'] == 'Operario'){
     
        echo '<div><a class="navbar-brand" href="/app/controllers/procesarActualizarUsuario.php?nif=' . $_SESSION['nif'] . '">Editar usuario <i class="fa-solid fa-wand-magic-sparkles"></i> <i class="fa-solid fa-user"></i></a></div>
        <div><a class="navbar-brand" href="/app/controllers/procesarPerfilUsuario.php?nif=' . $_SESSION['nif'] . '">Perfil usuario <i class="fa-solid fa-magnifying-glass"></i> <i class="fa-solid fa-user"></i></a></div>';
    
    }

?>

