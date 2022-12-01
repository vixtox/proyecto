<?php

    function formatearFecha($fechaOriginal){

        $fechaFormateada = explode('-', $fechaOriginal);
        $year = $fechaFormateada[0];
        $month = $fechaFormateada[1];
        $day = $fechaFormateada[2];
        $fechaFormateada = $day . "/" . $month . "/" . $year;

        return $fechaFormateada;

    }