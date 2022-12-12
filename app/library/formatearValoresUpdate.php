<?php
    
    /**
     * formatearValoresUpdate
     *
     * @param  array $campos array campos recibidos
     * @return string String formateado para sql update
     */
    function formatearValoresUpdate($campos){

        $cadena = '';

        foreach($campos AS $id=>$valor){

            $cadena .= $id . "='" . $valor . "',";

        }

        $cadena = substr($cadena, 0, -1);

        return $cadena;
        
    }