<?php

  
    /**
    * GestionDatabase clase encargada de gestionar la base de  datos
    * @param  mixed $db array 
    * @param  string $url String url
    * @param  string $usuario String usuario 
    * @param  string $pass String password
    * @param  mixed $instance 
    */
    Class GestionDatabase{

        private $db;
        private $url = 'mysql:dbname=bunglebuild;host=localhost';
        private $usuario = 'root';
        private $pass = '';
        private static $_instance;
     
        /**
         * __construct
         *La función construct es privada para evitar que el objeto pueda ser creado mediante new
         * @return void
         */
        private function __construct(){

            $this->conectar();

        }
  
        /**
         * __clone
         *Evitamos el clonaje del objeto. Patrón Singleton
         * @return void
         */
        private function __clone(){ 
        }
    
        /**
         * getInstance
         *Función encargada de crear, el objeto. Hay que llamar desde fuera de la clase para instanciar el objeto
         * @return void
         */
        public static function getInstance(){

            if(!(self::$_instance instanceof self)):

                self::$_instance=new self();

            endif;

            return self::$_instance;

        }

        /**
         * conectar
         *Realiza la conexión a la base de datos
         * @return void
         */
        private function conectar(){

            try {

                $this->db = new PDO($this->url, $this->usuario, $this->pass);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->exec("SET CHARACTER SET utf8");

            }catch(PDOException $e) {

                    echo 'Falló la conexión: ' . $e->getMessage();

                }
            }

        /**
         * getListaSelect
         *Función genérica para crear select
         * @param  string $tabla String nombre tabla base de datos
         * @param  string $c_idx String indice
         * @param  string $c_value String valor
         * @param  string $condicion String con la condicion de la sentencia sql
         * @return array array que devuelve para crear un select
         */
        public function getListaSelect($tabla, $c_idx, $c_value, $condicion=''){

            $this->stmt = $this->db->prepare('SELECT ' . $c_idx . ',' . $c_value . ' FROM ' . $tabla . ' ' . $condicion);
            $this->stmt->execute();

            $lista = array();
            
            while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
            
                $lista[$row[$c_idx]] = $row[$c_value];
            }
            
            return $lista;
        }
  
        /**
         * insertarCampos
         *Función genérica insertar en bases de datos
         * @param  string $tabla String nombre tabla base de datos
         * @param  array $nombre_campos array nombre campos base de datos
         * @param  array $valor_campos array valores de campos a insertar
         * @return void
         */
        public function insertarCampos($tabla, $nombre_campos, $valor_campos){

            $sql = "INSERT INTO " . $tabla . "(" . $nombre_campos . ") VALUES(" . $valor_campos . ")"; 

            $resultado = $this->db->prepare($sql);
            $resultado->execute(array());

        }
        
        /**
         * selectAll
         *Función que devuelve todos los campos de una tabla de la bases de datos
         * @param  string $tabla String tabla base de datos
         * @return array array todos los datos de una tabla
         */
        public function selectAll($tabla){
        
            $sql = "SELECT * FROM " . $tabla; 
        
            $resultado = $this->db->prepare($sql);
            $resultado->execute();

            /*Almacenamos el resultado de fetchAll en una variable*/
            $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $datos;
        }
        
        /**
         * numFilas
         *
         * @param  string $tabla String tabla base de datos
         * @param  string $condicion String con la condicion de la sentencia sql
         * @return int int numero filas de la consulta introducida
         */
        public function numFilas($tabla, $condicion){

            $sql = "SELECT * FROM " . $tabla . $condicion; 

            $resultado = $this->db->prepare($sql);
            $resultado->execute();
    
            $numFilas = $resultado->rowCount();

            return $numFilas;
        }
        
        /**
         * resultadosPorPagina
         *
         * @param  string $tabla String tabla base de datos
         * @param  string $orden String campo que especifica orden
         * @param  int $empezarDesde int inicio de limit
         * @param  int $tamanioPagina int fin de  limit
         * @param  string $condicion String con la condicion de la sentencia sql
         * @return array array devuelve resultados por pagina 
         */
        public function resultadosPorPagina($tabla, $orden, $empezarDesde, $tamanioPagina, $condicion){

            $queryLimite = "SELECT * FROM " . $tabla . $condicion . " ORDER BY $orden LIMIT " . $empezarDesde . "," . $tamanioPagina;

            $resultado = $this->db->prepare($queryLimite);
            $resultado->execute();

            /*Almacenamos el resultado de fetchAll en una variable*/
            $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $datos;
        }
        
        /**
         * loginUser
         *
         * @param  string $correo String con el email
         * @param  string $clave String con la contraseña
         * @return array array devuelve datops de  usuario
         */
        public function loginUser($correo, $clave){

            $sql = $this->db->query("SELECT * FROM usuarios WHERE correo='" . $correo . "' AND clave='" . $clave . "'");
            
            return $sql->fetch();

        }
        
        /**
         * borrarFila
         *
         * @param  string $tabla String tabla base de datos
         * @param  string $nombreCampo String con el nombre del campo a borrar
         * @param  string $valorCampo String con el valor del campo a borrar
         * @return void borra registro seleccionado
         */
        public function borrarFila($tabla, $nombreCampo, $valorCampo){

            $sql = "DELETE FROM " . $tabla . " WHERE " . $nombreCampo ."='" . $valorCampo . "'"; 
   
            $resultado = $this->db->prepare($sql);
            $resultado->execute();

        }
        
        /**
         * getNombreColunmasTabla
         *
         * @param  string $tabla String con el nombre de la tabla
         * @return array array con los nombres de las columnas de la base de datos
         */
        public function getNombreColunmasTabla($tabla){

            $sql = "SELECT COLUMN_NAME FROM Information_Schema.Columns WHERE TABLE_NAME ='" . $tabla . "'";

            $resultado = $this->db->prepare($sql);
            $resultado->execute();
            
            $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $datos;
        }
        
        /**
         * getSelectFila
         *
         * @param  string $tabla String con el nombre de la tabla
         * @param  string $nombreCampo String con el nombre del campo
         * @param  string $valorCampo String con el valor del campo
         * @return array
         */
        public function getSelectFila($tabla, $nombreCampo, $valorCampo){

            $stmt = $this->db->query("SELECT * FROM " . $tabla . " WHERE " . $nombreCampo . "='" . $valorCampo . "'");

            return $stmt->fetch();
        }
        
        /**
         * updateTarea
         *
         * @param  string $tabla String con el nombre de la tabla
         * @param  string $nombreCampo String con el nombre del campo
         * @param  string $sentencia con los parametros  a actualizar
         * @param  string $valorCampo String con el valor del campo
         * @return void
         */
        function updateTarea($tabla, $nombreCampo, $sentencia, $valorCampo){

            $sql = "UPDATE " . $tabla . " SET " . $sentencia ." WHERE " . $nombreCampo . "='" . $valorCampo . "'";
            
            $resultado = $this->db->prepare($sql);
            $resultado->execute(array());
        
        }

    }
