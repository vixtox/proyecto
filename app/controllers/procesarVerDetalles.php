<?php

 /**
         * procesarVerDetalles
         *
         * @param  mixed $datosTarea array copn los datos de la tarea
         */
    
    include('../models/Tarea.php');
    include('../models/GestionDataBase.php');
    include('../library/creaTableDetalles.php');
    include('varios.php');

    session_start();

    $datosTarea = Tarea::getSelectTarea($_GET['id']);

    echo $blade->render('verDetallesTarea', [
        'datosTarea' => $datosTarea
       
    ]);