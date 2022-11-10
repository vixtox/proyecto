<?php
$conex=mysqli_connect('localhost', 'root', '', 'bunglebuild');
if (! $conex) {
    die("<p>ERROR EN la conexión</p>");
}