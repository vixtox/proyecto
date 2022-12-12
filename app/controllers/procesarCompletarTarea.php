<?php

 /**
         * procesarCompletarTarea
         *
         * @param  array $errores array con los errores del formulario
         * @param  array $datosTarea array con lops datos de  una tarea
         * @param  string $id id de la tarea
         * @param  array $campos array con todos los campos del formulario
         * @param  string $sentencia String con valores formateados para sql
         */

    require __DIR__ . '/../ctes.php';
    include(CTRL_PATH."utilsforms.php");
    include(LIBRARY_PATH."subirArchivo.php");
    include(MODEL_PATH."Tarea.php");
    include(LIBRARY_PATH."formatearValoresUpdate.php");
    include(MODEL_PATH."GestionDatabase.php");
    include(CTRL_PATH."varios.php");
    include(LIBRARY_PATH."validarInput.php");

    session_start();
    
    if($_SESSION['rol'] == 'Operario'){

        $errores = [];
        /*
        *  Si no han enviado el fomulario
        */

        if (!$_POST) {
            $id = $_GET['id'];
            $datosTarea = Tarea::getSelectTarea($id);
            echo $blade->render('formularioCompletarTarea', [
                'id' => $id,
                'datosTarea' => $datosTarea
            ]);

        /*
        *  Si han enviado el fomulario
        */

        } else {

            if (!validarStringyNumber($_POST['anotaciones_ant'])) {
                if(!$_POST['anotaciones_ant'] == '')
                $errores['anotaciones_ant'] = "El campo no debe contener carácteres especiales";
            }
            if (!validarStringyNumber($_POST['anotaciones_pos'])) {
                if(!$_POST['anotaciones_pos'] == '')
                $errores['anotaciones_pos'] = "El campo no debe contener carácteres especiales";
            }

            if ($errores) {
                
                $id = $_GET['id'];
                $datosTarea = Tarea::getSelectTarea($id);

                echo $blade->render('formularioCompletarTarea', [
                    'id' => $id,
                    'datosTarea' => $datosTarea
                ]);
            }

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
            
            $sentencia = formatearValoresUpdate($campos);
            Tarea::updateTarea($sentencia, $id);

            header("location:procesarListaTareas.php");

        }

        }else if(($_SESSION['rol'] == 'Administrador')){

            header('location:procesarListaTareas.php');

    }else{

            header('location:procesarLogin.php');

    }