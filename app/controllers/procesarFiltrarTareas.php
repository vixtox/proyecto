<?php
session_start();

include("varios.php");
include('../models/Tarea.php');
include("../library/getContenido.php");
include("../library/creaTable.php");
include("../models/GestionDatabase.php");


$nombreCampos = [
    'id','nif_cif','nombre','apellidos','telefono','descripcion','estado','operario_encargado','fecha_realizacion'
];

$nombreCamposTabla = [
    'ID','NIF/CIF','Nombre','Apellidos','Teléfono','Descripcion','Estado','Operario','Fecha realización'
];

$tamanioPagina = 5;

/**
 *  Si no han enviado el fomulario
 */

    if (!$_POST) {

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

       /* if (isset($_GET['pagina'])) {

            if ($_GET['pagina'] == 1) {

                header('location:procesarFiltrarTareas.php');
            } else {

                $pagina = $_GET['pagina'];
            }
        } else {

            $pagina = 1;
        }*/

       // $numFilas = Tarea::getNumeroTareas($condicion);

      //  $totalPaginas = ceil($numFilas / $tamanioPagina);

        /**
         * Comprobar si se ha enviado el valor de la página por el buscador
         */
     /*   if (isset($_GET['numPag'])) {

            if ($_GET['numPag'] > 0 && $_GET['numPag'] <= $totalPaginas) {
                $pagina = $_GET['numPag'];
            }
        }*/

      //  $empezarDesde = ($pagina - 1) * $tamanioPagina;

        //$listaValores = [];

        /*$registro = Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina, $condicion);
        foreach($registro AS $id=>$valor) : 
    
            $valor['fecha_creacion'] = formatearFecha($valor['fecha_creacion']);
            $valor['fecha_realizacion'] = formatearFecha($valor['fecha_realizacion']);
            array_push($listaValores, $valor);
        
        endforeach;*/
        $tareas = Tarea::buscarTarea($condicion);
        echo $blade->render('listaFiltrarTarea', [
            'tareas' => $tareas,
            'nombreCampos' => $nombreCampos,
            'nombreCamposTabla' => $nombreCamposTabla,
            //'listaValores' => $listaValores,
           // 'empezarDesde' => $empezarDesde,
           // 'tamanioPagina' => $tamanioPagina,
           // 'pagina' => $pagina,
           // 'totalPaginas' => $totalPaginas

        ]);
    }

