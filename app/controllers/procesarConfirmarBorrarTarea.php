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
    
    $id = $_GET['id'];

    echo $blade->render('confirmarBorrarTarea', [
        'id' => $id 
    ]);