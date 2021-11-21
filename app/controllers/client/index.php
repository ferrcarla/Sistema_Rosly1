<?php
require_once '../../config/global_variable.php';
require_once '../../config/session.php';

require_once("../../config/db.php");
require_once("../../config/conection.php");

$sql = "SELECT CI_Cliente,
	Nombre_Cli,
    Apellido_Cli,
    Direccion,
    Correo,
    Telefono
FROM cliente
";
if (!($clientes = $con->query($sql))) {
    echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
}
$con->close();

//Variables para enviar a la plantilla son necesarias
$titulo = "Clientes";
$contenido = "client/index.php";
require_once('../../../public/views/plantilla.php');
