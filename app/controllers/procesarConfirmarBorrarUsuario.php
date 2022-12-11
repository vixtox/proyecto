<?php

 /**
         * procesarConfirmarBorrarUsuario
         *
         * @param  mixed $nif nif del usuario
         */

    include('varios.php');

    session_start();
    
    $nif = $_GET['nif'];

    echo $blade->render('confirmarBorrarUsuario', [
        'nif' => $nif 
    ]);