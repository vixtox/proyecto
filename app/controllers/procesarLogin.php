<?php

    include("../models/GestionDataBase.php");

    $db = GestionDataBase::getInstance();

    // Si no han enviado el fomulario
    if (!$_POST) { 

        include("../views/login.php");

    }else{

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $user = $db->loginUser($email, $pass);

        if (isset($user['nif'])) {

            echo "Bienvenido "  . $user['nif'];
            include("../views/menu.php");

        }else{

            include("../views/login.php");

        }

    }