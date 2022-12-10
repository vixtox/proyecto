<?php

class Usuario
{
    public function __construct(){

    }

    /**
         * Función estática que llama a la clase Conexion para insertar un nuevo usuario
         */

         static function addUser($nombre_campos, $valor_campos){
           
            return GestionDatabase::getInstance()->insertarCampos('usuarios', $nombre_campos, $valor_campos);
        }
}