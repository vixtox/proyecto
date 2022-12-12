<?php

    /**
     * Tarea clase Tarea
     */
    class Tarea{
        
        /**
         * __construct Constructor de la clase Tarea
         *
         * @return void
         */
        public function __construct(){

        }


        
        /**
         * addTarea
         *
         * @param  string $nombre_campos String nombre de los campos de la base de datos
         * @param  string $valor_campos String valor de los campos a insertar en la base de datos
         * @return void Ejejuta insert
         */
        static function addTarea($nombre_campos, $valor_campos){
           
            return GestionDatabase::getInstance()->insertarCampos('tareas', $nombre_campos, $valor_campos);
        }
        
        /**
         * getListaTareas
         *
         * @return array array devuelve la lista de tareas completa
         */
        static function getListaTareas(){
           
            return GestionDatabase::getInstance()->selectAll('tareas');
        }
        
        /**
         * getNumeroTareas
         *
         * @param  string $condicion String con uina condicion
         * @return int int Devuelve el número de tareas
         */
        static function getNumeroTareas($condicion){
           
            return GestionDatabase::getInstance()->numFilas('tareas', $condicion);
        }
                
        /**
         * getTareasPorPagina
         *
         * @param  int $empezarDesde int pagina desde se empieza a mostrar
         * @param  int $tamanioPagina int intervalo superio del Limit de sql
         * @param  string $condicion String condicion de la consulta
         * @return array array con los las tareas por página
         */
        static function getTareasPorPagina($empezarDesde, $tamanioPagina, $condicion){
           
            return GestionDatabase::getInstance()->resultadosPorPagina('tareas', 'fecha_realizacion', $empezarDesde, $tamanioPagina, $condicion);
        }
        
        /**
         * deleteTarea
         *
         * @param  string $id String id de la tarea
         * @return void Borra una tarea
         */
        static function deleteTarea($id){
           
            return GestionDatabase::getInstance()->borrarFila('tareas', 'id', $id);
        }
        
        /**
         * getNombreCamposTarea
         *
         * @return array array con los nombres de las columnas de la base de datos
         */
        static function getNombreCamposTarea(){
           
            return GestionDatabase::getInstance()->getNombreColunmasTabla('tareas');
        }
        
        /**
         * getSelectTarea
         *
         * @param  string $id String id de la tarea
         * @return array array selecciona datos de una tarea
         */
        static function getSelectTarea($id){
           
            return GestionDatabase::getInstance()->getSelectFila('tareas', 'id', $id);
        }
            
        /**
         * updateTarea
         *
         * @param  string $sentencia String con sentecia sql
         * @param  string $id String id de la tarea
         * @return void actualiza tarea en la base de datos
         */
        static function updateTarea($sentencia, $id){

            return GestionDatabase::getInstance()->updateTarea('tareas', 'id', $sentencia, $id);
        }

    }
    