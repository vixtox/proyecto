<?php

  /**
         * procesarListaUsuarios
         *
         * @param  array $nombreCampos array con el nombre de los campos de  la base de datos
         * @param  array $nombreCamposTabla array con el nombre de los campos de laos th de la tabla
         * @param  int $tamanioPagina int tamaño de pagina a paginar
         * @param  int $pagina int numero de pagina
         * @param  int $numFilas int numero de tareas obtenida de la consulta
         * @param  int $totalPaginas int total de paginas de la paginacion
         * @param  string $condicion String de la sentencia sql
         * @param  int $empezardesde int pagina desde la que empieza la paginacion
         * @param  array $registro array con el las tareas a paginar
         * @param  array $listaValores array con los datos de la tarea despues de formatear las fechas
         */

         require __DIR__ . '/../ctes.php';
    include(MODEL_PATH.'Usuario.php');
    include(MODEL_PATH.'GestionDatabase.php');
    include(LIBRARY_PATH.'creaTable.php');
    include(CTRL_PATH."varios.php");

    session_start();

    if($_SESSION['rol'] == 'Administrador'){

        if($_SESSION['rol'] == 'Administrador'){

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

        }else if(($_SESSION['rol'] == 'Operario')){

            header('location:procesarListaTareas.php');

        }else{

            header('location:procesarLogin.php');

        }

}else if(($_SESSION['rol'] == 'Operario')){

    header('location:procesarListaTareas.php');

}else{

    header('location:procesarLogin.php');

}