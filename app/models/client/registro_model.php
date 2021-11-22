<?php
    require_once("../../config/db.php");
    require_once("../../config/conection.php");

    //echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
    // definiendo variables
    $nombre   = trim($_POST["nombre"]);
	$apellido   = trim($_POST["apellido"]);
    $ci  = trim($_POST["ci"]);    
    $telefono  = trim($_POST["telefono"]);
    $correo = trim($_POST["correo"]);
    $direccion = trim($_POST["direccion"]);
          
	// insercion de datos a la tabla USUARIO 
	$sqluser="INSERT INTO cliente(CI_Cliente, Nombre_Cli, Apellido_Cli, Direccion, Correo, Telefono) VALUES({$ci}, '{$nombre}', '{$apellido}', '{$direccion}', '{$correo}', '{$telefono}'  )";
	if (!$con->query($sqluser)) 
	{
		echo "Falló la insercion:  cliente(" . $con->errno . ") " . $con->error;		
	}else{
        echo 1;
    }
	
	$con->close();	