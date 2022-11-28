<?php

class Provincia{

    private function __construct(){

    }

    /**
     * Devuelve la lista de provincias para crear un select value = código provincia, texto = nombre provincia
     */

    static function listaParaSelect(){
        return GestionDatabase::getInstance()->getListaSelect('provincias', 'codPoblacion', 'nombre');
    }
}