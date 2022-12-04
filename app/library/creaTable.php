<?php

    function creaTable($name, $nombreCampos, $listaValores){

    $html = '<table class="table table-bordered border-secondary" name="' . $name . '"><tr><thead class="table-dark">';

    foreach($nombreCampos AS $id=>$value) :
            
        $html .= '<th>' . $nombreCampos[$id] . '</th>';
    
    endforeach;

    $html .= '</thead></tr>';

    foreach($listaValores AS $valor) :

        $html .= '<tr>';

        foreach($nombreCampos AS $id=>$value) :
            
            $html .= '<td >' . $valor[$nombreCampos[$id]] . '</td>';

        endforeach;
     
        $html .= '<td><a href="../views/confirmarBorrarTarea.php?id=' . $valor['id'] . '" class="btn btn-info" role="button">Borrar</a></td>
            <td><a href="../controllers/validar_modficiacion_tarea.php?id=' . $valor['id'] . '" class="btn btn-info" role="button">Actualizar</a></td>
            <td><a href="../controllers/procesarVerDetalles.php?id=' . $valor['id'] . '" class="btn btn-info" role="button">Ver detalles</a></td></tr>';

    endforeach;

    $html .= '</table>';

    return $html;
    }