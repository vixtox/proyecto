<?php

 /**
         * procesarConfirmarBorrarUsuario
         *
         * @param string $nif nif del usuario
         */

         require __DIR__ . '/../ctes.php';
    include(CTRL_PATH.'varios.php');

    session_start();
    
    $nif = $_GET['nif'];

    echo $blade->render('confirmarBorrarUsuario', [
        'nif' => $nif 
    ]);