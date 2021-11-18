<?php 
	include "../lib/config.php";
	include "../lib/dataBase.php";
	include "../lib/sesion.php";
	$id = $_GET['Id_Articulo'];
	$db = new Database();
	$query = "select * from articulo where Id_Articulo=$id";
	$getData = $db->select($query)->fetch_assoc();

	if (isset($_POST['submit'])) {
		  $id_categ= mysqli_real_escape_string($db->link, $_POST['idcat']);
		  $nombre = mysqli_real_escape_string($db->link, $_POST['nombreP']);
		  $color=mysqli_real_escape_string($db->link, $_POST['colorP']);
		  $talla = mysqli_real_escape_string($db->link, $_POST['tallaP']);
		  $detalle= mysqli_real_escape_string($db->link, $_POST['detalleP']);
		  $foto =(isset($_FILES['foto']['name']))?$_FILES['foto']['name']:"";//agregar ubicacion de la imagen
		  $cantidad = mysqli_real_escape_string($db->link, $_POST['cantidadP']);
		  $precio = mysqli_real_escape_string($db->link, $_POST['precioP']);
		  $fechaP = mysqli_real_escape_string($db->link, $_POST['fechaP']);
		  if($id_categ == '' || $nombre == '' || $color == '' || $talla == '' || $detalle == '' || $foto == '' || $cantidad == '' || $precio == '' || $fechaP == ''){
		    $error = "Los campos no deben estar vacios!!!";
		  }else{
		      /*codigo para almacenar el tiempo que se guardo la imagen para que no exista duplicidad en nombre de archivo*/
		      $fecha = new DateTime();
		      $nomArchivo = ($foto!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"avatar.png";
		      $tmpfoto=$_FILES["foto"]["tmp_name"];
		      $query = "UPDATE articulo SET Id_Categoria = '$id_categ', 
		      								Nombre_Art = '$nombre',
		      								Color_Art = '$color',
		      								Talla_Art = '$talla',
		      								detalle = '$detalle',
		      								foto = '$nomArchivo',
		      								catidad = '$cantidad',
		      								precio = '$precio',
		      								fecha_creacion = '$fechaP'
		      								where Id_Articulo = '$id'";
		      								$update = $db->updateA($query,$user);

		    /*mover la imagen hcia la ruta especificada en este caso llevar la imagen a la carpeta img*/
		      if($tmpfoto !=""){
		        move_uploaded_file($tmpfoto, "../img/".$nomArchivo);
		      }
		  }

		}
		if (isset($_POST['delete'])) {
			$query = "delete from articulo where Id_Articulo = $id";
			$deleteData = $db->deleteA($query,$user);
		}
?>

  <!DOCTYPE html>
  <html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Sonia">
	<meta name="KEYWORDS" content="inicio con Bootstrap">
	<meta name="description" content="pagina mejorada de inicio con Bootstrap">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>updateA</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/icono.png">
</head>
<body>
  	<!----------- NAV BAR ---------- -->
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<section class="container-fluid">
			<a class="navbar-brand text-white" href="#">DPW-07 TURNO NOCHE</a>
			<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsador1" aria-controls="colapsador1" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="colapsador1">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
					<li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">Home</a></li>
					<li class="nav-item"><a class="nav-link text-white" href="#">Publicidad </a></li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Soporte</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Producto-1</a></li>
							<li><a class="dropdown-item" href="#">Producto-2</a></li>
							<li><a class="dropdown-item" href="#">Producto-3</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Otras areas</a></li>
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a></li>
				</ul>
			</div>
		</section>
	</nav>
	<!---end navbar----->
	<section class="container-fluid">
		<section class="row">
			<aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="list-group">
					<ul class="nav flex-column">
						<!--colocar logo de la empresa-->
						<center class="mb-4 mt-2"><li class="nav-item justify-content-center"><a href=""><img src="" alt="" width="100"></a></li></center>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="principal.php"><span data-feather="file"></span>IR A INICIO</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR USUARIOS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="registrar.php">REGISTRAR USUARIOS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR PRODUCTOS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR ESTADISTICAS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR ACTIVOS DE LA EMPRESA</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php">SALIR DEL SISTEMA</a></li>
					</ul>
				</div>
			</aside>
			<main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-md-4">
				<article class="container mt-1">
					<form action="articuloCrud.php?Id_Articulo=<?php echo $id; ?>" method="POST" class="col-lg-6">
						<?php if (isset($error)){
							echo "<center><div class='alert alert-danger'><span>".$error."</span></div></center>";
						} ?>

						<h2 class="display-6 text-danger fw-bold text-uppercase mb-5"><center>Actualizar Datos</center></h2>
						
						<select name="idcat" id="idcat" class="form-control mb-5 text-primary">
							<option value="<?php echo $getData['idcat'] ?>"selected><?php echo $getData['Id_Categoria'] ?></option>
			                <option value="1">Pantalones</option>
			                <option value="2">Abrigos</option>
			                <option value="3">Bleizer</option>
			                <option value="4">Pantalones</option>
			                <option value="5">Abrigos</option>
			                <option value="6">Bleizer</option>
			                <option value="7">Pantalones</option>
			                <option value="8">Abrigos</option>
						</select>
		                <div class="form-group mb-3">
		                  <input type="text" class="form-control" name="nombreP" id="nombreP" placeholder="ingrese el nombre de la prenda" value="<?php  echo $getData['Nombre_Art'] ?>"></div>
		                <div class="form-group mb-3">
		                  <input type="text" class="form-control" name="colorP" id="colorP" placeholder="color" value="<?php  echo $getData['Color_Art'] ?>">
		                </div>
		                <div class="form-group mb-3">
		                  <input type="text" class="form-control" name="tallaP" id="tallaP" placeholder="talla" value="<?php  echo $getData['Talla_Art'] ?>">
		                </div>
		                <div class="form-group mb-3">
		                  <input type="text" class="form-control" name="detalleP" id="detalleP" placeholder="detalle de la prenda" value="<?php  echo $getData['detalle'] ?>">
		                </div>
		                <div class="form-group mb-3">
		                  <input type="number" class="form-control" name="cantidadP" id="cantidadP" placeholder="cantidad" value="<?php  echo $getData['catidad'] ?>">
		                </div>
		                <div class="form-group mb-3">
		                  <label class="imagen">imagen:(*) </label>
		                  <input type="file" accept="image/*" name="foto" id="foto" class="form-control" value="<?php  echo $getData['foto'] ?>">
		                 </div>
		                <div class="form-group mb-3">
		                  <input type="text" class="form-control" name="precioP" id="precioP" placeholder="precio unitario" value="<?php  echo $getData['precio'] ?>">
		                </div>
		                <div class="form-group mb-3">
		                  <input type="date" class="form-control" name="fechaP" id="fechaP" placeholder="fecha_creacion" value="<?php  echo $getData['fecha_creacion'] ?>">
		                </div>

						<div class="mb-3">
							<center>
								<button type="submit" name="submit" id="submit" class="btn btn-primary">Guardar</button>
								<button type="submit" name="delete" id="delete" value="Delete" class="btn btn-danger">Eliminar</button>
								<a href="articulo.php" class="btn btn-info">Cancelar</a>
							</center>
						</div>
					</form>
				</article>
			</main>
		</section>
	<!---------------PIE DE LA PAGINA-------------------->
	<hr>
	<footer class="blockquote-footer text-center">
		<address>
			<small class="font-weight-bold text-uppercase">&copy;todos los derechos reservados</small><br>
		</address>
	</footer>
	<!--------------END PIE DE LA PAGINA----------->

	</section>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/popper.min.js"></script>
  </body>
  </html>