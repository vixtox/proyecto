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
    include('../models/ClaseConexion.php'); 
    $conexion = ClaseConexion::getInstance();
    $errores = [];
    $fecha = date("Y-m-d");

    if (!$_POST) { // Si no han enviado el fomulario
        include("../views/form_tarea.php");
     
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

        if($errores){

            include("../views/form_tarea.php");

        }else{

            include('result_form.php');

        }
       
    }