<?php

 /**
         * procesarConfirmarBorrarUsuario
         *
         * @param string $nif nif del usuario
         */

         require __DIR__ . '/../ctes.php';
    include(CTRL_PATH.'varios.php');

    session_start();
    if($_SESSION['rol'] == 'Administrador'){
    
        $nif = $_GET['nif'];

        echo $blade->render('confirmarBorrarUsuario', [
            'nif' => $nif 
        ]);

    }else if(($_SESSION['rol'] == 'Operario')){

        header('location:procesarListaTareas.php');

    }else{

        header('location:procesarLogin.php');

    }