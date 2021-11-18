<?php
include "../lib/config.php";
include "../lib/dataBase.php";
?>
<?php
$db =  new Database();
if(isset($_POST['submit'])){
	

	
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
	<title>CATEGORIA </title>
  <link rel="stylesheet" type="text/css" href="../datatable/cssTabla/da">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/LineIcons.2.0.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/stile.css">
  <link rel="stylesheet" href="../css/principal2.css">
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

					<li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="principal.php">Home</a></li>
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
				
			</div>
		</section>
	</nav>

    <!----------- END NAV BAR.------ -->
<section class="container-fluid">
	<div class="row">
		<aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
			<div class="list-group">
				<ul class="nav flex-column">
						<!--colocar logo de la empresa-->
					<center class="mb-4 mt-2"><li class="nav-item justify-content-center"><a href=""><img src="../img/logos.png" alt="" width="100"></a></li></center>
					<li class="nav-item"><a class="list-group-item list-group-item-action" href="principal.php"><span data-feather="file"></span>IR A INICIO</a></li>
					<li class="nav-item"><a class="list-group-item list-group-item-action" href="listaUsuario.php?msg=<?php echo urlencode($user); ?>">MOSTRAR USUARIOS</a></li>
					<li class="nav-item"><a class="list-group-item list-group-item-action" href="registrarUsuario.php">REGISTRAR USUARIOS</a></li>
					<li class="nav-item"><a class="list-group-item list-group-item-action" href="registroCliente.php">REGISTRO CLIENTES </a></li>
					<li class="nav-item"><a class="list-group-item list-group-item-action" href="articulo.php">REGISTRO DE PRENDAS</a></li>
					<li class="nav-item"><a class="list-group-item list-group-item-action" href="inventario.php">INVENTARIO</a></li>
					<li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php">SALIR DEL SISTEMA</a></li>
				</ul>
			</div>
		</aside>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-10">	
	<hr class="featurette-divider bg-danger">
	<article class="container mb-3 bg-light">
	<section id="caracteristica" class="service-section gray-bg pt-1 pb-70"> 
	<div class="container">	
	<article class="row">
		<div class="col-xl-5 col-lg-6 col-md-8 mx-auto">
			 <div class="section-title text-center mb-20">
                <span class="wow fadeInDown text-danger" data-wow-delay=".2s"></span>
                <h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s"> PEDIDOS </h2>
                <p class="wow fadeInUp" data-wow-delay=".6s">.</p>
                <div class="header-date pull-left font-size:12px;">
                <strong><?php echo date("F j, Y, G:i:s T Y"); ;?></strong>
               </div>
            </div>
		</div>
		<hr class="featurette-divider bg-danger">
	</article>
	<article class="row">
		<div class="col-xl-6 col-lg-6 col-md-6">
		<div class="col-md-5">
		<div class="panel panel-default">
		<div class="panel-heading text-center">
		    <strong>
		    <span class="glyphicon glyphicon-th"></span>
		    <span>Agregar Pedidos</span>
			</strong>
			<hr class="featurette-divider bg-success">
		</div>	
		<div class="panel-body">
			<form action="agreCat.php" method="POST">
				<?php
				if(isset($error)){
					echo "<center><div class='alert alert-danger'> <span>".$error."</span></div></center>";
				}
				?>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Intruducir CI" name="Ci_Cliente" id="Ci_Cliente">
				</div><br>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="nit" name="nit" id="nit">
				</div><br>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="articulo" name="id_art" id="id_art">
				</div><br>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="talla" name="talla" id="talla">
				</div><br>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="color" name="color" id="color">
				</div><br>
				<div class="form-group">
					<input type="number" class="form-control" placeholder="cantidad" name="cantidad" id="cantidad">
				</div><br>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="precio_total" name="precio" id="precio">
				</div><br>
				
			</form>
		</div>
		</div>		
		</div>	
	    </div>
	    <div class="col-xl-6 col-lg-6 col-md-6">
	    	<div class="col-sm-12">
		    <?php
		    $db =  new Database();
		    $query = "SELECT * FROM pedidos";
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
                      <span>Lista de Pedidos</span>
                    </strong>
                <hr class="featurette-divider bg-success">
                </div>
                <div class="panel-body">
	                <div class="col-sm-12">
                      <table id="tabla_dinamica" class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Id</th>
								<th scope="col">CI_CLIENTE</th>
								<th scope="col">ID_NIT</th>
								<th scope="col">ID_ARTICULO</th>
								<th scope="col">COLOR</th>
								<th scope="col">CANTIDAD</th>
								<th scope="col">PRECIO_TOTAL</th>
							</tr>
						 </thead>
						 <tbody>
							<?php foreach ($read as $row) {?>
								<tr>
								    <td><?php echo $row['Id_Pedido']; ?></td>
									<td><?php echo $row['CI_Cliente']; ?></td>
									<td><?php echo $row['Id_Articulo']; ?></td>
									<td><?php echo $row['Talla']; ?></td>
									<td><?php echo $row['Color']; ?></td>
									<td><?php echo $row['Cantidad']; ?></td>
									<td><?php echo $row['Precio_Total']; ?></td>
									<td><a href="updateCat.php?Id_Pedido=<?php echo urlencode($row['Id_Pedidos']); ?>" class="btn btn-primary btn-sm">Editar</a></td>
								</tr>
							<?php }  ?>
						</tbody>
		              </table>
                    </div>
                </div>
	        </div>
	    </div>
	</article>
	</div>
	</section>	
	</article>	
	</main>
    </div>
</section>
	<!------------PIE DE LA PAGINA--------------->	
	<!------------END PIE DE LA PAGINA----------->
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
</body>
</html> 