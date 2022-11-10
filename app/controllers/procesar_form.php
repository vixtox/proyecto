<?php

    include("gestor_errores.php");

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
        include("../views/form_tarea.php");
    }

    if($_POST){

        $nif_cif = filtrado($_POST["nifCif"]);
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

    echo 
            "<p>NIF/CIF: " . $nif_cif . "</p><p>Persona de contacto: " .
            $persona_contacto . "</p><p>Teléfono: " .
            $telefono . "</p><p>Descripción: " .
            $descripcion . "</p><p>Correo electrónico: " .
            $email . "</p><p>Dirección: " .
            $direccion . "</p><p>Población: " .
            $poblacion . "</p><p>Código postal: " .
            $codPostal . "</p><p>Estado: " .
            $estado . "</p><p>Fecha de realización: " .
            $fecha_realiz . "</p><p>Anotaciones anteriores: " .
            $anot_ant . "</p><p>Anotaciones posteriores: " .
            $anot_pos . "</p>";

    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }