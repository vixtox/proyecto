<?php
    
    include('../models/Usuario.php');
    include('../models/GestionDataBase.php');
    include('varios.php');

    session_start();
 
    $nif = $_GET['nif'];
    $datosUsuario = Usuario::getSelectUsuario($nif);

    echo $blade->render('verDatosUsuario', [
        'datosUsuario' => $datosUsuario
    ]);