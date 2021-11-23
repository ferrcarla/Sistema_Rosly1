<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conection.php");
	require_once '../../config/session.php';
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$producto_id   = trim($_POST["producto_edit"]);
	$cantidad   = trim($_POST["cantidad_edit"]);
    $user_id = $_SESSION['id_usuario'];

    $id = $_POST["id_entrada"];
	
	$sql = "UPDATE entrada set Id_Usuario='{$user_id}', 
	Cantidad='{$cantidad}', 
	Id_Articulo={$producto_id}
	where Id_Entrada={$id}";
    
	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else{
		$con->close();		
		echo 1;
	}
	
	
?>