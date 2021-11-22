<?php
    require_once("../../config/db.php");
    require_once("../../config/conection.php");
    print_r($_FILES);
    // echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
    echo "<pre>";print_r ($_REQUEST);echo "</pre>";

    if (isset($_FILES['imagen'])) {
        $errors = array();
        $file_name = $_FILES['imagen']['name'];
        $file_size = $_FILES['imagen']['size'];
        $file_tmp = $_FILES['imagen']['tmp_name'];
        $file_type = $_FILES['imagen']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['imagen']['name'])));

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "images/" . $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }
    }

    die();
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