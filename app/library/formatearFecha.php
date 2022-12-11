<?php
    
    /**
     * formatearFecha
     *
     * @param  mixed $fechaOriginal String fecha actual
     * @return void String fecha formateada
     */
    function formatearFecha($fechaOriginal){

        $fechaFormateada = explode('-', $fechaOriginal);
        $year = $fechaFormateada[0];
        $month = $fechaFormateada[1];
        $day = $fechaFormateada[2];
        $fechaFormateada = $day . "/" . $month . "/" . $year;

        return $fechaFormateada;

    }