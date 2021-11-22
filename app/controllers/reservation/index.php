<?php
require_once '../../config/global_variable.php';
require_once '../../config/session.php';

require_once("../../config/db.php");
require_once("../../config/conection.php");
$sql = "SELECT r.Id_Reser,
        c.Nombre_Cli as nombre_cliente,
        c.Apellido_Cli as apellido_cliente,
        u.Nombre,
        a.Nombre_Art,
        a.Talla_Art,
        a.detalle,
        r.fecha_reser,
        r.cantidad,
        r.precio_unitario,
        r.total        
    FROM reserva r,
    cliente c, 
    usuario u, 
    articulo a
    where r.CI_Cliente = c.CI_Cliente
    and r.Id_Usuario = u.Id_Usuario
    and r.Id_Articulo = a.Id_Articulo
";

$sql_clientes = "Select * from cliente";
$sql_articulo = "Select * from articulo";

if (!($reservas = $con->query($sql)) ) {
    echo "Falló SELECT: (" . $con->error . ") " . $con->error;
    die();
}
$con->close();
$con = connect();
if (!($clientes = $con->query($sql_clientes))) {
    echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
}
$con->close();
$con = connect();
if (!($productos = $con->query($sql_articulo))) {
    echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
}
$con->close();
//Variables para enviar a la plantilla son necesarias
$titulo = "Reservas";
$contenido = "reservation/index.php";
require_once('../../../public/views/plantilla.php');
