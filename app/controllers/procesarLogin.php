<?php

        include("../models/GestionDataBase.php");
        include("varios.php");
    
        $db = GestionDataBase::getInstance();
    
        // Si no han enviado el fomulario
        if (!$_POST) { 
    
            echo $blade->render('login');
    
        }else{
    
            $email = $_POST['email'];
            $pass = $_POST['pass'];
    
            $user = $db->loginUser($email, $pass);
    
            if (isset($user['nif'])) {
    
                echo "Bienvenido "  . $user['nif'];
                echo $blade->render('nada');
                /*pasando parametro
                  echo $blade->render('nada', [
                    'user' => $user['email'],
                ]);
                */
            }else{
    
                echo $blade->render('login');
    
            }
    
        }
