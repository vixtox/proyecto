<?php

    include("gestor_errores.php");
    include("..//models/validarNIF_CIF.php");

    $gestor = new GestorErrores();

    if (!$_POST) { // Si no han enviado el fomulario
        include("../views/form_tarea.php");
    } else {
        if (empty($_POST["persContact"])) {
            $gestor->AnotaError($_POST["persContact"], "El campo no debe estar vacio");
        }
        if (empty($_POST["desc"])) {
            $gestor->AnotaError($_POST["desc"], "El campo no debe estar vacio");
        }
        if(!cif_valido($_POST["nifCif"]) && !nif_valido($_POST["nifCif"])){
            $gestor->AnotaError($_POST["nifCif"], "El NIF/CIF no es correcto");
        }
        include("../views/form_tarea.php");
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