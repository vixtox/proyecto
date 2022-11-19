<?php

    include("utilsforms.php");
    include("validacion.php");

    $errores = [];

    if (!$_POST) { // Si no han enviado el fomulario
        include("../views/form_tarea.php");
    } else {
        if (ValorPost('persContact') == '') {
            $errores['persContact'] = "El campo no debe estar vacio";
        }
        if (ValorPost('desc') == '') {
            $errores['desc'] = "El campo no debe estar vacio";
        }
        if(!cifValido($_POST["nifCif"]) && !nifValido($_POST["nifCif"])){
            $errores['nifCif'] = "El NIF/CIF no es válido";
        }
        if(!telefonoValido($_POST["tel"])){
            $errores['tel'] = "El teléfono no es válido";
        }
        if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "El email no es válido";
        }
        if(!codPostalValido($_POST["codPostal"])){
            $errores['codPostal'] = "El código postal no es válido";
        }
        if(!fechaValida($_POST["fechaReal"])){
            $errores['fechaReal'] = "La fecha no es válida";
        }

        if($errores){

            include("../views/form_tarea.php");

        }else{

            include('result_form.php');

        }
       
    }