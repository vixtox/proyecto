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

            $cadena = $this->formatearValores($nombre_campos, false);//Segundo parametro controla si se ponen comillas entre elementos del array
            $cadena2 = $this->formatearValores($valor_campos, true);
            $sql = "INSERT INTO " . $tabla . "(" . $cadena . ") VALUES(" . $cadena2 . ")"; 
        
            $resultado = $this->db->prepare($sql);
            $resultado->execute(array());

        }

        /**
         * Función génerica que formatea los nombres y valores de campos para la sentencia SQL
         */

        private function formatearValores($campos, $comillas){

            $cadena = '';

            foreach($campos AS $id=>$valor){
                
                if($comillas){

                    $cadena .= "'" . $valor . "'";

                }else{

                    $cadena .= $valor;

                }
                
                /**
                 * Añade coma tras cada campo excepto al útlimo
                 */

                if($id < (count($campos) - 1)){

                    $cadena .= ",";

                }
                   
            }

            return $cadena;

        }

        /**
         * Función que devuelve el valor máximo de un campo
         */

        public function getMaxId($tabla, $campo){
                
            $sql = "SELECT " . $campo . " FROM " . $tabla . " ORDER BY " . $campo . " desc limit 1";
            $resultado = $this->db->prepare($sql);
            $resultado->execute();
            $resultado = $resultado->fetch()[0];
            
            return $resultado;
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

        public function numFilas($tabla){

            $sql = "SELECT * FROM " . $tabla; 

            $resultado = $this->db->prepare($sql);
            $resultado->execute();
    
            $numFilas = $resultado->rowCount();

            return $numFilas;
        }

        public function resultadosPorPagina($tabla, $empezarDesde, $tamanioPagina){

            $queryLimite = "SELECT * FROM " . $tabla . " ORDER BY fecha_realizacion LIMIT " . $empezarDesde . "," . $tamanioPagina;

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

    }