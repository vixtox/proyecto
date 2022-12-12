<?php

  /**
         * procesarInsertarTarea
         *
         * @param  array $errores array con los errores del formulario
         * @param  string $id id de la tarea
         * @param  array $campos array con todos los campos del formulario
         * @param  array $nombre_campos array con el nombre de los campos de  la base de datos
         * @param  array $valor_campos array con el valor de los campos a inserta en la base de datos
         */


         require __DIR__ . '/../ctes.php';
    include(CTRL_PATH."utilsforms.php");
    include(LIBRARY_PATH."validarCIF.php");
    include(LIBRARY_PATH."validarNIF.php");
    include(LIBRARY_PATH."validarTelefono.php");
    include(LIBRARY_PATH."validarCodPostal.php");
    include(LIBRARY_PATH."validarFecha.php");
    include(LIBRARY_PATH."creaSelect.php");
    include(MODEL_PATH."Provincia.php");
    include(MODEL_PATH."Operario.php");
    include(MODEL_PATH.'GestionDatabase.php'); 
    include(CTRL_PATH.'varios.php'); 
    include(LIBRARY_PATH."validarInput.php");
    
    $conexion = GestionDatabase::getInstance();
    session_start();
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
        if (valorPost('nombre') == '' || !validarString($_POST['nombre'])) {
            $errores['nombre'] = "El campo no debe estar vacio ni contener carácteres especiales";
        }
        if (valorPost('apellidos') == '' || !validarString($_POST['apellidos'])) {
            $errores['apellidos'] = "El campo no debe estar vacio ni contener carácteres especiales";
        }
        if (valorPost('descripcion') == '' || !validarStringyNumber($_POST['descripcion'])) {
            $errores['descripcion'] = "El campo no debe estar vacio ni contener carácteres especiales";
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
        if (!validarStringyNumber($_POST['direccion'])) {
            if((!$_POST['direccion']) == '')
            $errores['direccion'] = "El campo no debe contener carácteres especiales";
        }
        if (!validarString($_POST['poblacion'])) {
            if((!$_POST['poblacion']) == '')
            $errores['poblacion'] = "El campo no debe contener carácteres especiales";
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
             * LLama a la función de la clase tarea para insertar los campos obtenidos en el formulario
             */
            include('../models/Tarea.php');
            Tarea::addTarea($nombre_campos, $valor_campos);
        
            header('location:procesarListaTareas.php');

        }
       
    }