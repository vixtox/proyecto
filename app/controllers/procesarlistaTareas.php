<?php

  /**
         * procesarListaTareas
         *
         * @param  mixed $conexion instancia de la base de datos
         * @param  mixed $errores array con los errores del formulario
         * @param  mixed $campos array con todos los campos del formulario
         * @param  mixed $nombre_campos array con el nombre de los campos de  la base de datos
         * @param  mixed $nombre_camposTabla array con el nombre de los campos de laos th de la tabla
         * @param  mixed $valor_campos array con el valor de los campos a inserta en la base de datos
         * @param  mixed $tamanioPagina int tamaño de pagina a paginar
         * @param  mixed $pagina int numero de pagina
         * @param  mixed $numFilas int numero de tareas obtenida de la consulta
         * @param  mixed $totalPaginas int total de paginas de la paginacion
         * @param  mixed $condicion Strin de la sentencia sql
         * @param  mixed $empezardesde int pagina desde la que empieza la paginacion
         * @param  mixed $registro array con el las tareas a paginar
         * @param  mixed $listaValores array con los datos de la tarea despues de formatear las fechas
         */

    include('../models/Tarea.php');
    include('../models/GestionDatabase.php');
    include('../library/creaTable.php');
    include('../library/formatearFecha.php');
    include("varios.php");

    session_start();

    $nombreCampos = [
        'id','nif_cif','nombre','apellidos','telefono','descripcion', 'correo', 'codigo_postal', 'estado','operario_encargado','fecha_realizacion'
    ];
    
    $nombreCamposTabla = [
        'ID','NIF/CIF','Nombre','Apellidos','Teléfono','Descripcion','Email', 'Código Postal', 'Estado','Operario','Fecha realización'
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