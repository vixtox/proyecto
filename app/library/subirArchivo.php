<?php
    
    /**
     * subirArchivo
     *
     * @param  mixed $fich String id archivo
     * @param  mixed $id String id de la tarea
     * @return void
     */
    function subirArchivo($fich,$id){

        $directorio = __DIR__ . "/../archivos/";
        $ruta = $directorio . "Tarea_". $id . "_" . basename($_FILES[$fich]['name']);
  
        if (is_uploaded_file($_FILES[$fich]['tmp_name'])){

            move_uploaded_file($_FILES[$fich]['tmp_name'], $ruta);

        }

    }