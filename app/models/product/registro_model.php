<?php
    require_once("../../config/db.php");
    require_once("../../config/conection.php");
    print_r($_FILES);
    // echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
    echo "<pre>";print_r ($_REQUEST);echo "</pre>";

    if (!isset($_POST['imagen'])){
        $nombre_archivo =$_FILES['imagen']['name'];
        $tipo_archivo = $_FILES['imagen']['type'];
        $tamano_archivo = $_FILES['imagen']['size'];
        $archivo= $_FILES['imagen']['tmp_name'];
    } else{
        $nombre_archivo="";
    }

    if ($nombre_archivo!="")
    {
        //Limitar el tipo de archivo y el tamaño    
        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo  < 50000000))) 
        {
            echo "El tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos de 5 Mb máximo.</td></tr></table>";
        }
        else
        {
            $file = $_FILES['imagen']['name'];
            $res = explode(".", $nombre_archivo);
            $extension = $res[count($res)-1];
            $nombre= date("YmdHis")."." . $extension; //renombrarlo como nosotros queremos
            $dirtemp = "../../upload/publicidad/".$nombre."";//Directorio temporaral para subir el fichero
            echo "<pre>";print_r ($_POST);echo "</pre>";
            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                copy($_FILES['imagen']['tmp_name'], $dirtemp);

                unlink($dirtemp); //Borrar el fichero temporal
               }
            else
            {
                echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
            }

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