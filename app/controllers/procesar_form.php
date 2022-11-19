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

        //if($errores){
            include("../views/form_tarea.php");
       // }
       
    }

    /*
    if($_POST){

        $nif = filtrado($_POST["nifCif"]);
        $persona_contacto = filtrado($_POST["persContact"]);
        $telefono = filtrado($_POST["tel"]);
        $descripcion = filtrado($_POST["desc"]);
        $email = filtrado($_POST["email"]);
        $direccion = filtrado($_POST["dir"]);
        $poblacion = filtrado($_POST["pob"]);
        $codPostal = filtrado($_POST["cod_p"]);
        //provincia select
        $estado = filtrado($_POST["estado"]);
        //operario select
        $fecha_realiz = filtrado($_POST["fech_realiz"]);
        $anot_ant = filtrado($_POST["anot_ant"]);
        $anot_pos = filtrado($_POST["anot_post"]);
        //subir ficheros
        //subir fotos
    }

    */