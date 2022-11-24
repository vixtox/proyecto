<?php

    /**
     * Devuelve el valor de un campo enviado por POST. Si no existe devuelve el valor por defecto
     * @param string $nombreCampo
     * @param mixed $valorPorDefecto
     * @return string
     */
    function valorPost($nombreCampo, $valorPorDefecto=''){

        if(isset($_POST[$nombreCampo]))
            return $_POST[$nombreCampo];
        else
            return $valorPorDefecto;
    }

    // La siguiente función se utilizará en la vista
    /**
     * Muestra el texto de error si el campo es erroneo
     * @param string $campo Nombre campo
     */
    function verError($campo){

        global $errores;

        if (isset($errores[$campo])){

            echo '<span style="color:red">'.$errores[$campo].'</span>';
        }
    }