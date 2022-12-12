<?php
    
    /**
     * formatearFecha
     *
     * @param  string $fechaOriginal String fecha actual
     * @return string String fecha formateada
     */
    function formatearFecha($fechaOriginal){

        $fechaFormateada = explode('-', $fechaOriginal);
        $year = $fechaFormateada[0];
        $month = $fechaFormateada[1];
        $day = $fechaFormateada[2];
        $fechaFormateada = $day . "/" . $month . "/" . $year;

        return $fechaFormateada;

    }