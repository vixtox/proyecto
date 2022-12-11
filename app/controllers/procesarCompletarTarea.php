<?php

 /**
         * procesarCompletarTarea
         *
         * @param  mixed $errores array con los errores del formulario
         * @param  mixed $datosTarea array con lops datos de  una tarea
         * @param  mixed $id id de la tarea
         * @param  mixed $campos array con todos los campos del formulario
         * @param  mixed $sentencia String con valores formateados para sql
         */

    include("utilsforms.php");
    include("../library/subirArchivo.php");
    include("../models/Tarea.php");
    include("../library/formatearValoresUpdate.php");
    include("../models/GestionDatabase.php");
    include("varios.php");
    include("../library/validarInput.php");

    session_start();
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
            $errores['anotaciones_ant'] = "El campo no debe contener carácteres especiales";
        }
        if (!validarStringyNumber($_POST['anotaciones_pos'])) {
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