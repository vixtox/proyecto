<?php

/**
 * Operario clase operario
 */
class Operario
{    
    /**
     * __construct constructor de Operario
     *
     * @return void
     */
    public function __construct(){

    }
    
    /**
     * listaParaSelect
     *
     * @return array String que devuelve para crear el select de operarios
     */
    static function listaParaSelect(){
        return GestionDatabase::getInstance()->getListaSelect('usuarios', 'nif', 'nombre', 'WHERE es_admin=0');
    }
}