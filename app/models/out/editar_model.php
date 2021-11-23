<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conection.php");
	require_once '../../config/session.php';
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$producto_id   = trim($_POST["productos_edit"]);
	$cliente_id   = trim($_POST["clientes_edit"]);
	$cantidad   = trim($_POST["cantidad_edit"]);
    
    $id = $_POST["id"];
	
	$sql = "UPDATE salida set 
	CI_Cliente='{$cliente_id}', 
	Cantidad={$cantidad},
	Id_Articulo={$producto_id}
	where Id_Salida={$id}";
    
	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else{
		$con->close();		
		echo 1;
	}
	
	
?>