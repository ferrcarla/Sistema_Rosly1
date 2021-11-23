<?php
    require_once("../../config/db.php");
    require_once("../../config/conection.php");
    require_once '../../config/session.php';

    //echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();    
    // definiendo variables
    $id_cliente   = trim($_POST["clientes"]);	
	$id_producto   = trim($_POST["productos"]);
    $cantidad =trim($_POST["cantidad"]);
    $user_id = $_SESSION['id_usuario'];

    $sql_articulo= "select * from articulo where Id_Articulo={$id_producto}";
    if ($result = $con->query($sql_articulo)) {
        while ($row = $result->fetch_array()) {
            $mi_articulo = $row;
        }
        $precio_unitario= $mi_articulo['precio'];
        $total = $precio_unitario*$cantidad;
    }else{
        echo "Falló la insercion:  cliente(" . $con->errno . ") " . $con->error;
        die();
    }
    $con->close();
    $con = connect();
	// insercion de datos a la tabla USUARIO 
	$sql="INSERT INTO reserva(
            CI_Cliente, 
            Id_Usuario, 
            Id_Articulo,
            cantidad,
            Precio_Unitario,
            total
        ) VALUES(
            {$id_cliente}, 
            {$user_id},
            '{$id_producto}',
            '{$cantidad}', 
            {$precio_unitario},
            {$total}
        )
    ";
	if (!$con->query($sql)) 
	{
		echo "Falló la insercion:  cliente(" . $con->errno . ") " . $con->error;		
	}else{
        echo 1;
    }
	
	$con->close();	