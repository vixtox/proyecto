<?php
    
    /**
     * codPostalValido
     *
     * @param  string $codPostal String código postal
     * @return boolean boolean código postal valido
     */
    function codPostalValido($codPostal){

        $numerosCod = str_split($codPostal, 1);
        

        if(count($numerosCod) != 5): //Que tenga 5 números
            return false;
        endif;

        foreach($numerosCod AS $valor) :

            if(!is_numeric($valor)): //Que solo contenga números
                return false;
            endif;

        endforeach;

        if($numerosCod[0] > 5 || ($numerosCod[0] == 5 && $numerosCod[1] > 2)): //Que no sea superior a 52 (Melilla)
            return false;
        endif;

        if($numerosCod[0] == 0 && $numerosCod[1] == 0)://Que los dos primeros dígitos no sean 0
            return false;
        endif;

        return true;
    }