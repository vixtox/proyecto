<?php

 /**
         * procesarBorrarTarea
         * @param  mixed $id id de la tarea
         */
    
    include('../models/GestionDataBase.php'); 
    include('../models/Tarea.php'); 

    $id = $_GET['id'];
    Tarea::deleteTarea($id);

    header('location:../controllers/procesarListaTareas.php');