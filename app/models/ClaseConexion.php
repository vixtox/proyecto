<?php

    //Clase encargada de gestionar las conexiones a la base de datos
    Class ClaseConexion{

        private $db;
        private $url = 'mysql:dbname=bunglebuild;host=localhost';
        private $usuario = 'root';
        private $pass = '';
        private static $_instance;

        //La función construct es privada para evitar que el objeto pueda ser creado mediante new
        private function __construct(){

            $this->conectar();

        }

        //Evitamos el clonaje del objeto. Patrón Singleton
        private function __clone(){ 
        }

        //Función encargada de crear, el objeto. Hay llamar desde fuera de la clase para instanciar el objeto
        public static function getInstance(){

            if(!(self::$_instance instanceof self)):

                self::$_instance=new self();

            endif;

            return self::$_instance;

        }

        //Realiza la conexión a la base de datos.
        private function conectar(){

            try {

                $this->db = new PDO($this->url, $this->usuario, $this->pass);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->exec("SET CHARACTER SET utf8");

            }catch(PDOException $e) {

                    echo 'Falló la conexión: ' . $e->getMessage();

                }
            }

        public function getListaSelect($tabla, $c_idx, $c_value, $condicion=''){//Función genérica para crear select

            $this->stmt = $this->db->prepare('SELECT ' . $c_idx . ',' . $c_value . ' FROM ' . $tabla . ' ' . $condicion);
            $this->stmt->execute();

            $lista = array();
            
            while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
            
                $lista[$row[$c_idx]] = $row[$c_value];
            }
            
            return $lista;
        }

        public function insertarCampos($tabla, $nombre_campos, $valor_campos){//Función genérica insertar en bases de datos

            $cadena = $this->formatearValores($nombre_campos, false);//Segundo parametro controla si se ponen comillas entre elementos del array
            $cadena2 = $this->formatearValores($valor_campos, true);
           
            $sql = "INSERT INTO " . $tabla . "(" . $cadena . ") VALUES(" . $cadena2 . ")"; 
        
            $resultado = $this->db->prepare($sql);
            $resultado->execute(array());

        }

        private function formatearValores($campos, $comillas){//Función génerica que formatea los nombres y valores de campos

            $cadena = '';

            foreach($campos AS $id=>$valor){

                    if($comillas){
                        $cadena .= "'";
                    }

                    $cadena .= $valor;
                    
                    if($comillas){
                        $cadena .= "'";
                    }
                   
                if($id < (count($campos) - 1)){//Añade coma tras cada campo excepto al útlimo

                    $cadena .= ",";

                }
                   
            }

            return $cadena;

        }

    }