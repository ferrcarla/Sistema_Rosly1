<?php
require_once '../../config/global_variable.php';
require_once '../../config/session.php';

require_once("../../config/db.php");
require_once("../../config/conection.php");
//Variables para enviar a la plantilla


$sql = "SELECT e.Id_Entrada,
    e.Fecha_,
    u.Nombre as nombre_usuario,
    e.Cantidad,
    a.Nombre_Art
    FROM entrada e, 
    usuario u, 
    articulo a
    where e.Id_Usuario = u.Id_Usuario
    and e.Id_Articulo = a.Id_Articulo
";
$sql_producto = "SELECT * From articulo";

if (!($entradas = $con->query($sql))) {
    echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
}
$con->close();

$con = connect();
if (!($productos = $con->query($sql_producto))) {
    echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
}
$con->close();

//Variables para enviar a la plantilla son necesarias
$titulo = "Entradas";
$contenido = "in/index.php";
require_once('../../../public/views/plantilla.php');
