<?php
require_once '../../config/global_variable.php';
require_once '../../config/session.php';

require_once("../../config/db.php");
require_once("../../config/conection.php");
//Variables para enviar a la plantilla


$sql = "SELECT *
    FROM entradas
";
if (!($entradas = $con->query($sql))) {
    echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
}
$con->close();

//Variables para enviar a la plantilla son necesarias
$titulo = "Entradas";
$contenido = "in/index.php";
require_once('../../../public/views/plantilla.php');
