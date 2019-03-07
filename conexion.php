<?php
/**
 * Desarrollado por Dany Diaz
 * Desarrollador Web
 */
//variables para la conexion
$databaseHost = 'localhost';
//nombre de la bd
$databaseName = 'controlaccesos';
//usuario de la base de datos
$databaseUsername = 'root';
//password
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
