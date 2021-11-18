<?php 
	include "../lib/config.php";
	include "../lib/dataBase.php";
	include "../lib/sesion.php";
	//$user = $_GET['msg'];
 ?>
 <?php 
 	$db = new Database();
 	$query = "select * from usuario";
 	$read = $db->select($query);
  ?>
  <!DOCTYPE html>
  <html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Rosly Alta costura">
	<meta name="KEYWORDS" content="inicio con Bootstrap">
	<meta name="description" content="pagina mejorada de inicio con Bootstrap">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ListaUsuario</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/icono.png">
</head>
  <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<section class="container-fluid">
			<a class="navbar-brand text-white" href="#">ROSLY</a>
			<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsador1" aria-controls="colapsador1" aria-expanded="false" aria-label="Toggle navigation">

				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="colapsador1">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">

					<li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="principal.php">Inicio</a></li>
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
				<form class="form-inline my-2 my-lg-0">
		        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
			</div>
		</section>
	</nav>

  <!--==================END NAV BAR=========================-->


	<section class="container-fluid">
		<section class="row">
			<aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="list-group">
					<ul class="nav flex-column">
						<!--colocar logo de la empresa-->
						<center class="mb-4 mt-2"><li class="nav-item justify-content-center"><a href=""><img src="../img/fedebamfolk.jpg" alt="" width="100"></a></li></center>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="principal.php?msg=<?php echo urlencode($user); ?>"><span data-feather="file"></span>PANEL DE CONTROL</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="listaUsuario.php">MOSTRAR USUARIOS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="registrarUsuario.php">REGISTRAR USUARIOS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="articulo.php">MOSTRAR PRENDAS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="cliente.php">REGSTRO DE CLIENTES</a></li>
						
						<li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php">SALIR DEL SISTEMA</a></li>
					</ul>
				</div>
			</aside>
			<main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-md-4">
				<article class="container mt-1">
					<?php 
						if (isset($_GET['msg1'])) {
							echo "<div class='alert alert-success fw-bold fs-5 text-end'><span><center>".$_GET['msg1']."</center></span></div>";
						}
					 ?>

					<h3 class="display-4 text-uppercase text-center text-success mb-3">Lista de usuarios</h3>
					<table id="tabla_dinamica" class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th scope="col">id_unico</th>
								<th scope="col">Cargo</th>
								<th scope="col">Nombre</th>
								<th scope="col">Ci</th>
								<th scope="col">Direccion</th>
								<th scope="col">Telefono</th>
								<th scope="col">Correo</th>
								<th scope="col">Fecha_Creacion</th>
								<th scope="col">Accion</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($read as $row) {?>
								<tr>
									<td><?php echo $row['Id_Usuario']; ?></td>
									<td><?php echo $row['id_rol']; ?></td>
									<td><?php echo $row['Nombre']; ?></td>
									<td><?php echo $row['CI']; ?></td>
									<td><?php echo $row['Direccion']; ?></td>
									<td><?php echo $row['Telefono']; ?></td>
									<td><?php echo $row['User']; ?></td>							
									<td><?php echo $row['fecha_creacion']; ?></td>
									<td><a href="updateUsuario.php?id_usuario=<?php echo urlencode($row['Id_Usuario']); ?>" class="btn btn-primary btn-sm">Editar</a></td>
								</tr>
							<?php }  ?>
						</tbody>
					</table>
				</article>
			</main>
		</section>

	<!---------------PIE DE LA PAGINA-------------------->
	<hr>
	<footer class="blockquote-footer text-center">
		<address>
			<small class="font-weight-bold text-uppercase">&copy;todos los derechos reservados</small><br>
			<p class="lead font-weight-bold">Sonia Marlene Tinta Chambi <br> LA PAZ - BOLIVIA <br> 2021</p>
		</address>
	</footer>
	</section>
	<!--------------END PIE DE LA PAGINA----------->
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/popper.min.js"></script>
  </body>
  </html>