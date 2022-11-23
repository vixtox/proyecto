<?php

    function telefonoValido($telefono){

        $numerosTel = str_split($telefono, 1);
        $digito1 = $numerosTel[0];

        foreach($numerosTel AS $valor) :

            if(!is_numeric($valor)):
                return false;
            endif;

        endforeach;

        if((count($numerosTel) == 9) && (($digito1 == 9) || ($digito1 == 8) || ($digito1 == 6) || ($digito1 == 7))):
            return true;
        endif;

        return false;

        }