<?php
    
    include('../models/Tarea.php');
    include('../models/GestionDataBase.php');
    include('../library/creaTableDetalles.php');
    include('varios.php');

    session_start();
   // $nombreCampos = Tarea::getNombreCamposTarea();
    $datosTarea = Tarea::getSelectTarea($_GET['id']);

    echo $blade->render('verDetallesTarea', [
        'datosTarea' => $datosTarea
       
    ]);