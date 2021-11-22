<?php
    require_once '../../config/global_variable.php';
    require_once("../../config/db.php");
    require_once("../../config/conection.php");
    print_r($_FILES);
    // echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
    echo "<pre>";print_r ($_REQUEST);echo "</pre>";

    $archivo = (isset($_FILES['imagen'])) ? $_FILES['imagen'] : null;
    if ($archivo) {
        $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $extension_correcta = ($extension == 'jpg' or $extension == 'jpeg' or $extension == 'gif' or $extension == 'png');
        if ($extension_correcta) {
            $nombre_nuevo = 'articulo_'.date("YmdHis") . "." . $extension; //renombrarlo como nosotros queremos
            $ruta_destino_archivo = "../../../upload/publicidad/{$nombre_nuevo}";
            $archivo_ok = move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo);
        }
    }
    
    // definiendo variables
    $nombre   = trim($_POST["nombre"]);
	$categoria   = trim($_POST["categoria"]);
    $talla  = trim($_POST["talla"]);    
    $color  = trim($_POST["color"]);
    $descripcion = trim($_POST["descripcion"]);
    $precio = trim($_POST["precio"]);
          
	// insercion de datos a la tabla USUARIO 
	$sql="INSERT INTO articulo(
        Id_Categoria, 
        Nombre_Art, 
        Color_Art, 
        Talla_Art, 
        detalle, 
        catidad,
        foto,
        precio
    ) VALUES(
        {$categoria}, 
        '{$nombre}', 
        '{$color}', 
        '{$talla}', 
        '{$descripcion}', 
        '0', 
        '{$nombre_nuevo}',
        {$precio}  
    )";
	if (!$con->query($sql)) 
	{
		echo "Falló la insercion:  cliente(" . $con->errno . ") " . $con->error;		
	}else{
        echo 1;
    }

    header("location:".CONTROLLER."product/");

	$con->close();	