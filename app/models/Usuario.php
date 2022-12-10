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

        static function getNumeroUsuarios($condicion){
           
            return GestionDatabase::getInstance()->numFilas('usuarios', $condicion);
        }

        static function getUsuariosPorPagina($empezarDesde, $tamanioPagina, $condicion){
           
            return GestionDatabase::getInstance()->resultadosPorPagina('usuarios', 'es_admin', $empezarDesde, $tamanioPagina, $condicion);
        }

        static function deleteUsuario($nif){
           
            return GestionDatabase::getInstance()->borrarFila('usuarios', 'nif', $nif);
        }

        static function getSelectUsuario($nif){
           
            return GestionDatabase::getInstance()->getSelectFila('usuarios', 'nif', $nif);
        }
    
        static function updateUsuario($sentencia, $nif){

            return GestionDatabase::getInstance()->updateTarea('usuarios', 'nif', $sentencia, $nif);
        }

}