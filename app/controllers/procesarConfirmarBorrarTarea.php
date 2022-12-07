<?php

    include('../controllers/varios.php');

    $id = $_GET['id'];

    echo $blade->render('confirmarBorrarTarea', [
        'id' => $id 
    ]);