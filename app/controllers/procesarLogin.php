<?php

        include("../models/GestionDataBase.php");
        include("varios.php");
    
        $db = GestionDataBase::getInstance();

        if (isset($_SESSION)) {
            session_destroy();
        }

        // Si no han enviado el fomulario
        if (!$_POST) { 
    
            echo $blade->render('login');
    
        }else{
    
            $email = $_POST['email'];
            $pass = $_POST['pass'];
    
            $user = $db->loginUser($email, $pass);
    
            if (isset($user['nif'])) {

                session_start(); //crea una sesion
                $hora = date('H:i:s');

                $_SESSION['hora'] = $hora;
                $_SESSION['nombre'] = $user['nombre'];

                if ($user['es_admin'] == 1) {
                    $_SESSION['rol'] = "Administrador";
                } else {
                    $_SESSION['rol'] = "Operario";
                }
           
                  echo $blade->render('inicio');
                
            }else{
    
                echo $blade->render('login');
    
            }
    
        }

     

          


           