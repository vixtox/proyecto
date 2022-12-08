<?php

    include("utilsforms.php");
    include("../library/subirArchivo.php");
    include("../models/Tarea.php");
    include("../library/formatearValoresUpdate.php");
    include("../models/GestionDatabase.php");
    include("varios.php");

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