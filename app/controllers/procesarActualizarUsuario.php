<?php

 /**
         * procesarActualizarUsuario
         *
         * @param  array $errores array con los errores del formulario
         * @param  array $datosUsuario array con lops datos de  un usuario
         * @param  string $nif nif del usuario
         * @param  array $campos array con todos los campos del formulario
         * @param  string $sentencia String con valores formateados para sql
         */

         require __DIR__ . '/../ctes.php';
include(MODEL_PATH."GestionDataBase.php");
include(CTRL_PATH."utilsforms.php");
include(MODEL_PATH."Usuario.php");
include(LIBRARY_PATH."validarTelefono.php");
include(LIBRARY_PATH."validarClave.php");
include(CTRL_PATH.'varios.php');

$errores = [];
session_start();

if($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Operario'){

    if (!$_POST) { // Si no han enviado el fomulario

        $nif = $_GET['nif'];

        $datosUsuario = Usuario::getSelectUsuario($nif);
    
        echo $blade->render('formularioActualizarUsuario', [
            'nif' => $nif,
            'datosUsuario' => $datosUsuario
        ]);

    }else {

        if(!filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = "El email no es válido";
        }
        if(!validarClave($_POST["clave"])){
            $errores['clave'] = "La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula";
        }
        if(!telefonoValido($_POST["telefono"])){
            $errores['telefono'] = "El teléfono no es válido";
        }

        if ($errores) {
            $nif = $_GET['nif'];
            echo $blade->render('formularioActualizarUsuario', [
                'nif' => $nif
            ]);
        } else {
            $campos = $_POST;

            $nif = $_GET['nif'];

            include("../library/formatearValoresUpdate.php");
            $sentencia = formatearValoresUpdate($campos);

            Usuario::updateUsuario($sentencia, $nif);

            if($_SESSION['rol'] == 'Administrador'){

                header("location:procesarListaUsuarios.php");

            }else{
                $nif = $_GET['nif'];
                $datosUsuario = Usuario::getSelectUsuario($nif);

                echo $blade->render('verDatosUsuario', [
                    'datosUsuario' => $datosUsuario
                ]);

            }
            
        }
    }

}