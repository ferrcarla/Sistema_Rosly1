<?php
	require_once '../../config/global_variable.php';
	require_once ("../../config/db.php");
	require_once ("../../config/conection.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
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
	$nombre   = trim($_POST["nombre_edit"]);
	$categoria   = trim($_POST["categoria_edit"]);
    $talla  = trim($_POST["talla_edit"]);    
    $color  = trim($_POST["color_edit"]);
    $descripcion = trim($_POST["descripcion_edit"]);
    $precio = trim($_POST["precio_edit"]);

    $id = $_POST["id_producto"];
	if ($archivo) {
        $sql = "UPDATE articulo 
			set Id_Categoria='{$categoria}', 
			Nombre_Art='{$nombre}', 
			Color_Art='{$Color_Art}', 
			Talla_Art='{$talla}', 
			detalle='{$descripcion}',
			foto= '{$archivo}',
			precio={$precio} 
		where Id_Articulo={$id}";
    }else{
	$sql = "UPDATE articulo 
			set Id_Categoria='{$categoria}', 
			Nombre_Art='{$nombre}', 
			Color_Art='{$Color_Art}', 
			Talla_Art='{$talla}', 
			detalle='{$descripcion}',
			precio={$precio} 
		where Id_Articulo={$id}";
    }

	if (!$con->query($sql)) {
		echo "Falló la edicion: (" . $con->errno . ") " . $con->error;
	}
	else{
		$con->close();		
		echo 1;
	}
	header("location:".CONTROLLER."product/");
	
?>