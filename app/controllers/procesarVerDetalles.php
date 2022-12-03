<?php
    
    include('../models/Tarea.php');
    include('../models/GestionDataBase.php');
    include('../library/creaTable.php');

    $nombreCampos = Tarea::getNombreCamposTarea();
    $valoresCampo = Tarea::getSelectTarea($_GET['id']);


    $listaNombres = [];

    foreach($nombreCampos AS $valor) :

        array_push($listaNombres, $valor['COLUMN_NAME']); 

    endforeach;

    $html = '<table class="table table-bordered border-secondary">
    <tr><thead class="table-dark"><th>Campos Tarea</th><th>Valores Tarea</th></thead></tr>';

    foreach($nombreCampos AS $id=>$valor) :

        $html .= '<tr>';

        foreach($valoresCampo AS $value) :

            $html .= '<td>' . $listaNombres[$id] . '</td><td>' . $value[$listaNombres[$id]] . '</td></tr>';

        endforeach;

    endforeach;

    $html .= '</table>';

    include('../views/verDetallesTarea.php');