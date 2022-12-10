<?php

    include('../models/Usuario.php');
    include('../models/GestionDatabase.php');
    include('../library/creaTable.php');
    include("varios.php");

    session_start();

    $nombreCampos = [
        'nif','nombre','clave','correo', 'telefono', 'es_admin'
    ];

    $nombreCamposTabla = [
        'NIF','Nombre','Clave','Correo', 'Teléfono', 'Es admin'
    ];

    $tamanioPagina = 5;


    /**
     * Comprobar si se ha enviado por parametro el valor de la página a mostrar
     */
    if(isset($_GET['pagina'])){

        if($_GET['pagina'] == 1){

            header('location:procesarListaUsuarios.php');
         
        }else{
         
            $pagina = $_GET['pagina'];

        }

    }else{

        $pagina = 1;

    } 
  
    $condicion = '';
    $numFilas = Usuario::getNumeroUsuarios($condicion);
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

    $registro = Usuario::getUsuariosPorPagina($empezarDesde, $tamanioPagina, $condicion);

    $listaValores = [];

    foreach($registro AS $id=>$valor) : 

        array_push($listaValores, $valor);
    
    endforeach;

    echo $blade->render('listaUsuarios', [
        'tareas' => Usuario::getUsuariosPorPagina($empezarDesde, $tamanioPagina, $condicion),
        'nombreCampos' => $nombreCampos,
        'empezarDesde' => $empezarDesde,
        'tamanioPagina' => $tamanioPagina,
        'pagina' => $pagina,
        'totalPaginas' => $totalPaginas,
        'nombreCamposTabla' => $nombreCamposTabla,
        'listaValores' => $listaValores,
        'condicion' => $condicion
    ]);