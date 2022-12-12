<?php

/**
 * Provincia classe Provincia
 */
class Provincia{
    
    /**
     * __construct constructor provincia
     *
     * @return void
     */
    public function __construct(){

    }

    /**
     * Devuelve la lista de provincias para crear un select value = código provincia, texto = nombre provincia
     */
    
    /**
     * listaParaSelect
     *
     * @return array que devuelve para crear el select de provincias
     */
    static function listaParaSelect(){
        return GestionDatabase::getInstance()->getListaSelect('provincias', 'codPoblacion', 'nombre');
    }
}