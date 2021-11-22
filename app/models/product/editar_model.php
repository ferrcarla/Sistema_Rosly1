<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conection.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$nombre = trim($_POST["nombre_edit"]);
	$apellido = trim($_POST["apellido_edit"]);
    $ci  = trim($_POST["ci_edit"]);    
    $telefono  = trim($_POST["telefono_edit"]);
    $correo = trim($_POST["correo_edit"]);
    $direccion = trim($_POST["direccion_edit"]);

    $id = $_POST["id_cliente_before"];
	if ($id == $ci) {
        $sql = "UPDATE cliente set Nombre_Cli='{$nombre}', Apellido_Cli='{$apellido}', Direccion='{$direccion}', Correo='{$correo}', Telefono='{$telefono}' where CI_Cliente={$id}";
    }else{
        $sql = "UPDATE cliente set CI_Cliente='{$ci}', Nombre_Cli='{$nombre}', Apellido_Cli='{$apellido}', Direccion='{$direccion}', Correo='{$correo}', Telefono='{$telefono}' where CI_Cliente={$id}";
    }

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else{
		$con->close();		
		echo 1;
	}
	
	
?>