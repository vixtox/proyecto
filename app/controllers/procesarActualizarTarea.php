<?php

include("../models/GestionDataBase.php");
include("../library/creaSelect.php");
include("../controllers/utilsforms.php");

include("../models/Provincia.php");
include("../models/Operario.php");
include("../models/Tarea.php");

include("../library/validarCodPostal.php");
include("../library/validarNIF.php");
include("../library/validarCIF.php");
include("../library/validarFecha.php");
include("../library/validarTelefono.php");
include("../library/subirArchivo.php");
include('../controllers/varios.php');

$errores = [];
session_start();

if (!$_POST) { // Si no han enviado el fomulario

    $id = $_GET['id'];

    $datosTarea = Tarea::getSelectTarea($id);
 
    echo $blade->render('formularioActualizarTarea', [
        'id' => $id,
        'datosTarea' => $datosTarea
    ]);

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
