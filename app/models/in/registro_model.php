<?php
    require_once("../../config/db.php");
    require_once("../../config/conection.php");
    require_once '../../config/session.php';

    //echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
    // definiendo variables
    $producto_id   = trim($_POST["producto_id"]);
	$cantidad   = trim($_POST["cantidad"]);
    $user_id = $_SESSION['id_usuario'];
          
	// insercion de datos a la tabla USUARIO 
	$sql="INSERT INTO entrada(
            Id_Usuario, 
            Cantidad, 
            Id_Articulo
        ) VALUES(
            {$user_id}, 
            '{$cantidad}', 
            '{$producto_id}'
        )
    ";
	if (!$con->query($sql)) 
	{
		echo "Falló la insercion:  cliente(" . $con->errno . ") " . $con->error;		
	}else{
        echo 1;
    }
	
	$con->close();	