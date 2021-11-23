<?php
	require_once ("../../config/db.php");
	require_once ("../../config/conection.php");

	$id=$_REQUEST['id_entrada'];	
	$sql="SELECT * FROM entrada
		where Id_Entrada = {$id}";
	if($result = $con->query($sql)){
		if($result->num_rows > 0){
			$jsondata['estado']="correcto";
			while ($row = $result->fetch_array() ) {
				$jsondata['entrada'] = $row;
			}
		}
	}else{
		$jsondata['estado']="Error en la consulta";
	}
    echo json_encode($jsondata);
    
    $con->close();
