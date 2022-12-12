<?php

  /**
         * procesarListaLogin
         *
         * @param  mixed $conexion instancia de la base de datos
         * @param  string $email String con el valor del email
         * @param  string $pass String con el valor de la contraseña
         * @param  array $user array con los datos del usuario
         */
        require __DIR__ . '/../ctes.php';
        include(MODEL_PATH."GestionDataBase.php");
        include(CTRL_PATH."varios.php");
    
        $conexion = GestionDataBase::getInstance();

        if (isset($_SESSION)) {
            session_destroy();
        }

        // Si no han enviado el fomulario
        if (!$_POST) { 
    
            echo $blade->render('login');
    
        }else{
    
            $email = $_POST['email'];
            $pass = $_POST['pass'];
    
            $user = $conexion->loginUser($email, $pass);
    
            if (isset($user['nif'])) {

                session_start(); //crea una sesion
                $hora = date('H:i:s');

                $_SESSION['hora'] = $hora;
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['nif'] = $user['nif'];
                

                if ($user['es_admin'] == 1) {
                    $_SESSION['rol'] = "Administrador";
                } else {
                    $_SESSION['rol'] = "Operario";
                }
           
                  echo $blade->render('inicio');
                
            }else{
                $error = '<span style="color:red">Usuario o contraseña incorrectos</span>';
                echo $blade->render('login', [
                    'error' => $error
                ]);
    
            }
    
        }

     

          


           