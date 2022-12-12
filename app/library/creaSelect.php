<?php

   
    
    /**
     * creaSelect
     *
     * @param  string $name String nombre del select
     * @param  array $opciones array options del select
     * @param  string $valorDefecto String valor por defecto
     * @return string retorna un String con un select 
     */
    function creaSelect($name, $opciones, $valorDefecto = ''){

        $html = "\n" . '<select  class="form-select" name="' . $name . '">';

        foreach ($opciones as $value => $text) {

            if ($value == $valorDefecto)
                $select = 'selected="selected"';
            else
                $select = "";
            $html .= "\n\t<option value=\"$value\" $select>$text</option>";
        }

        $html .= "\n</select>";

        return $html;
    }