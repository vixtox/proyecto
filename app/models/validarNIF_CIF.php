<?php

    function cif_valido($cif) {
        $cif = strtoupper($cif);
        
        $cifRegEx1 = '/^[ABEH][0-9]{8}$/i';
        $cifRegEx2 = '/^[KPQS][0-9]{7}[A-J]$/i';
        $cifRegEx3 = '/^[CDFGJLMNRUVW][0-9]{7}[0-9A-J]$/i';
        
        if (preg_match($cifRegEx1, $cif) || preg_match($cifRegEx2, $cif) || preg_match($cifRegEx3, $cif)) {
            $control = $cif[strlen($cif) - 1];
            $suma_A = 0;
            $suma_B = 0;
            
            for ($i = 1; $i < 8; $i++) {
                if ($i % 2 == 0) $suma_A += intval($cif[$i]);
                else {
                    $t = (intval($cif[$i]) * 2);
                    $p = 0;
                    
                    for ($j = 0; $j < strlen($t); $j++) {
                        $p += substr($t, $j, 1);
                    }
                    $suma_B += $p;
                }
            }
            
            $suma_C = (intval($suma_A + $suma_B)) . "";
            $suma_D = (10 - intval($suma_C[strlen($suma_C) - 1])) % 10;
            
            $letras = "JABCDEFGHI";
            
            if ($control >= "0" && $control <= "9") return ($control == $suma_D);
            else return (strtoupper($control) == $letras[$suma_D]);
        }
        else return false;
    }

    function nif_valido($nif) {
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