<?php
include "connect_bd.php";

$query = "SELECT * FROM comunidades";
$result = $conex->query($query);

$numfilas = $result->num_rows;
echo "El número de elementos es ".$numfilas;

for ($x=0;$x<$numfilas;$x++) {
    $fila = $result->fetch_object();
    echo "<br>" . $fila->codComunidad . " " . $fila->nombre;
}