<?php

    include("utilsforms.php");
    include("../library/validarNIF.php");
    include("../library/validarClave.php");
    include("../library/validarTelefono.php");
    include('../models/GestionDatabase.php');
    include('varios.php'); 
    
    $conexion = GestionDatabase::getInstance();
    session_start();
    $errores = [];

    /**
     *  Si no han enviado el fomulario
     */

    if (!$_POST) {
        echo $blade->render('formularioInsertarUsuario');

    /**
     *  Si han enviado el fomulario
     */

    } else {
        if (valorPost('nombre') == '') {
            $errores['nombre'] = "El campo no debe estar vacio";
        }
       
        if(!nifValido($_POST["nif"])){
            $errores['nif'] = "El NIF no es válido";
        }
        if(!validarClave($_POST["clave"])){
            $errores['clave'] = "La clave no es válida";
        }
        if(!telefonoValido($_POST["telefono"])){
            $errores['telefono'] = "El teléfono no es válido";
        }
        if(!filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = "El email no es válido";
        }

        /**
         * Si hay algún error se vuelve a cargar el formulario
         */

         if($errores){

            echo $blade->render('formularioInsertarUsuario');

        /**
         * Si todo está correcto se pasan los resultados para manipular los datos
         */

        }else{

        /**
         * Se recogen todos los campos del formulario
         */

            $campos = $_POST;

            /**
             * Array con los nombres de los campos de la base de datos
             */

            $nombre_campos = [];

            /**
             * Array con los valores de los campos enviados desde el formulario
             */

            $valor_campos = [];

            foreach($campos AS $clave=>$valor){

                    array_push($nombre_campos, $clave);
                    array_push($valor_campos, $valor);

            }

            include('../library/formatearValoresInsertar.php');
            $nombre_campos = formatearValoresInsertar($nombre_campos, false);//Segundo parametro controla si se ponen comillas entre elementos del array
            $valor_campos = formatearValoresInsertar($valor_campos, true);

            /**
             * LLama a la función de la clase tarea para insertar los campos obtenidos en el formulario
             */
            include('../models/Usuario.php');
            Usuario::addUser($nombre_campos, $valor_campos);
        
            //header('location:procesarListaUsuarios.php');

        }
       
    }