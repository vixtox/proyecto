<?php
    
    /**
     * fechaValida
     *
     * @param  string $fecha String de la fedcha introducida
     * @return boolean boolean true si la fecha introducida es mayor que la actual
     */
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

            if(($y > $yearActual) || ($y == $yearActual && $m > $monthActual) || ($y == $yearActual && $m == $monthActual && $d >= $dayActual)):
                return true;
            endif;

        endif;
    
        return false;

    }