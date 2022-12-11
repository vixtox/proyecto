<?php

 /**
         * procesarConfirmarBorrartarea
         *
         * @param  mixed $datosUsuario array con lops datos de  un usuario
         * @param  mixed $id id de la tarea
         */

    include('varios.php');

    session_start();
    
    $id = $_GET['id'];

    echo $blade->render('confirmarBorrarTarea', [
        'id' => $id 
    ]);