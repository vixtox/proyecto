<?php

    class Tarea{
        
        private function __construct(){

        }

        static function addTarea($nombre_campos, $valor_campos){
            
            return ClaseConexion::getInstance()->insertarCampos('tareas', $nombre_campos, $valor_campos);
        }
        
    }
    