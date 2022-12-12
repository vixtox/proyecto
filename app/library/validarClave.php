<?php
    
    /**
     * validarClave
     *
     * @param  string $clave String contraseña
     * @return boolean Boolean contraseña valida
     */
    function validarClave2($clave){
        
        if(strlen($clave) < 4){
        return false;
        
        }else{
            return true;
        }
    }

    function validarClave($clave){

        $a = "^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$";
        if(preg_match("/$a/", $clave))
            return true;
        else
            return false;
    
    }
/*
La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
NO puede tener otros símbolos.
*/