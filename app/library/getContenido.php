<?php
    
    /**
     * getContenido
     *
     * @param  array $campos array 
     * @param  boolean $valor boolean
     * @return array array o String dependiendo del $valor
     */
    function getContenido($campos, $valor){
        
        $contenido = "";

        $nombreCampos = "";

        foreach ($campos as $clave => $valor) {
            $contenido  .= $valor . ',';
            $nombreCampos .= $clave . ',';
        }

        //Elimina el ultimo elemento, la coma del final
        $contenido = substr($contenido, 0, -1);

        $nombreCampos = substr($nombreCampos, 0, -1);

        $a_campos = explode(",", $contenido);

        if ($valor) {
            return $a_campos;
        } else {
            return $nombreCampos;
        }
    }
