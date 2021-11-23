<?php
require_once("app/config/db.php");

//Create connection and select DB
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
}
?>