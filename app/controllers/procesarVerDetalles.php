<?php
    
    include('../models/Tarea.php');
    include('../models/GestionDataBase.php');
    include('../library/creaTableDetalles.php');
    include('../controllers/varios.php');

    $nombreCampos = Tarea::getNombreCamposTarea();
    $valoresCampos = Tarea::getSelectTarea($_GET['id']);

    echo $blade->render('verDetallesTarea', [
        'nombreCampos' => $nombreCampos,
        'valoresCampos' => $valoresCampos,
       
    ]);