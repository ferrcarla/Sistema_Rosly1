<?php
	require_once ("../../config/db.php");
	require_once ("../../config/conection.php");

	$id=$_REQUEST['id'];	
	$sql="SELECT * FROM salida
		where Id_Salida = {$id}";
	if($result = $con->query($sql)){
		if($result->num_rows > 0){
			$jsondata['estado']="correcto";
			while ($row = $result->fetch_array() ) {
				$jsondata['salida'] = $row;
			}
		}
	}else{
		$jsondata['estado']="Error en la consulta";
	}
    echo json_encode($jsondata);
    
    $con->close();
