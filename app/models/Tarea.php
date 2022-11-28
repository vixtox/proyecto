<?php

    /**
     * Clase Tarea
     */

    class Tarea{
        
        /**
         * Constructor de la clase tarea privado
         */

        private function __construct(){

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
        
    }
    