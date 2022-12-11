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
         * @param  mixed $nombre_campos String nombre de los campos de la base de datos
         * @param  mixed $valor_campos String valor de los campos a insertar en la base de datos
         * @return void Ejejuta insert
         */
        static function addTarea($nombre_campos, $valor_campos){
           
            return GestionDatabase::getInstance()->insertarCampos('tareas', $nombre_campos, $valor_campos);
        }
        
        /**
         * getListaTareas
         *
         * @return void array devuelve la lista de tareas completa
         */
        static function getListaTareas(){
           
            return GestionDatabase::getInstance()->selectAll('tareas');
        }
        
        /**
         * getNumeroTareas
         *
         * @param  mixed $condicion String con uina condicion
         * @return void int Devuelve el número de tareas
         */
        static function getNumeroTareas($condicion){
           
            return GestionDatabase::getInstance()->numFilas('tareas', $condicion);
        }
                
        /**
         * getTareasPorPagina
         *
         * @param  mixed $empezarDesde int pagina desde se empieza a mostrar
         * @param  mixed $tamanioPagina int intervalo superio del Limit de sql
         * @param  mixed $condicion String condicion de la consulta
         * @return void array con los las tareas por página
         */
        static function getTareasPorPagina($empezarDesde, $tamanioPagina, $condicion){
           
            return GestionDatabase::getInstance()->resultadosPorPagina('tareas', 'fecha_realizacion', $empezarDesde, $tamanioPagina, $condicion);
        }
        
        /**
         * deleteTarea
         *
         * @param  mixed $id String id de la tarea
         * @return void Borra una tarea
         */
        static function deleteTarea($id){
           
            return GestionDatabase::getInstance()->borrarFila('tareas', 'id', $id);
        }
        
        /**
         * getNombreCamposTarea
         *
         * @return void array con los nombres de las columnas de la base de datos
         */
        static function getNombreCamposTarea(){
           
            return GestionDatabase::getInstance()->getNombreColunmasTabla('tareas');
        }
        
        /**
         * getSelectTarea
         *
         * @param  mixed $id String id de la tarea
         * @return void array selecciona datos de una tarea
         */
        static function getSelectTarea($id){
           
            return GestionDatabase::getInstance()->getSelectFila('tareas', 'id', $id);
        }
            
        /**
         * updateTarea
         *
         * @param  mixed $sentencia String con sentecia sql
         * @param  mixed $id String id de la tarea
         * @return void actuakliza tarea en la base de datos
         */
        static function updateTarea($sentencia, $id){

            return GestionDatabase::getInstance()->updateTarea('tareas', 'id', $sentencia, $id);
        }

    }
    