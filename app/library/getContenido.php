<?php

    function getContenido($todos_los_campos, $valor){
        
        $contenido = "";

        $nombre_del_campo = "";

        foreach ($todos_los_campos as $nam => $cont) {
            $contenido  .= $cont . ',';
            $nombre_del_campo .= $nam . ',';
        }

        $contenido = substr($contenido, 0, -1);

        $nombre_del_campo = substr($nombre_del_campo, 0, -1);

        $a_campos = explode(",", $contenido);

        if ($valor) {
            return $a_campos;
        } else {
            return $nombre_del_campo;
        }
    }
