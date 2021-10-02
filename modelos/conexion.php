<?php

//Variables de conexión
$servername = "localhost";
$database = "nasaconstructores";
$username = "root";
$password = "";


$conexion = mysqli_connect($servername, $username, $password, $database);


if (!$conexion) {
    die("Conexion Fallida: " . mysqli_connect_error());
}


?>