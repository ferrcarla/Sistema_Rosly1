<?php
require_once '../../config/global_variable.php';
require_once '../../config/session.php';

require_once("../../config/db.php");
require_once("../../config/conection.php");
//Variables para enviar a la plantilla


$sql = "SELECT s.Id_Salida,
    c.Nombre_Cli,
    c.Apellido_Cli,
    s.Fecha,    
    s.Cantidad,
    a.Nombre_Art
    FROM salida s, 
    cliente c, 
    articulo a
    where s.CI_Cliente = c.CI_Cliente
    and s.Id_Articulo = a.Id_Articulo
";
if (!($salidas = $con->query($sql))) {
    echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
}
$con->close();
//Variables para enviar a la plantilla son necesarias
$titulo = "Salidas";
$contenido = "out/index.php";
require_once('../../../public/views/plantilla.php');
