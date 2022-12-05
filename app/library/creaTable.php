<?php

    function creaTable($name, $nombreCampos, $nombreCamposTabla, $listaValores){

    $html = '<table class="table table-bordered border-secondary" name="' . $name . '"><tr><thead class="table-dark">';

    foreach($nombreCamposTabla AS $id=>$value) :
            
        $html .= '<th>' . $value . '</th>';
    
    endforeach;

    $html .= '</thead></tr>';

    foreach($listaValores AS $valor) :

        $html .= '<tr>';

        foreach($nombreCampos AS $id=>$value) :
            
            $html .= '<td >' . $valor[$nombreCampos[$id]] . '</td>';

        endforeach;
     
        $html .= '<td><a href="../views/confirmarBorrarTarea.php?id=' . $valor['id'] . '" class="btn btn-info" role="button">Borrar</a></td>
            <td><a href="../controllers/procesarActualizarTarea.php?id=' . $valor['id'] . '" class="btn btn-info" role="button">Actualizar</a></td>
            <td><a href="../controllers/procesarVerDetalles.php?id=' . $valor['id'] . '" class="btn btn-info" role="button">Detalles</a></td>
            <td><a href="../controllers/procesarCompletarTarea.php?id=' . $valor['id'] . '" class="btn btn-info" role="button">Completar</a></td></tr>';

    endforeach;

    $html .= '</table>';

    return $html;
    }