<?php
/* DEFINICION DE LAS VARIABLES CON LOS DATOS DE CONEXION */
$se = "localhost";
$us = "milki";
$co = "1500";
$bd = "educa";
/* DEFINICION DE LAS VARIABLES CON LOS DATOS DE CONEXION */
//    $host_name  = "db571579163.db.1and1.com";
//    $database   = "db571579163";
//    $user_name  = "dbo571579163";
//    $password   = "02011985";

/* PREPARACION DE LA CONEXION */
$mysqli = new mysqli($se, $us, $co, $bd);

/* ESTABLECIMIENTO DE LA CONEXION */
if ($mysqli->connect_errno) {
    printf("Error en la conexion: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8");
?>