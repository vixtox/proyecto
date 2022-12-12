<?php

 /**
         * procesarPerfilUsuario
         *

         * @param  string $nif String con el valor del nif
         * @param  array $datosUsuario array con los datos del usuario
         */
    
         require __DIR__ . '/../ctes.php';
    include(MODEL_PATH.'Usuario.php');
    include(MODEL_PATH.'GestionDataBase.php');
    include(CTRL_PATH.'varios.php');

    session_start();
 
    $nif = $_GET['nif'];
    $datosUsuario = Usuario::getSelectUsuario($nif);

    echo $blade->render('verDatosUsuario', [
        'datosUsuario' => $datosUsuario
    ]);