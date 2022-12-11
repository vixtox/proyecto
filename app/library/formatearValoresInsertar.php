<?php

   
    
    /**
     * formatearValoresInsertar
     *
     * @param  mixed $campos array de campos recibidos
     * @param  mixed $comillas Boolean 
     * @return void String formateado para insertar sql
     */
    function formatearValoresInsertar($campos, $comillas){

        $cadena = '';

        foreach($campos AS $id=>$valor){
                
            if($comillas){

                $cadena .= "'" . $valor . "'";

            }else{

               $cadena .= $valor;

            }
                
            /**
            * Añade coma tras cada campo excepto al útlimo
            */

            if($id < (count($campos) - 1)){

                $cadena .= ",";

            }
                   
        }

        return $cadena;

    }