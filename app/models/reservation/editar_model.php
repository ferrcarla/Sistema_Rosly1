<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conection.php");
	require_once '../../config/session.php';
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$id_cliente   = trim($_POST["clientes_edit"]);	
	$id_producto   = trim($_POST["productos_edit"]);
    $cantidad =trim($_POST["cantidad_edit"]);
    $user_id = $_SESSION['id_usuario'];
    
    $id = $_POST["id"];

	$sql_articulo = "select * from articulo where Id_Articulo={$id_producto}";
	if ($result = $con->query($sql_articulo)) {
		while ($row = $result->fetch_array()) {
			$mi_articulo = $row;
		}
		$precio_unitario = $mi_articulo['precio'];
		$total = $precio_unitario * $cantidad;
	} else {
		echo "Falló la insercion:  cliente(" . $con->errno . ") " . $con->error;
		die();
	}
	$con->close();
	$con = connect();
	
	$sql = "UPDATE reserva set 
		CI_Cliente='{$id_cliente}', 
		Id_Usuario='{$user_id}', 
		Id_Articulo={$id_producto},
		cantidad={$cantidad},
		Precio_Unitario={$precio_unitario},
		total={$total}
		where Id_Reser={$id}";
    
	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else{
		$con->close();		
		echo 1;
	}
	
	
?>