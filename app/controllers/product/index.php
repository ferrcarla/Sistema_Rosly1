<?php
require_once '../../config/global_variable.php';
require_once '../../config/session.php';

require_once("../../config/db.php");
require_once("../../config/conection.php");
$sql = "SELECT a.Id_Articulo,
        c.Nombre,
        a.Nombre_Art,
        a.Color_Art,
        a.Talla_Art,
        a.detalle,
        a.catidad,
        a.foto,
        a.precio,
        a.fecha_creacion    
    FROM articulo a, categoria c
    where a.Id_Categoria = c.Id_Categoria
";

$sql_categorias = "Select * from categoria";

if (!($productos = $con->query($sql)) ) {
    echo "Falló SELECT: (" . $con->error . ") " . $con->error;
    die();
}
$con->close();
$con = connect();
if (!($categorias = $con->query($sql_categorias))) {
    echo "Falló SELECT: (" . $con->errno . ") " . $con->error;
}
$con->close();
//Variables para enviar a la plantilla son necesarias
$titulo = "Productos";
$contenido = "product/index.php";
require_once('../../../public/views/plantilla.php');
