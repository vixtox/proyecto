<?php

    function creaTableDetalles($name, $nombreCampos, $valoresCampos){

        $html = '<table class="table table-bordered border-secondary name="' . $name . '">
            <tr><thead class="table-dark"><th>Campos Tarea</th><th>Valores Tarea</th></thead></tr>';
    
        foreach($nombreCampos AS $valor) :
    
            $html .= '<tr><td>' . $valor['COLUMN_NAME'] . '</td><td>' . $valoresCampos[$valor['COLUMN_NAME']] . '</td></tr>';
    
        endforeach;
    
        $html .= '</table>';
    
        return $html;
    }