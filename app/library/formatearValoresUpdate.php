<?php

    function formatearValoresUpdate($campos){

        $cadena = '';

        foreach($campos AS $id=>$valor){

            $cadena .= $id . "='" . $valor . "',";

        }

        $cadena = substr($cadena, 0, -1);

        return $cadena;
        
    }