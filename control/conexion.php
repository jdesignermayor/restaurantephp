<?php

session_start();

$host = "localhost";
$puerto = "3306";
$usuario = "root";
$contrasena = "";
$baseDeDatos = "dbRestaurante";

if (!($db = mysqli_connect($host, $usuario, $contrasena))) {
    // echo "Error conectando a la base de datos.<br>";
    exit();
} else {
    // echo "Listo, estamos conectados.<br>";
}
if (!mysqli_select_db($db, $baseDeDatos)) {
    // echo "Error seleccionando la base de datos.<br>";
    exit();
} else {
    // echo "Obtuvimos la base de datos $baseDeDatos sin problema.<br>";
}
