<?php

    function creaTable($name, $nombreCampos, $nombreCamposTabla, $listaValores){

    $html = '<table class="table table-bordered border-secondary" name="' . $name . '"><tr><thead class="table-dark">';

    foreach($nombreCamposTabla AS $id=>$value) :
            
        $html .= '<th>' . $value . '</th>';
    
    endforeach;
    $html .= '<th>Acciones</th>';
    $html .= '</thead></tr>';

    foreach($listaValores AS $valor) :

        $html .= '<tr>';

        foreach($nombreCampos AS $id=>$value) :
            
            $html .= '<td >' . $valor[$nombreCampos[$id]] . '</td>';

        endforeach;

        $html .= '<td>';

        if($_SESSION['rol'] == 'Administrador'){

            $html .= '<a href="../controllers/procesarConfirmarBorrarTarea.php?id=' . $valor['id'] . '" class="btn btn-danger">Borrar</a> ';
        
        }

        if($_SESSION['rol'] == 'Administrador'){

            $html .= '<a href="../controllers/procesarActualizarTarea.php?id=' . $valor['id'] . '" class="btn btn-warning">Actualizar</a> ';
        }

        $html .= '<a href="../controllers/procesarVerDetalles.php?id=' . $valor['id'] . '" class="btn btn-primary">Detalles</a> ';
        
        if($_SESSION['rol'] == 'Operario'){

            $html .= '<a href="../controllers/procesarCompletarTarea.php?id=' . $valor['id'] . '" class="btn btn-success">Completar</a>';
        
        }
        
        $html .= '</td></tr>';

    endforeach;

    $html .= '</table>';

    return $html;
    }