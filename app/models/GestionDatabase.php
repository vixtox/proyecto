<?php

    /**
     * Clase encargada de gestionar las conexiones a la base de datos
     */
    
    Class GestionDatabase{

        private $db;
        private $url = 'mysql:dbname=bunglebuild;host=localhost';
        private $usuario = 'root';
        private $pass = '';
        private static $_instance;
        
        /**
         * La función construct es privada para evitar que el objeto pueda ser creado mediante new
         */
        private function __construct(){

            $this->conectar();

        }

        /**
         * Evitamos el clonaje del objeto. Patrón Singleton
         */
        
        private function __clone(){ 
        }

        /**
         * Función encargada de crear, el objeto. Hay que llamar desde fuera de la clase para instanciar el objeto
         */
        
        public static function getInstance(){

            if(!(self::$_instance instanceof self)):

                self::$_instance=new self();

            endif;

            return self::$_instance;

        }

        /**
         * Realiza la conexión a la base de datos
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
         * Función genérica para crear select
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
         * Función genérica insertar en bases de datos
         */
        
        public function insertarCampos($tabla, $nombre_campos, $valor_campos){

            $sql = "INSERT INTO " . $tabla . "(" . $nombre_campos . ") VALUES(" . $valor_campos . ")"; 
        
            $resultado = $this->db->prepare($sql);
            $resultado->execute(array());

        }

        /**
         * Función que devuelve todos los campos de una tabla de la bases de datos
         */

        public function selectAll($tabla){
        
            $sql = "SELECT * FROM " . $tabla; 
        
            $resultado = $this->db->prepare($sql);
            $resultado->execute();

            /*Almacenamos el resultado de fetchAll en una variable*/
            $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $datos;
        }

        public function numFilas($tabla, $condicion){

            $sql = "SELECT * FROM " . $tabla . $condicion; 

            $resultado = $this->db->prepare($sql);
            $resultado->execute();
    
            $numFilas = $resultado->rowCount();

            return $numFilas;
        }

        public function resultadosPorPagina($tabla, $empezarDesde, $tamanioPagina, $condicion){

            $queryLimite = "SELECT * FROM " . $tabla . $condicion . " ORDER BY fecha_realizacion LIMIT " . $empezarDesde . "," . $tamanioPagina;

            $resultado = $this->db->prepare($queryLimite);
            $resultado->execute();

            /*Almacenamos el resultado de fetchAll en una variable*/
            $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $datos;
        }

        public function loginUser($correo, $clave){

            $sql = $this->db->query("SELECT nif FROM usuarios WHERE correo='" . $correo . "' AND clave='" . $clave . "'");
            
            return $sql->fetch();

        }

        public function borrarFila($tabla, $id){

            $sql = "DELETE FROM " . $tabla . " WHERE id=" . $id; 
        
            $resultado = $this->db->prepare($sql);
            $resultado->execute();

        }

        public function getNombreColunmasTabla($tabla){

            $sql = "SELECT COLUMN_NAME FROM Information_Schema.Columns WHERE TABLE_NAME ='" . $tabla . "'";

            $resultado = $this->db->prepare($sql);
            $resultado->execute();
            
            $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $datos;
        }

        public function getSelectFila($tabla, $id){

            $stmt = $this->db->query("SELECT * FROM " . $tabla . " WHERE id=" . $id);

            return $stmt->fetch();
        }

        function updateTarea($tabla, $sentencia, $id){

            $sql = "UPDATE " . $tabla . " SET " . $sentencia ." WHERE id = $id";
            
            $resultado = $this->db->prepare($sql);
            $resultado->execute(array());
        
        }

    }