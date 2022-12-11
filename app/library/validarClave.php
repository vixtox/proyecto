<?php
    
    /**
     * validarClave
     *
     * @param  mixed $clave String contraseña
     * @return void Boolean contraseña valida
     */
    function validarClave($clave){
        
        if(strlen($clave) < 4){
        return false;
        
        }else{
            return true;
        }
    }