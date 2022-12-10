<?php

    include('../models/Tarea.php');
    include('../models/GestionDatabase.php');
    include('../library/creaTable.php');
    include('../library/formatearFecha.php');
    include("varios.php");

    session_start();

    $nombreCampos = [
        'id','nif_cif','nombre','apellidos','telefono','descripcion','estado','operario_encargado','fecha_realizacion'
    ];

    $nombreCamposTabla = [
        'ID','NIF/CIF','Nombre','Apellidos','Teléfono','Descripcion','Estado','Operario','Fecha realización'
    ];

    $tamanioPagina = 5;


    /**
     * Comprobar si se ha enviado por parametro el valor de la página a mostrar
     */
    if(isset($_GET['pagina'])){

        if($_GET['pagina'] == 1){

            header('location:procesarListaTareas.php');
         
        }else{
         
            $pagina = $_GET['pagina'];

        }

    }else{

        $pagina = 1;

    } 
  
    $condicion = '';
    $numFilas = Tarea::getNumeroTareas($condicion);
    $totalPaginas = ceil($numFilas / $tamanioPagina);

    /**
     * Comprobar si se ha enviado el valor de la página por el buscador
     */
    if(isset($_GET['numPag'])){

        if($_GET['numPag'] > 0 && $_GET['numPag'] <= $totalPaginas){
            $pagina = $_GET['numPag'];
        }
        
    }

    $empezarDesde = ($pagina-1) * $tamanioPagina;

    $registro = Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina, $condicion);

    $listaValores = [];

    foreach($registro AS $id=>$valor) : 

        $valor['fecha_creacion'] = formatearFecha($valor['fecha_creacion']);
        $valor['fecha_realizacion'] = formatearFecha($valor['fecha_realizacion']);
        array_push($listaValores, $valor);
    
    endforeach;

    echo $blade->render('listaTareas', [
        'tareas' => Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina, $condicion),
        'nombreCampos' => $nombreCampos,
        'empezarDesde' => $empezarDesde,
        'tamanioPagina' => $tamanioPagina,
        'pagina' => $pagina,
        'totalPaginas' => $totalPaginas,
        'nombreCamposTabla' => $nombreCamposTabla,
        'listaValores' => $listaValores,
        'condicion' => $condicion
    ]);