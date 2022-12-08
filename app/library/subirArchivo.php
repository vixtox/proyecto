<?php

    /**
     * Función que sube archivos a la carpeta archivos y les pone un nombre
     * con el prefijo de tarea y su id
     */

    function subirArchivo($fich,$id){

        $directorio = __DIR__ . "/../archivos/";
        $ruta = $directorio . "Tarea_". $id . "_" . basename($_FILES[$fich]['name']);
  
        if (is_uploaded_file($_FILES[$fich]['tmp_name'])){

            move_uploaded_file($_FILES[$fich]['tmp_name'], $ruta);

        }

    }