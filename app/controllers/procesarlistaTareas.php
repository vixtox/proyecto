<?php

    include('../models/Tarea.php');
    include('../models/GestionDatabase.php');
    include('../library/creaTable.php');

    $listaTareas = Tarea::getListaTareas();

    $nombreCampos = [
        'id','nif_cif','nombre','apellidos','telefono','descripcion','correo','direccion','poblacion',
        'codigo_postal','provincia','estado','fecha_creacion','operario_encargado','fecha_realizacion',
        'anotaciones_ant','anotaciones_pos','arch_resumen','fotos'
    ];

    include('../views/listaTareas.php');

    /*echo '<table border=1><tr>';

    foreach($nombreCampos AS $id=>$value) :
            
        echo '<th >' . $nombreCampos[$id] . '</th>';
    
    endforeach;

    echo '</tr>';

    foreach($listaTareas AS $valor) :

        echo '<tr>';

        foreach($nombreCampos AS $id=>$value) :
            
            echo '<td >' . $valor[$nombreCampos[$id]] . '</td>';
        
        endforeach;
    
      
        echo '</tr>';

    endforeach;

    echo '</table>';*/

