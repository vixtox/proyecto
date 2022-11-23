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

                    $this->db = new PDO($this->url, $this->usuario, $this->pass);
                    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->db->exec("SET CHARACTER SET utf8");

                } catch (PDOException $e) {

                    echo 'Falló la conexión: ' . $e->getMessage();

                }

            }

            function getListaSelect($tabla, $c_idx, $c_value, $condicion='')
    {
        $this->stmt = $this->db->prepare('SELECT ' . $c_idx . ',' . $c_value . ' FROM ' . $tabla . ' ' . $condicion);
        $this->stmt->execute();

        $lista = array();
        while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[$row[$c_idx]] = $row[$c_value];
        }
        return $lista;
    }


            

            

            function insertarTarea(){

                $sql = "INSERT INTO tareas (cod_tarea,nif_cif,nombre,telefono,descripcion,correo,poblacion,codigoPostal,
                    provincia,estado,fechaCreacion,operarioEncargado,fechaRealizacion,anotacionesAnt,anotacionesPos)
                    VALUES(0,'48937837R','Víctor Martínez Domínguez','657121379','Caer muro','victor1@gmail.com','Valverde del Camino',
                    '21600','Huelva','P','2022-11-21','Rafael Hinestrosa','2022-11-22','Muro en mal estado','Muro derribado')";
                $resultado = $this->db->prepare($sql);
                $resultado->execute(array());

            }

    }

?>