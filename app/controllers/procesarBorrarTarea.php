<?php

        /**
         * procesarBorrarTarea
         * @param  string $id id de la tarea
         */

         require __DIR__ . '/../ctes.php';
        include(MODEL_PATH.'GestionDataBase.php'); 
        include(MODEL_PATH.'Tarea.php'); 

        $id = $_GET['id'];
        Tarea::deleteTarea($id);

        header('location:../controllers/procesarListaTareas.php');