<?php

include("../models/GestionDataBase.php");
include("../controllers/utilsforms.php");
include("../models/Usuario.php");
include("../library/validarTelefono.php");
include("../library/validarClave.php");
include('varios.php');

$errores = [];
session_start();

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
        $errores['clave'] = "La clave no es válida";
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
