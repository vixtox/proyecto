<?php

    include('../models/Tarea.php');
    include('../models/GestionDatabase.php');
    include('../library/creaTable.php');
    include('../library/formatearFecha.php');

    $nombreCampos = [
        'id','nif_cif','nombre','apellidos','telefono','descripcion','estado','fecha_creacion','operario_encargado','fecha_realizacion'
    ];

    $tamanioPagina = 5;

    if(isset($_GET['pagina'])){

        if($_GET['pagina'] == 1){

            header('location:procesarListaTareas.php');
         
        }else{
         
            $pagina = $_GET['pagina'];

        }

    }else{

        $pagina = 1;

    }

    $empezarDesde = ($pagina-1) * $tamanioPagina;

    $numFilas = Tarea::getNumeroTareas();
    $totalPaginas = ceil($numFilas / $tamanioPagina);

    $registro = Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina);

    $listaValores = [];

    foreach($registro AS $id=>$valor) : 

        $valor['fecha_creacion'] = formatearFecha($valor['fecha_creacion']);
        $valor['fecha_realizacion'] = formatearFecha($valor['fecha_realizacion']);
        array_push($listaValores, $valor);
    
    endforeach;

    include('../views/listaTareas.php');

    if(isset($_GET['numPag'])){

        if($_GET['numPag'] < 1 || $_GET['numPag'] > $totalPaginas){

            $url = "procesarListaTareas.php?pagina=" . $pagina;

        }else{

            $url = "procesarListaTareas.php?pagina=" . $_GET['numPag'];
            
        }
            
        header("Location:$url");
    }