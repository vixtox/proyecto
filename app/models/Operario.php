<?php

class Operario
{
    private function __construct(){

    }

    /**
     * Devuelve la lista de operarios para crear un select value = nif, texto = nombre de operario
     */

    static function listaParaSelect(){
        return GestionDatabase::getInstance()->getListaSelect('usuarios', 'nif', 'nombre', 'WHERE es_admin=0');
    }
}