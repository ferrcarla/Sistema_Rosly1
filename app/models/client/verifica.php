<?php
    require_once("../../config/db.php");
    require_once("../../config/conection.php");

	//verificando que se debe comparar	
    $tabla="cliente";
    $columna="CI_Cliente";
    $ci=$_REQUEST['ci'];

    if ($_REQUEST['type'] == '1') {
        $ci_original = $_REQUEST['ci_before'];
        $sql="SELECT * 
            FROM cliente 
            WHERE CI_Cliente = '{$ci}'
            and CI_Cliente <> '{$ci_original}'";
    } else {
        $sql="SELECT * 
            FROM cliente 
            WHERE CI_Cliente = '{$ci}' ";
    }
    if($resultado=$con->query($sql)){
        $nrodefilas=$resultado->num_rows;
        if($nrodefilas == 0)
            echo "true";
        else
            echo "false";
    }
	
