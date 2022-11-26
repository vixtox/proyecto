<?php

  function subirArchivo($fich,$id)
  {
      $destino = __DIR__ . "/../archivos/";
      $dest = $destino . "tarea". $id . "_" . basename($_FILES[$fich]['name']);
  
      if (is_uploaded_file($_FILES[$fich]['tmp_name'])) {
          move_uploaded_file($_FILES[$fich]['tmp_name'], $dest);
      }
  }