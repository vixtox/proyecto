<?php

        $campos=$_POST;
        unset($campos['fotos']);
        unset($campos['arch_resumen']);

        $nombre_campos = [];//Array con los nombres de los campos de la base de datos
        $valor_campos = [];//Array con los valores de los campos enviados desde el formulario

        foreach($campos AS $clave=>$valor){

                array_push($nombre_campos, $clave);
                array_push($valor_campos, $valor);

        }

        include('../models/Tarea.php');
        Tarea::addTarea($nombre_campos, $valor_campos);
        
        echo "<a href='procesar_form.php'>Volver al formulario</a>";