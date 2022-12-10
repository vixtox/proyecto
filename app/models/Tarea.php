<?php

    /**
     * Clase Tarea
     */

    class Tarea{
        
        /**
         * Constructor de la clase Tarea
         */

        public function __construct(){

        }

        /**
         * Función estática que llama a la clase Conexion para insertar una nueva tarea
         */

        static function addTarea($nombre_campos, $valor_campos){
           
            return GestionDatabase::getInstance()->insertarCampos('tareas', $nombre_campos, $valor_campos);
        }

        
        /**
         * Función estática que llama a la clase Conexion para mostrar la lista de tareas
         */

        static function getListaTareas(){
           
            return GestionDatabase::getInstance()->selectAll('tareas');
        }

        static function getNumeroTareas($condicion){
           
            return GestionDatabase::getInstance()->numFilas('tareas', $condicion);
        }
        
        static function getTareasPorPagina($empezarDesde, $tamanioPagina, $condicion){
           
            return GestionDatabase::getInstance()->resultadosPorPagina('tareas', 'fecha_realizacion', $empezarDesde, $tamanioPagina, $condicion);
        }

        static function deleteTarea($id){
           
            return GestionDatabase::getInstance()->borrarFila('tareas', 'id', $id);
        }

        static function getNombreCamposTarea(){
           
            return GestionDatabase::getInstance()->getNombreColunmasTabla('tareas');
        }

        static function getSelectTarea($id){
           
            return GestionDatabase::getInstance()->getSelectFila('tareas', 'id', $id);
        }
    
        static function updateTarea($sentencia, $id){

            return GestionDatabase::getInstance()->updateTarea('tareas', 'id', $sentencia, $id);
        }

    }
    