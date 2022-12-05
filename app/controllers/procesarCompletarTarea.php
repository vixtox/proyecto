<?php

    include("utilsforms.php");
    include("../library/subirArchivo.php");
    include("../library/getContenido.php");
    include("../models/Tarea.php");
    include("../models/GestionDatabase.php");
    
     /**
     *  Si no han enviado el fomulario
     */

    if (!$_POST) {
        $id = $_GET['id'];
        include("../views/formularioCompletarTarea.php");

    /**
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

        include("../library/formatearValoresUpdate.php");
        $sentencia = formatearValoresUpdate($campos);

        Tarea::updateTarea($sentencia, $id);

        header("location:procesarListaTareas.php");
    
    }