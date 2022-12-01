<?php

    include("utilsforms.php");
    include("../library/validarCIF.php");
    include("../library/validarNIF.php");
    include("../library/validarTelefono.php");
    include("../library/validarCodPostal.php");
    include("../library/validarFecha.php");
   // include("../library/subirArchivo.php");
    include("../library/creaSelect.php");
    include("../models/Provincia.php");
    include("../models/Operario.php");
    include('../models/GestionDatabase.php'); 
    
    $conexion = GestionDatabase::getInstance();
    $errores = [];

    /**
     *  Si no han enviado el fomulario
     */

    if (!$_POST) {
        include("../views/form_tarea.php");

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

       /* $idNuevaTarea = $conexion->getMaxId('tareas','id')+ 1;
        
        subirArchivo("arch_resumen",$idNuevaTarea);
        subirArchivo("fotos",$idNuevaTarea);*/

        /**
         * Si hay algún error se vuelve a cargar el formulario
         */

         if($errores){

            include("../views/form_tarea.php");

        /**
         * Si todo está correcto se pasan los resultados para manipular los datos
         */

        }else{

                    /**
         * Se recogen todos los campos del formulario
         */

            $campos = $_POST;

            /**
             * Declara el nombre de los archivos o los deja en blanco si no se han enviado
             */

        /*    if ($_FILES['arch_resumen']['name'] == ""){
                    $campos["arch_resumen"] = "";
            }else{
                    subirArchivo('arch_resumen', $idNuevaTarea);
                    $campos["arch_resumen"] = "/../archivos/tarea_" . $idNuevaTarea . "_" . $_FILES['arch_resumen']['name'];
            }
        
            if ($_FILES['fotos']['name'] == ""){
                    $campos["fotos"] = "";
            }else{
                    subirArchivo('fotos', $idNuevaTarea);
                    $campos["fotos"] = "/../archivos/tarea_" . $idNuevaTarea . "_" . $_FILES['fotos']['name'];
            }*/

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

            include('../models/Tarea.php');

            /**
             * LLama a la función de la clase tarea para insertar los ampos obtenidos en el formulario
             */
            Tarea::addTarea($nombre_campos, $valor_campos);
        
            echo "<a href='procesarForm.php'>Volver al formulario</a>";

        }
       
    }