<?php

        $nif = $_POST["nifCif"];
        $persona_contacto = $_POST["persContact"];
        $telefono = $_POST["tel"];
        $descripcion = $_POST["desc"];
        $email = $_POST["email"];
        $direccion = $_POST["dir"];
        $poblacion = $_POST["pob"];
        $codPostal = $_POST["codPostal"];
        $provincia = $_POST["prov"];
        $estado = $_POST["estado"];
        $operario = $_POST["operario"];
        $fecha_realiz = $_POST["fechaReal"];
        $anot_ant = $_POST["anot_ant"];
        $anot_pos = $_POST["anot_post"];
        //subir ficheros
        //subir fotos

        echo "<ul><li>" .
        $nif . "</li><li>" .
        $persona_contacto . "</li><li>".
        $telefono . "</li><li>" .
        $descripcion . "</li><li>" .
        $email . "</li><li>" .
        $direccion . "</li><li>" .
        $poblacion . "</li><li>" .
        $codPostal . "</li><li>" .
        $provincia . "</li><li>" .
        $estado . "</li><li>" .
        $operario . "</li><li>" .
        $fecha_realiz . "</li><li>" .
        $anot_ant . "</li><li>" .
        $anot_pos . "</li></ul>";

        echo "<a href='procesar_form.php'>Volver al formulario</a>";