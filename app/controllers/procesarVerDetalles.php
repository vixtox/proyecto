<?php
    
    include('../models/Tarea.php');
    include('../models/GestionDataBase.php');
    include('../library/creaTableDetalles.php');

    $nombreCampos = Tarea::getNombreCamposTarea();
    $valoresCampos = Tarea::getSelectTarea($_GET['id']);

    include('../views/verDetallesTarea.php');