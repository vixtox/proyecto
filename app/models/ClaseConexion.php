<?php

    //Clase encargada de gestionar las conexiones a la base de datos
    Class ClaseConexion{

        private $db;
        private $dsn = 'mysql:dbname=bunglebuild;host=localhost';
        private $usuario = 'root';
        private $pass = '';
        static $_instance;

        //La función construct es privada para evitar que el objeto pueda ser creado mediante new
        private function __construct(){

            $this->conectar();

        }

        //Evitamos el clonaje del objeto. Patrón Singleton
        private function __clone(){ }

        //Función encargada de crear, el objeto. Hay llamar desde fuera de la clase para instanciar el objeto
        public static function getInstance(){

            if (!(self::$_instance instanceof self)):

                self::$_instance=new self();

            endif;

            return self::$_instance;

        }

        //Realiza la conexión a la base de datos.
            private function conectar(){

                try {

                    $this->db = new PDO($this->dsn, $this->usuario, $this->pass);
                    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->db->exec("SET CHARACTER SET utf8");

                } catch (PDOException $e) {

                    echo 'Falló la conexión: ' . $e->getMessage();

                }

            }

            function getProvincias(){

                $sql = "SELECT codPoblacion, nombre FROM provincias";
                $resultado = $this->db->prepare($sql);
                $resultado->execute(array());

                $provincias = array();

                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)):

                    $provincias[$registro['codPoblacion']] = $registro['nombre'];

                endwhile;

                return $provincias;

            }

            function getOperarios(){

                $sql = "SELECT nombre, apellidos FROM usuarios WHERE es_admin=0";
                $resultado = $this->db->prepare($sql);
                $resultado->execute(array());

                $provincias = array();

                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)):

                    $provincias[$registro['nombre']] = $registro['apellidos'];
                    

                endwhile;

                return $provincias;

            }

    }

?>