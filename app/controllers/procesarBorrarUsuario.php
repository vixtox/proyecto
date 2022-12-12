<?php

 /**
         * procesarBorrarUsuario
         *
         * @param  string $nif nif del usuario
         */
        require __DIR__ . '/../ctes.php';
        include(MODEL_PATH.'GestionDataBase.php'); 
        include(MODEL_PATH.'Usuario.php'); 

        
        session_start();
        if($_SESSION['rol'] == 'Administrador'){

        $nif = $_GET['nif'];
        Usuario::deleteUsuario($nif);

        header('location:../controllers/procesarListaUsuarios.php');

                
        }else if(($_SESSION['rol'] == 'Operario')){

                header('location:procesarListaTareas.php');
        
        }else{
        
                header('location:procesarLogin.php');
        
        }