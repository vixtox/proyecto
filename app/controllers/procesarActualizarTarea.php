<?php

  /**
         * procesarActualizarTarea
         *
         * @param  array $errores array con los errores del formulario
         * @param  array $datosTarea array con lops datos de  una tarea
         * @param  string $id id de la tarea
         * @param  array $campos array con todos los campos del formulario
         * @param  string $sentencia String con valores formateados para sql
         */ 
    require __DIR__ . '/../ctes.php';
    include(MODEL_PATH."GestionDataBase.php");
    include(LIBRARY_PATH."creaSelect.php");
    include(CTRL_PATH."utilsforms.php");

    include(MODEL_PATH."Provincia.php");
    include(MODEL_PATH."Operario.php");
    include(MODEL_PATH."Tarea.php");

    include(LIBRARY_PATH."validarCodPostal.php");
    include(LIBRARY_PATH."validarNIF.php");
    include(LIBRARY_PATH."validarCIF.php");
    include(LIBRARY_PATH."validarFecha.php");
    include(LIBRARY_PATH."validarTelefono.php");
    include(LIBRARY_PATH."subirArchivo.php");
    include(CTRL_PATH.'varios.php');
    include(LIBRARY_PATH."validarInput.php");

    $errores = [];
    session_start();
        if($_SESSION['rol'] == 'Administrador'){

        if (!$_POST) { // Si no han enviado el fomulario

            $id = $_GET['id'];

            $datosTarea = Tarea::getSelectTarea($id);
        
            echo $blade->render('formularioActualizarTarea', [
                'id' => $id,
                'datosTarea' => $datosTarea
            ]);

        } else {

            if (valorPost('nombre') == '' || !validarString($_POST['nombre'])) {
                $errores['nombre'] = "El campo no debe estar vacio ni contener carácteres especiales";
            }
            if (valorPost('apellidos') == '' || !validarString($_POST['apellidos'])) {
                $errores['apellidos'] = "El campo no debe estar vacio";
            }
            if (valorPost('descripcion') == '' || !validarStringyNumber($_POST['descripcion'])) {
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
            if (!validarStringyNumber($_POST['direccion'])) {
                $errores['direccion'] = "El campo no debe contener carácteres especiales";
            }
            if (!validarString($_POST['poblacion'])) {
                $errores['poblacion'] = "El campo no debe contener carácteres especiales";
            }
            if (!validarStringyNumber($_POST['anotaciones_ant'])) {
                if((!$_POST['anotaciones_ant']) == '')
                $errores['anotaciones_ant'] = "El campo no debe estar vacio ni contener carácteres especiales";
            }
            if (!validarStringyNumber($_POST['anotaciones_pos'])) {
                if((!$_POST['anotaciones_pos']) == '')
                $errores['anotaciones_pos'] = "El campo no debe estar vacio ni contener carácteres especiales";
            }

            if ($errores) {
                $id = $_GET['id'];
                echo $blade->render('formularioActualizarTarea', [
                    'id' => $id
                ]);
            } else {
                $campos = $_POST;

                $id = $_GET['id'];

                if ($_FILES['arch_resumen']['name'] == "") {
                    $campos["arch_resumen"] = "";
                } else {
                    subirArchivo('arch_resumen', $id);
                    $campos["arch_resumen"] = "Tarea_" . $id . "_" . $_FILES['arch_resumen']['name'];
                }

                if ($_FILES['fotos']['name'] == "") {
                    $campos["fotos"] = "";
                } else {
                    subirArchivo('fotos', $id);
                    $campos["fotos"] = "Tarea_" . $id . "_" . $_FILES['fotos']['name'];
                }

                include("../library/formatearValoresUpdate.php");
                $sentencia = formatearValoresUpdate($campos);

                Tarea::updateTarea($sentencia, $id);

                header("location:procesarListaTareas.php");
            }
        }

    }else if(($_SESSION['rol'] == 'Operario')){

        header('location:procesarListaTareas.php');

    }else{

        header('location:procesarLogin.php');

    }