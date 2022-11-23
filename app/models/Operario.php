<?php

class Operario
{
    private function __construct()
    {
    }

    /**
     * DEvuelve la lista de provincias para crear un select cod->nombre
     */

    //el static no funciona.

    static function listaParaSelect()
    {
        return ClaseConexion::getInstance()->getListaSelect('usuarios', 'nif', 'nombre', 'WHERE es_admin=0');
    }
}