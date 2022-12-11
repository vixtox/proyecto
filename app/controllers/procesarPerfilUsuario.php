<?php

 /**
         * procesarPerfilUsuario
         *

         * @param  mixed $nif String con el valor del nif
         * @param  mixed $datosUsuario array con los datos del usuario
         */
    
    include('../models/Usuario.php');
    include('../models/GestionDataBase.php');
    include('varios.php');

    session_start();
 
    $nif = $_GET['nif'];
    $datosUsuario = Usuario::getSelectUsuario($nif);

    echo $blade->render('verDatosUsuario', [
        'datosUsuario' => $datosUsuario
    ]);