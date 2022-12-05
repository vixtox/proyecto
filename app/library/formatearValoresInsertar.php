<?php

    /**
     * Función génerica que formatea los nombres y valores de campos para la sentencia SQL
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