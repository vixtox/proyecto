<?php



function nifValido($nif) {
        $nif = strtoupper($nif);
        
        $nifRegEx = '/^[0-9]{8}[A-Z]$/i';
        $nieRegEx = '/^[XYZ][0-9]{7}[A-Z]$/i';
        
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        
        if (preg_match($nifRegEx, $nif)) return ($letras[(substr($nif, 0, 8) % 23)] == $nif[8]);
        else if (preg_match($nieRegEx, $nif)) {
            if ($nif[0] == "X") $nif[0] = "0";
            else if ($nif[0] == "Y") $nif[0] = "1";
            else if ($nif[0] == "Z") $nif[0] = "2";
    
            return ($letras[(substr($nif, 0, 8) % 23)] == $nif[8]);
        }
        else return false;

    }