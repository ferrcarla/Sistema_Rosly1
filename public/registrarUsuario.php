<?php
  include "../lib/config.php";
  include "../lib/dataBase.php";
?>
<?php
 $db = new Database();
 if(isset($_POST['submit'])){
 	$nombre = mysqli_real_escape_string($db->link, $_POST['nombre']);
 	$ci = mysqli_real_escape_string($db->link, $_POST['ci']);
 	$direccion = mysqli_real_escape_string($db->link, $_POST['direccion']);
 	$telefono = mysqli_real_escape_string($db->link, $_POST['telefono']);
 	$rol = mysqli_real_escape_string($db->link, $_POST['rol']);
 	$correo = mysqli_real_escape_string($db->link, $_POST['correo']);
 	$contra = mysqli_real_escape_string($db->link, $_POST['pass']);
 	if($nombre == '' || $ci == '' || $direccion == '' || $telefono == '' || $rol == '' || $correo == '' || $contra == ''){
  		$error = "Los campos no deben estar vacios !!!";
  	}else{
  		//encriptacion la contraseña//
  		$pass_cifrado = password_hash($contra, PASSWORD_DEFAULT);//encriptacion contrase;a//
  		$query = "INSERT INTO usuario(id_rol,Nombre, CI, Direccion, Telefono, User, Password) values ('$rol','$nombre','$ci','$direccion','$telefono','$correo','$pass_cifrado')";
  		$create = mysqli_insert_id($db->registerUser($query));
  	}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="img/avatar.png">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/update.css">
	<title>Registro Usuario</title>
  <link rel="stylesheet" type="text/css" href="../datatable/cssTabla/da">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/LineIcons.2.0.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/stile.css">
  <link rel="stylesheet" href="../css/principal1.css">
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
            <li class="nav-item"><a class="list-group-item list-group-item-action font-wight-bold bg-light text-warning" href="listaUsuario.php">MOSTRAR USUARIO</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="registrarUsuario.php">REGISTRAR USUARIOS</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="inventario.php">INVENTARIO</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="cliente.php">LISTA DE CLIENTES</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="articulo.php">LISTA DE PRENDAS</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action font-wight-bold" href="../logout.php">SALIR</a></li>
          </ul>
        </div>
      </nav>
      <!--================END SIDEBAR IZQUIERDO=========-->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <hr class="featurette-divider bg-danger">
        <article class="container p-2 bg-light">
          <!--======DESARROLLO DE LA TABLA DINAMICA======-->

           <div class="container">
             <article class="row">
                    <div class="col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="section-title text-center mb-20">
                            <span class="wow fadeInDown text-danger" data-wow-delay=".2s"></span>
                            <h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s"> REGISTRO DE USUARIO </h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">.</p>
                            <div class="header-date pull-left font-size:12px;">
                            <strong><?php echo date("F j, Y, G:i:s T Y"); ;?></strong>
                            </div>
                        </div>
                    </div>
                <hr class="featurette-divider bg-danger">
      </article>
      <article class="row">
       <div class="col-xl-12 col-lg-12 col-md-12">
      <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Agregar Usuario</span>
            </strong>
            <hr class="featurette-divider bg-success">
          </div>
          <form class="login" action="registrarUsuario.php" method="POST" >
            <?php
             if(isset($error)){
              echo "<center><div class='alert alert-danger'><span>".$error."</span></div></center>";
             }
            ?>
            
            <div class="form-group">
              <select name="rol" id="rol" class="form-control" required="">
                <option>-Seleccionar el rol del nuevo usuario</option>
                <option value="1">Administracion</option>
                <option value="2">Colaborador</option>
                <option value="3">Cliente</option>
              </select>
            </div><br>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir el nombre completo" name="nombre" id="nombre">
            </div><br>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Introduzca su cedula" name="ci" id="ci">
            </div><br>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir su direccio actual" name="direccion" id="direccion">
            </div><br>
             <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir su Celular actual" name="telefono" id="telefono">
            </div>
            <br>
            <div class="form-group">
              <input type="text" name="correo" id="correo" class="form-control" placeholder="introduzca su Correo">
            </div><br>
            <div class="form-group">
              <input type="password" name="pass" id="pass" class="form-control" placeholder="introduzca su clave ">
            </div><br>
            <div class="form-group">
              <center>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Registrar</button>
                <a href="registrarUsuario.php" class="btn btn-success">Limpiar</a>
                <a href="listaUsuario.php" class="btn btn-info">Ver lista</a>
                <a href="principal.php" class="btn btn-danger">Cancelar</a>
              </center>
            </div>
          </form>
        </div>
      </div>      
    </div>
          <!--====END OF DESARROLLO DE LA TABLA DINAMICA ====-->
        </article>
        <!--=====END INFORMACION PRINCIPAL=====-->
      </main>
      
    <hr>
    <footer class="blockquote-footer text-center">
    <address>
      <small class="font-weight-bold text-uppercase">&copy;todos los derechos reservados</small><br>
      <p class="lead font-weight-bold">Sonia Marlene Tinta Chambi <br> LA PAZ - BOLIVIA <br> 2021</p>
    </address>
  </footer>
  </div>
   <script src="../js/jquery-3.5.1.min.js"></script>
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/popper.min.js"></script>
   <!-- DataTables -->
   <script type="text/javascript" src="../datatable/jsTabla/datatables.js"></script>
   <script>
    $(document).ready(function(){
      $('#tabla_dinamica').DataTable();
    });
   </script>
</body>
</html>