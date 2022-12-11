<?php

  /**
         * procesarFiltrarTareas
         *
         * @param  mixed $errores array con los errores del formulario
         * @param  mixed $datosTarea array con lops datos de  una tarea
         * @param  mixed $id id de la tarea
         * @param  mixed $nombreCampos array con nombre campos de la base de datos
         * @param  mixed $nombreCamposTabla array con nombre campos de th de la tabla
         * @param  mixed $datos array con todos los campos del formulario
         * @param  mixed $condicion String con valores formateados para sql
         */

session_start();

include("varios.php");
include('../models/Tarea.php');
include("../library/getContenido.php");
include("../library/creaTable.php");
include("../models/GestionDatabase.php");
include("../library/formatearFecha.php");


$nombreCampos = [
    'id','nif_cif','nombre','apellidos','telefono','descripcion', 'correo', 'codigo_postal', 'estado','operario_encargado','fecha_realizacion'
];

$nombreCamposTabla = [
    'ID','NIF/CIF','Nombre','Apellidos','Teléfono','Descripcion','Email', 'Código Postal', 'Estado','Operario','Fecha realización'
];

$tamanioPagina = 5;

/**
 *  Si no han enviado el fomulario
 */

    if (!$_POST && !isset($_GET['pagina'])) {

        echo $blade->render('formularioFiltrarTareas');

    } else {

        $datos = $_POST;

        $condicion = " WHERE ";

        if (!empty($datos["valor1"])) {
            $condicion .= $datos["campo1"] . $datos["criterio1"] . "'" . $datos["valor1"] . "'";
            if (!empty($datos["valor2"]) || !empty($datos["valor3"])) {
                $condicion .= " AND ";
            }
        }
        if (!empty($datos["valor2"])) {
            $condicion .= $datos["campo2"] . $datos["criterio2"] . "'" . $datos["valor2"] . "'";
            if (!empty($datos["valor3"])) {
                $condicion .= " AND ";
            }
        }
        if (!empty($datos["valor3"])) {
            $condicion .= $datos["campo3"] . $datos["criterio3"] . "'" . $datos["valor3"] . "'";
        }


        /**
         * Comprobar si se ha enviado por parametro el valor de la página a mostrar
         */

        if (isset($_GET['pagina'])) {

            if ($_GET['pagina'] == 1 && (!isset($_GET['condicion']))) {

                header('location:procesarFiltrarTareas.php');
            } else {

                $pagina = $_GET['pagina'];
            }
        } else {

            $pagina = 1;
        }
        
        if(isset($_GET['condicion'])){
            $condicion = $_GET['condicion'];
        }

        $numFilas = Tarea::getNumeroTareas($condicion);
        $totalPaginas = ceil($numFilas / $tamanioPagina);
        $empezarDesde = ($pagina - 1) * $tamanioPagina;

        $registro = Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina, $condicion);

        $listaValores = [];
  
      foreach($registro AS $id=>$valor) : 
  
          $valor['fecha_creacion'] = formatearFecha($valor['fecha_creacion']);
          $valor['fecha_realizacion'] = formatearFecha($valor['fecha_realizacion']);
          array_push($listaValores, $valor);
      
      endforeach;
  
    
        //$tareas = Tarea::buscarTarea($condicion);
        echo $blade->render('listaFiltrarTarea', [
            //'tareas' => $tareas,
            'nombreCampos' => $nombreCampos,
            'nombreCamposTabla' => $nombreCamposTabla,
            'listaValores' => $listaValores,
            'empezarDesde' => $empezarDesde,
            'tamanioPagina' => $tamanioPagina,
            'pagina' => $pagina,
            'totalPaginas' => $totalPaginas,
            'condicion' => $condicion

        ]);
    }

