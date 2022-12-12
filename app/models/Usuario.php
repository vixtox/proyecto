<?php

/**
 * Usuario clase Usuario
 */
class Usuario
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){

    }
         
         /**
          * addUser
          *
          * @param  array $nombre_campos array nombre de campos de la base de datos
          * @param  array $valor_campos array valor de los campos a insertar
          * @return void inserta un usuario en la base de datos
          */
         static function addUser($nombre_campos, $valor_campos){
           
            return GestionDatabase::getInstance()->insertarCampos('usuarios', $nombre_campos, $valor_campos);
        }
        
        /**
         * getNumeroUsuarios
         *
         * @param  string $condicion String con la condicion sql
         * @return int int devuelve el número de usuarios 
         */
        static function getNumeroUsuarios($condicion){
           
            return GestionDatabase::getInstance()->numFilas('usuarios', $condicion);
        }
        
        /**
         * getUsuariosPorPagina
         *
          * @param  int $empezarDesde int pagina desde se empieza a mostrar
         * @param  int $tamanioPagina int intervalo superio del Limit de sql
         * @param  string $condicion String condicion de la consulta
         * @return array array con los los usuarios por página
         */
        static function getUsuariosPorPagina($empezarDesde, $tamanioPagina, $condicion){
           
            return GestionDatabase::getInstance()->resultadosPorPagina('usuarios', 'es_admin', $empezarDesde, $tamanioPagina, $condicion);
        }
        
        /**
         * deleteUsuario
         *
         * @param  string $nif String con nif de usuario
         * @return void borra usuario de la base de datos
         */
        static function deleteUsuario($nif){
           
            return GestionDatabase::getInstance()->borrarFila('usuarios', 'nif', $nif);
        }
        
        /**
         * getSelectUsuario
         *
         * @param  string $nif String con nif de usuario
         * @return array array con los datos del usuario seleccionado
         */
        static function getSelectUsuario($nif){
           
            return GestionDatabase::getInstance()->getSelectFila('usuarios', 'nif', $nif);
        }
            
        /**
         * updateUsuario
         *
         * @param  string $sentencia String con la condicion del sql
         * @param  string $nif  String con nif de usuario
         * @return void actualiza datos de usuario en la base de  datos
         */
        static function updateUsuario($sentencia, $nif){

            return GestionDatabase::getInstance()->updateTarea('usuarios', 'nif', $sentencia, $nif);
        }

}