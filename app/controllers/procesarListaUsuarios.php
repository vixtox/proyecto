<?php

  /**
         * procesarListaUsuarios
         *
         * @param  mixed $nombreCampos array con el nombre de los campos de  la base de datos
         * @param  mixed $nombreCamposTabla array con el nombre de los campos de laos th de la tabla
         * @param  mixed $tamanioPagina int tamaño de pagina a paginar
         * @param  mixed $pagina int numero de pagina
         * @param  mixed $numFilas int numero de tareas obtenida de la consulta
         * @param  mixed $totalPaginas int total de paginas de la paginacion
         * @param  mixed $condicion Strin de la sentencia sql
         * @param  mixed $empezardesde int pagina desde la que empieza la paginacion
         * @param  mixed $registro array con el las tareas a paginar
         * @param  mixed $listaValores array con los datos de la tarea despues de formatear las fechas
         */

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