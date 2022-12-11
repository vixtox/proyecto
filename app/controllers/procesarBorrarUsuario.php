<?php

 /**
         * procesarBorrarUsuario
         *
         * @param  mixed $nif nif del usuario
         */
    
    include('../models/GestionDataBase.php'); 
    include('../models/Usuario.php'); 

    $nif = $_GET['nif'];
    Usuario::deleteUsuario($nif);

    header('location:../controllers/procesarListaUsuarios.php');