<?php

    include("utilsforms.php");
    include("../library/validarCIF.php");
    include("../library/validarNIF.php");
    include("../library/validarTelefono.php");
    include("../library/validarCodPostal.php");
    include("../library/validarFecha.php");
    include("../library/creaSelect.php");
    include("../models/Provincia.php");
    include("../models/Operario.php");
    include('../models/GestionDatabase.php'); 
    include('varios.php'); 
    
    $conexion = GestionDatabase::getInstance();
    $errores = [];

    /**
     *  Si no han enviado el fomulario
     */

    if (!$_POST) {
        echo $blade->render('formularioInsertarTarea');

    /**
     *  Si han enviado el fomulario
     */

    } else {
        if (valorPost('nombre') == '') {
            $errores['nombre'] = "El campo no debe estar vacio";
        }
        if (valorPost('apellidos') == '') {
            $errores['apellidos'] = "El campo no debe estar vacio";
        }
        if (valorPost('descripcion') == '') {
            $errores['descripcion'] = "El campo no debe estar vacio";
        }
        if(!cifValido($_POST["nif_cif"]) && !nifValido($_POST["nif_cif"])){
            $errores['nif_cif'] = "El NIF/CIF no es válido";
        }
        if(!telefonoValido($_POST["telefono"])){
            $errores['telefono'] = "El teléfono no es válido";
        }
        if(!filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = "El email no es válido";
        }
        if(!codPostalValido($_POST["codigo_postal"])){
            $errores['codigo_postal'] = "El código postal no es válido";
        }
        if(!fechaValida($_POST["fecha_realizacion"])){
            $errores['fecha_realizacion'] = "La fecha no es válida";
        }

        /**
         * Si hay algún error se vuelve a cargar el formulario
         */

         if($errores){

            echo $blade->render('formularioInsertarTarea');

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
             * LLama a la función de la clase tarea para insertar los ampos obtenidos en el formulario
             */
            include('../models/Tarea.php');
            Tarea::addTarea($nombre_campos, $valor_campos);
        
            header('location:procesarListaTareas.php');

        }
       
    }