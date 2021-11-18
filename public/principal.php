<?php 
	include "../lib/config.php";
	include "../lib/dataBase.php";
	include "../lib/sesion.php";

$user = $_GET['msg'];

?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Rosly Alta Costura">
	<link rel="shortcut icon" type="image/x-icon" href="../img/icono.png">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/logos.png">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/LineIcons.2.0.css">
		<link rel="stylesheet" href="../css/animate.css">
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/stile.css">
		<title>PRINCIPAL</title>
</head>
<body>
	<div class="d-inline-flex my-2 my-lg-0">
        <h2 class="d-flex text-"><?php echo $user; ?></h2>
      </div> 
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
					<li class="nav-item"><a class="nav-link text-white" href="publicidad.php">Publicidad </a></li>
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

<!-----------------END NAV BAR.----------->

	<section class="container-fluid">
		<div class="row">
			<aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="list-group">
					<ul class="nav flex-column">
						<!--colocar logo de la empresa-->
						<center class="mb-4 mt-2"><li class="nav-item justify-content-center"><a href=""><img src="../img/logos.png" alt="" width="100"></a></li></center>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="principal.php?msg=<?php echo urlencode($user); ?>"><span data-feather="file"></span>IR A INICIO</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="listaUsuario.php?msg=<?php echo urlencode($user); ?>">LISTA DE USUARIOS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="registrarUsuario.php">REGISTRAR USUARIOS</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="agreCat.php">CATEGORIA </a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="inventario.php">INVENTARIO</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">REPORTES</a></li>
						<li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php">SALIR DEL SISTEMA</a></li>
					</ul>
				</div>
			</aside>
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
				<article class="container mt-1 bg-dark text-light">
          <!--======ARTICULO DE PRESENTACION ========-->
         <div class="row featurette">
            <div class="col-md-9">
              <h3 class="featurette-heading">BIENVENIDOS !!</h3>
              <h3 class="featurette-heading text-warning">NOMBRE:</h3>
              <p class="lead">Sonia Marlene</p>
              <h3 class="featurette-heading text-warning">ROL:</h3>
              <p class="lead">colaborador</p>
              <h3 class="featurette-heading text-warning">DIRECCION:</h3>
              <p class="lead">Alto Chijini, calle jose choquehuanca N°1690s</p>
            </div>
            <div class="col-lg-3 col-md-12">
              <img src="../img/avatar.png" alt="" class="img-fluit mt-3" width="180">
            </div>
          </div>
          <hr class="featurette-divider">
          <!--==END OF ARTICULO DE PRESENTACION INSTITUTO==-->
        </article>
						  <!--========================= CARACTERISTICAS ========================= -->
        <section1 id="caracteristica" class="service-section gray-bg pt-150 pb-70">
            <div class="container">
                <article class="row">
                    <div class="col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="section-title text-center mb-55">
                            <h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s">Actividades</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">.</p>
                        </div>
                    </div>
                </article>
                <article class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-service text-center mb-30 wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1.3s">
                            <div class="service-icon icon-gradient gradient-2 mb-30">
                                <i class="lni lni-ux"></i>
                            </div>
                             <a href="registrarUsuario.php" class="btn btn-light">Registro Usuarios</a>
                            </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-service text-center mb-30 wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1.3s">
                            <div class="service-icon icon-gradient gradient-3 mb-30">
                                <i class="lni lni-users"></i>
                            </div>
                            <a href="registroCliente.php" class="btn btn-light">Registro de Clientes</a>
                         
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-service text-center mb-30 wow fadeInUp" data-wow-delay=".8s" data-wow-duration="1.3s">
                            <div class="service-icon icon-gradient  gradient-4 mb-30">
                                <i class="lni lni-reload"></i>
                            </div>
                             <a href="articulo.php" class="btn btn-light">Registro de Prendas</a>
                            </div>
                    </div>
                </article>
            </div>
        </section1>
			</main> 
	</section>
	<!---------------PIE DE LA PAGINA-------------------->
	   <!-- ========================= FOOTER start ========================= -->
        <footer class="footer gray-bg">
              <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-links text-center">
                            <br>
                            <a href="../index.php" class="logo"><img src="../img/rosly.png" alt="" width="100"> </a>
                            <div class="footer-social-links">
                                <ul>
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram-original"></i></a></li>
                                </ul>
                            </div>
                            <nav class="footer-menu">
                                <ul>
                                    <li><a href="#inicio">Inicio</a></li>
                                    <li><a href="#caracteristica">Servicios</a></li>
                                    <li><a href="#procesos">Procesos</a></li>
                                    <li><a href="#team">Team</a></li>
                                    <li><a href="#contact">Contactos</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="copyright-area text-center">
                    <p class="mb-0">Diseñado y desarrollado por: <a href="#" rel="nofollow" target="_blank">@Sonia Marlene Tinta Chambi</a></p>
                </div>
            </div>
        </footer>
        <!-- ========================= FOOTER end ========================= -->
	<!--------------END PIE DE LA PAGINA----------->
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/jquery3.5.1.min.js"></script>
</body>
</html> 