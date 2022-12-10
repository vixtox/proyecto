<?php

    include('varios.php');

    session_start();
    
    $id = $_GET['id'];

    echo $blade->render('confirmarBorrarTarea', [
        'id' => $id 
    ]);