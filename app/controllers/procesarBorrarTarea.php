<?php

    $id = $_GET['id'];

    include('../models/GestionDataBase.php'); 
   
    include('../models/Tarea.php'); 

    Tarea::deleteTarea($id);

    header('location:../controllers/procesarListaTareas.php');
