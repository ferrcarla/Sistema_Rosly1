<?php
    require_once("../../config/db.php");
    require_once("../../config/conection.php");
    require_once '../../config/session.php';

    //echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
    // definiendo variables
    $id_cliente   = trim($_POST["clientes"]);
	$id_producto   = trim($_POST["productos"]);
	$id_producto   = trim($_POST["productos"]);
    $cantidad =trim($_POST["cantidad"]);
          
	// insercion de datos a la tabla USUARIO 
	$sql="INSERT INTO salida(
            CI_Cliente, 
            Cantidad, 
            Id_Articulo
        ) VALUES(
            {$id_cliente}, 
            '{$cantidad}', 
            '{$id_producto}'
        )
    ";
	if (!$con->query($sql)) 
	{
		echo "Falló la insercion:  cliente(" . $con->errno . ") " . $con->error;		
	}else{
        echo 1;
    }
	
	$con->close();	