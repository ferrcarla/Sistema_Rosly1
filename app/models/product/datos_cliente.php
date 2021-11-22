<?php
	require_once ("../../config/db.php");
	require_once ("../../config/conection.php");
	$id=$_REQUEST['id_cliente'];	
	$sql="SELECT * FROM cliente
		where CI_Cliente = {$id}";
	if($result = $con->query($sql)){
		if($result->num_rows > 0){
			$jsondata['estado']="correcto";
			while ($row = $result->fetch_array() ) {
				$jsondata['cliente'] = $row;
			}
		}
	}else{
		$jsondata['estado']="Error en la consulta";
	}
    echo json_encode($jsondata);
    
    $con->close();
