<?php

 /**
         * procesarBorrarUsuario
         *
         * @param  string $nif nif del usuario
         */
        require __DIR__ . '/../ctes.php';
        include(MODEL_PATH.'GestionDataBase.php'); 
        include(MODEL_PATH.'Usuario.php'); 

        $nif = $_GET['nif'];
        Usuario::deleteUsuario($nif);

        header('location:../controllers/procesarListaUsuarios.php');