<?php
  require_once("app/config/db.php");
  require_once("app/config/conection.php");
  $sql = "SELECT a.Id_Articulo,
        c.Nombre,
        a.Nombre_Art,
        a.Color_Art,
        a.Talla_Art,
        a.detalle,
        a.catidad,
        a.foto,
        a.precio,
        a.fecha_creacion    
    FROM articulo a, categoria c
    where a.Id_Categoria = c.Id_Categoria
";

$sql_categorias = "Select * from categoria";

if (!($productos = $con->query($sql)) ) {
    echo "Falló SELECT: (" . $con->error . ") " . $con->error;
    die();
}
?>
<!DOCTYPE html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rosly Alta Costura</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="img/logos.png">
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/LineIcons.2.0.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/stile.css">
    </head>
    <body>
        
        <!-- =========== header start ============== -->
        <header class="header">
            <div class="navbar-area ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg bg-dark">
                                <a class="navbar-brand" href="index.php"><img src="img/logos.png" alt="Logo" width="80"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul id="nav" class="navbar-nav ml-auto">
                                        <li class="nav-item"><a class="page-scroll" href="#inicio">Inicio</a></li>
                                        <li class="nav-item"><a class="page-scroll active" href="#caracteristica">Tienda</a></li>
                                        <li class="nav-item"><a class="page-scroll" href="#procesos">Mision y vision</a></li>                                        
                                    </ul>
                                </div> <!-- navbar collapse -->
                            </nav> <!-- navbar -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- navbar area -->

        </header>
        <!-- ======== header end ================ -->
     

        <!--========================= ARTICULOS ========================= -->       
        <section id="caracteristica" class="service-section gray-bg pt-150 pb-70">
            <div class="container">
                <div class="row"> 
                    <?php foreach ($productos as $producto) : ?>
                        <div class="col-3">
                            <div class="card">
                                <img 
                                title="<?php echo $producto['Nombre_Art']?>"
                                alt="Titulo"
                                class="card-img-top"
                                src="upload/publicidad/<?php echo $producto['foto']?>">
                                <div class="card-body">
                                    <span> <?php echo $producto['Nombre_Art']?></span>
                                    <h5 class="card-Title"><?php echo number_format($producto['precio'],2) ?></h5>
                                    <p class="card-text"><?php echo $producto['detalle']?></p>
                                    <div class="col-md-12">
                                        <a class="btn btn-danger" href="AccionCarta.php?action=addToCart&id=<?php echo $producto["Id_Articulo"]; ?>">Agregar al carrito</a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>                    
                </div>
            </div>
        </section>
        <!-- ========================= FOOTER start ========================= -->
        <footer class="footer gray-bg">
              <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-links text-center">
                            <br>
                            <a href="index.php" class="logo"><img src="img/rosly.png" alt="" width="100"> </a>
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


        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top"><i class="lni lni-chevron-up"></i></a>

		<!-- ========================= JS here ========================= -->
		<script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/count-up.min.js"></script>
		<script src="js/wow.min.js"></script>
		<!-- <script src="js/main.js"></script> -->
        <!-- <script src="js/scripts.js"></script> -->
    </body>
</html>
