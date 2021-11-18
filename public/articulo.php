<?php
  include "../lib/config.php";
  include "../lib/dataBase.php";
 
?>
<?php
$db = new Database();
if(isset($_POST['submit'])){
  $id_categ= mysqli_real_escape_string($db->link, $_POST['idcat']);
  $nombre = mysqli_real_escape_string($db->link, $_POST['nombreP']);
  $color=mysqli_real_escape_string($db->link, $_POST['colorP']);
  $talla = mysqli_real_escape_string($db->link, $_POST['tallaP']);
  $detalle= mysqli_real_escape_string($db->link, $_POST['detalleP']);
  $foto =(isset($_FILES['foto']['name']))?$_FILES['foto']['name']:"";//agregar ubicacion de la imagen
  $cantidad = mysqli_real_escape_string($db->link, $_POST['cantidadP']);
  $precio = mysqli_real_escape_string($db->link, $_POST['precioP']);
 
  if($id_categ == '' || $nombre == '' || $color == '' || $talla == '' || $detalle == '' || $foto == '' || $cantidad == '' || $precio == '' ){
    header('Location:articulo.php?msg='.urlencode('Debe llenar los campos'));
  }else{
      /*codigo para almacenar el tiempo que se guardo la imagen para que no exista duplicidad en nombre de archivo*/
      $fecha = new DateTime();
      $nomArchivo = ($foto!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"avatar.png";
      $tmpfoto=$_FILES["foto"]["tmp_name"];
      $query = "INSERT INTO articulo(Id_Categoria, Nombre_Art, Color_Art, Talla_Art, detalle, catidad, foto, precio)VALUES('$id_categ','$nombre', '$color','$talla','$detalle','$nomArchivo','$cantidad','$precio')";
    /*mover la imagen hcia la ruta especificada en este caso llevar la imagen a la carpeta img*/
      if($tmpfoto !=""){
        move_uploaded_file($tmpfoto, "../img/".$nomArchivo);
      }
      $create = mysqli_insert_id($db->registerA($query));
  }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="image/x-icon" href="img/avatar.png">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/update.css">
  <title>PRENDAS </title>
  <link rel="stylesheet" type="text/css" href="../datatable/cssTabla/da">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/LineIcons.2.0.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/stile.css">
  <link rel="stylesheet" href="../css/principal3.css">
  <!--=========Datatables============-->
  <link rel="stylesheet" type="text/css" href="../datatable/cssTabla/datatables.min.css">
</head>
<body>
<!----------- NAV BAR ---------- -->

	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<section class="container-fluid">
			<a class="navbar-brand text-white" href="#">ROSLY</a>
			<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsador1" aria-controls="colapsador1" aria-expanded="false" aria-label="Toggle navigation">

				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="colapsador1">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">

					<li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">Home</a></li>
					<li class="nav-item"><a class="nav-link text-white" href="#">Publicidad </a></li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tienda</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Catalogo existentes </a></li>
							<li><a class="dropdown-item" href="#">Prendas</a></li>
							<li><a class="dropdown-item" href="#">ofertas</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Otras areas</a></li>
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a></li>
				</ul>
				<form1 class="form-inline my-2 my-lg-0">
		        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
		      </form1>
			</div>
		</section>
	</nav>

<!-----------------END NAV BAR.----------->
  <!--==================END NAV BAR=========================-->
  <section class="container-fluid">
  <div class="row"> 
    <!--===============SIDEBAR IZQUIERDO==========-->
    <nav id="colapsador1" class="col-md-3 col-lg-2 d-md-block background-color: rgb(255, 153, 0); sidebar collapse">
        <div class="list-group">
          <ul class="nav flex-column">
            <center class="mb-4"><li class="nav-item justify-content-center"><a href=""><img src="../img/punto.jpg" alt="" width="100"></a></li></center>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="principal.php"><span data-feather="file"></span>IR A INICIO</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action font-wight-bold bg-light text-warning" href="listaUsario.php">MOSTRAR PERSONAL</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="registrarUsuario.php">REGISTRAR PERSONAL</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="registroCliente.php">MOSTRAR CLIENTES</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action font-wight-bold" href="../logout.php">SALIR</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="#"></a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="#"></a></li>
            
          </ul>
        </div>
      </nav>
      <!--================END SIDEBAR IZQUIERDO=========-->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-10">
          <hr class="featurette-divider bg-danger">
        <article class="container mb-3 bg-light">
          <!--======DESARROLLO DE LA TABLA DINAMICA======-->
         <section id="caracteristica" class="service-section gray-bg pt-1 pb-70"> 
           <div class="container">
             <article class="row">
                    <div class="col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="section-title text-center mb-20">
                            <span class="wow fadeInDown text-danger" data-wow-delay=".2s"></span>
                            <h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s"> REGISTRO DE PRENDAS </h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">.</p>
                            <div class="header-date pull-left font-size:12px;">
                            <strong><?php echo date("F j, Y, G:i:s T Y"); ;?></strong>
                            </div>
                        </div>
                    </div>
                <hr class="featurette-divider bg-danger">
      </article>
      <article class="row">
       <div class="col-xl-4 col-lg-4 col-md-4">
      <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Agregar prendas</span>
            </strong>
            <hr class="featurette-divider bg-success">
          </div>
          <div class="panel-body" class="col-xl-3 col-lg-3 col-md-3">

          <form class="bg-secondary p-3 m-1 rounded" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
              <?php 
            if (isset($_GET['msg'])) {
              echo "<center><div class='alert alert-danger'><span>".$_GET['msg']."</span></div></center>";
            }
           ?>
           <?php 
            error_reporting(E_ALL ^ E_NOTICE);
            if ($_GET["error"]=="si") {
              echo  '<div class="alert alert-danger" role="alert"><center><strong>Ops!-Verifica tus datos.</strong></center></div>';
            }
            else{echo "";}
            ?>
          
                <select class="form-control mt-3" name="idcat" id="idcat" >
                  <option value="">seleccionar categoria</option>
                  <option value="1">Pantalones</option>
                  <option value="2">Abrigos</option>
                  <option value="3">Bleizer</option>
                  <option value="4">Pantalones</option>
                  <option value="5">Abrigos</option>
                  <option value="6">Bleizer</option>
                  <option value="7">Pantalones</option>
                  <option value="8">Abrigos</option>

                </select><br>
                <div class="form-group mb-3">
                  <input type="text" class="form-control" name="nombreP" id="nombreP" placeholder="ingrese el nombre de la prenda" >
                </div>
                <div class="form-group mb-3">
                  <input type="text" class="form-control" name="colorP" id="colorP" placeholder="color" >
                </div>
                <div class="form-group mb-3">
                  <input type="text" class="form-control" name="tallaP" id="tallaP" placeholder="talla" >
                </div>
                <div class="form-group mb-3">
                  <input type="text" class="form-control" name="detalleP" id="detalleP" placeholder="detalle de la prenda" >
                </div>
                <div class="form-group mb-3">
                  <input type="text" class="form-control" name="cantidadP" id="cantidadP" placeholder="cantidad" >
                </div>
                <div class="form-group mb-3">
                  <input type="file" accept="image/*" name="foto" id="foto" class="form-control">
                 </div>
                <div class="form-group mb-3">
                  <input type="text" class="form-control" name="precioP" id="precioP" placeholder="precio unitario" >
                </div>                
            <div class="form-group">
              <center>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Registrar</button>
                <a href="articulo.php" class="btn btn-success">Limpiar</a>
                <a href="principal.php" class="btn btn-danger">Cancelar</a>
              </center>
            </div>
          </form>
        </div>


        </div>
      </div>      
    </div>
    <div class="col-xl-8 col-lg-8 col-md-8">
      <div class="col-sm-12">
        <?php
        $db =  new Database();
        $query = "SELECT * FROM articulo";
        $read  = $db ->select($query);
        if(isset($_GET['msg'])){
          echo "<div class='alert alert-success'<span>".$_GET['msg']."</span></div>";
        }
        ?>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Lista De Prendas</span>
            </strong>
          <hr class="featurette-divider bg-success">
          </div>
          <div class="panel-body">
            <div class="col-sm-12 m-5">
              <table id="tabla_dinamica" class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Cat</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Color</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($read as $row) {?>
                    <tr>
                      <td><?php echo $row['Id_Articulo'];?></td>
                      <td><?php echo $row['Id_Categoria'];?></td>
                      <td><?php echo $row['Nombre_Art'];?></td>
                      <td><?php echo $row['Color_Art'];?></td>
                      <td><?php echo $row['Talla_Art'];?></td>
                      <td><?php echo $row['detalle'];?></td>
                      <td><?php echo $row['catidad'];?></td>
                      <td><?php echo $row['precio'];?></td>
                      <td><img class="img-thumbnail" width="100px" src="../img/<?php echo $row['foto']; ?>"></td>
                      <td><a href="articuloCrud.php?Id_Articulo=<?php echo urlencode($row['Id_Articulo']); ?>" class="btn btn-primary btn-sm">Editar</a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
          <!--====END OF DESARROLLO DE LA TABLA DINAMICA ====-->
        </article>
      </div>
    </section>
  </article>
        <!--=====END INFORMACION PRINCIPAL=====-->
      </main>
    </div>
  </section>
    <hr>
    <footer class="blockquote-footer text-center">
    <address>
      <small class="font-weight-bold text-uppercase">&copy;todos los derechos reservados</small><br>
      <p class="lead font-weight-bold">Sonia Marlene Tinta Chambi <br> LA PAZ - BOLIVIA <br> 2021</p>
    </address>
  </footer>

  <script type="../js/bootstrap.bundle.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="datatable/jsTabla/datatables.js"></script>
   <script type="text/javascript" src="../datatable/jsTabla/datatables.js"></script>
   <script src="../js/bootstrap.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="datatable/jsTabla/datatables.js"></script>
   <script type="text/javascript" src="../datatable/jsTabla/datatables.js"></script>
   <script>
    $(document).ready(function(){
      $('#tabla_dinamica').DataTable();
    });
   </script>

</body>
</html>