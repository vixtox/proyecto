<?php

    function cifValido($cif) {

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

        if($codPostal == '00000'):
            return false;
        endif;

        return true;
    }

    function fechaValida($fecha){//Devuelve true si la fecha introducida es mayor que la actual

        if($fecha):

            $fecha = explode("-", $fecha);//Array con la fecha en el formato de nuestra zona-cultura
            $y = $fecha[0];
            $m = $fecha[1];
            $d = $fecha[2];
    
            $fechaActual = new DateTime();//Generar fecha actual
            $fechaActual = $fechaActual->format('d-m-Y');
    
            $fechaActual = explode("-", $fechaActual);
            $dayActual = $fechaActual[0];
            $monthActual = $fechaActual[1];
            $yearActual = $fechaActual[2];
    
            if(($y > $yearActual) || ($y == $yearActual && $m > $monthActual) || ($y == $yearActual && $m == $monthActual && $d > $dayActual)):
                return true;
            endif;

        endif;
      
        return false;

    }