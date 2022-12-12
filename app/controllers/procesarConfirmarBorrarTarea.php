<?php

 /**
         * procesarConfirmarBorrartarea
         *
         * @param  array $datosUsuario array con lops datos de  un usuario
         * @param  string $id id de la tarea
         */


         require __DIR__ . '/../ctes.php';
    include(CTRL_PATH.'varios.php');

    session_start();
    if($_SESSION['rol'] == 'Administrador'){
        
        $id = $_GET['id'];

        echo $blade->render('confirmarBorrarTarea', [
            'id' => $id 
        ]);

    }else if(($_SESSION['rol'] == 'Operario')){

        header('location:procesarListaTareas.php');

    }else{

        header('location:procesarLogin.php');

    }