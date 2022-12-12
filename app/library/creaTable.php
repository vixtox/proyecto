<?php
    
    /**
     * creaTable
     *
     * @param  string $name String nombre de la tabla
     * @param  array $nombreCampos array nombre de los campos de la base de datos
     * @param  array $nombreCamposTabla array nombre de los th de la tabla creada
     * @param  array $listaValores array valores de los td de la tabla creada
     * @param  string $primaryKey String variable que sirve para identificar los registros a modificar, borrar o listar
     * @return string devuelve un String de una tabla
     */
    function creaTable($name, $nombreCampos, $nombreCamposTabla, $listaValores, $primaryKey){

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
            if($name != 'listaUsuarios'){
                $html .= '<a href="../controllers/procesarConfirmarBorrarTarea.php?id=' . $valor[$primaryKey] . '" class="btn btn-danger">Borrar</a> ';
            }else{
    
                $html .= '<a href="../controllers/procesarConfirmarBorrarUsuario.php?nif=' . $valor[$primaryKey] . '" class="btn btn-danger">Borrar</a> ';
            }
        }

        if($_SESSION['rol'] == 'Administrador'){
            if($name != 'listaUsuarios'){
                $html .= '<a href="../controllers/procesarActualizarTarea.php?id=' . $valor[$primaryKey] . '" class="btn btn-warning">Actualizar</a> ';
            }else{
                $html .= '<a href="../controllers/procesarActualizarUsuario.php?nif=' . $valor[$primaryKey] . '" class="btn btn-warning">Actualizar</a> ';
            }
        }

        if($name != 'listaUsuarios'){
            $html .= '<a href="../controllers/procesarVerDetalles.php?id=' . $valor[$primaryKey] . '" class="btn btn-primary">Detalles</a> ';
        }

        if($_SESSION['rol'] == 'Operario'){

            $html .= '<a href="../controllers/procesarCompletarTarea.php?id=' . $valor[$primaryKey] . '" class="btn btn-success">Completar</a>';
        
        }
        
        $html .= '</td></tr>';

    endforeach;

    $html .= '</table>';

    return $html;
    }