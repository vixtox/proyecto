<?php

    function validarClave($clave){
        
        if(strlen($clave) < 4){
        return false;
        
        }else{
            return true;
        }
    }