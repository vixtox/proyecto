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

include("../library/getContenido.php");

$hayError = false;
$errores = [];

if (!$_POST) { // Si no han enviado el fomulario

    $id = $_GET['id'];

    $datosTarea = Tarea::getSelectTarea($id);
 
    include("../views/formularioModificarTarea.php");

} else {

    if (empty($_POST["nombre"])) {
        $errores['nombre'] = 'Campo nombre se encuentra vacio';
        $hayError = true;
    }
    if (empty($_POST["apellidos"])) {
        $errores['apellidos'] = 'Campo apellidos se encuentra vacio';
        $hayError = true;
    }
    if (empty($_POST["descripcion"])) {
        $errores['descripcion'] = 'Campo descripción se encuentra vacio';
        $hayError = true;
    }
    if (empty($_POST["codigo_postal"]) || !codPostalValido($_POST["codigo_postal"])) {
        $errores['codigo_postal'] = 'Campo Codigo Postal tiene un formato incorrecto o se encuentra vacio';
        $hayError = true;
    }
    if (empty($_POST["nif_cif"]) || !nifValido($_POST["nif_cif"]) && !cifValido($_POST["nif_cif"])) {
        $errores['nif_cif'] = 'Campo NIF o CIF tiene un formato incorrecto o se encuentra vacio';
        $hayError = true;
    }
    if (empty($_POST["telefono"]) || !telefonoValido($_POST["telefono"])) {
        $errores['telefono'] = 'Campo teléfono tiene un formato incorrecto o se encuentra vacio';
        $hayError = true;
    }
    if (!filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL)) {
        $errores['correo'] = 'Campo correo tiene un formato incorrecto o se encuentra vacio';
        $hayError = true;
    }

    if ($hayError) {
        $id = $_GET['id'];
        include("../views/formularioModificarTarea.php");
    } else {
        $todos_los_campos = $_POST;

        $id = $_GET['id'];

        if ($_FILES['arch_resumen']['name'] == "") {
            $todos_los_campos["arch_resumen"] = "";
        } else {
            subirArchivo('arch_resumen', $id);
            $todos_los_campos["arch_resumen"] = "Tarea-" . $id . "-" . $_FILES['arch_resumen']['name'];
        }

        if ($_FILES['fotos']['name'] == "") {
            $todos_los_campos["fotos"] = "";
        } else {
            subirArchivo('fotos', $id);
            $todos_los_campos["fotos"] = "Tarea-" . $id . "-" . $_FILES['fotos']['name'];
        }

        Tarea::updateTareas(getContenido($todos_los_campos, true), getContenido($todos_los_campos, false), $id);

        header("location:procesarListaTareas.php");
    }
}
