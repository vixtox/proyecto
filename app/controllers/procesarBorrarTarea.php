<?php

        /**
         * procesarBorrarTarea
         * @param  string $id id de la tarea
         */

        session_start();
        if($_SESSION['rol'] == 'Administrador'){

                require __DIR__ . '/../ctes.php';
                include(MODEL_PATH.'GestionDataBase.php'); 
                include(MODEL_PATH.'Tarea.php'); 

                $id = $_GET['id'];
                Tarea::deleteTarea($id);

                header('location:../controllers/procesarListaTareas.php');

                
        }else if(($_SESSION['rol'] == 'Operario')){

                header('location:procesarListaTareas.php');
        
        }else{
        
                header('location:procesarLogin.php');
        
        }