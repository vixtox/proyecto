<?php
    
    /**
     * validarString
     *
     * @param  string $string
     * @return boolean boolean String valido sin carácteres especiales
     */
    function validarString($string){

        $a = "^[A-Za-zÁÉÍÓÚáéíóúñÑ ]{2,40}+$";
        
        if (preg_match("/$a/", $string)) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * validarStringyNumber
     *
     * @param  string $string
     * @return boolean boolean
     */
    function validarStringyNumber($string){

        $a = "^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9 ]{2,300}+$";
        
        if (preg_match("/$a/", $string)) {
            return true;
        } else {
            return false;
        }
    }