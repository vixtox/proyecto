<?php

 /**
         * procesarVerDetalles
         *
         * @param  array $datosTarea array copn los datos de la tarea
         */
    
         require __DIR__ . '/../ctes.php';
    include(MODEL_PATH.'Tarea.php');
    include(MODEL_PATH.'GestionDataBase.php');
    include(LIBRARY_PATH.'creaTableDetalles.php');
    include(CTRL_PATH.'varios.php');

    session_start();

    $datosTarea = Tarea::getSelectTarea($_GET['id']);

    echo $blade->render('verDetallesTarea', [
        'datosTarea' => $datosTarea
       
    ]);