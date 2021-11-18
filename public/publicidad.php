<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rosly Alta Costura</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="../img/logos.png">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/LineIcons.2.0.css">
		<link rel="stylesheet" href="../css/animate.css">
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/stile.css">
        <link rel="stylesheet" href="../css/publicidad.css">
    </head>
    <body>
        <!-- =========== header start ============== --><!-- =========== header start ============== -->
        <header class="header">
            <div class="navbar-area navbar navbar-expand-lg navbar-light bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 bg-dark">
                            <nav class="navbar navbar-expand-lg">
                                <a class="navbar-brand " href="index.php"><img src="../img/logos.png" alt="Logo" width="80"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul id="nav" class="navbar-nav ml-auto">
                                        <li class="nav-item"><a class="page-scroll active" href="#inicio">Inicio</a></li>
                                        <li class="nav-item"><a class="page-scroll" href="#caracteristica">Tienda</a></li>
                                        <li class="nav-item"><a class="page-scroll" href="#procesos">Mision y vision</a></li>
                                        <li class="nav-item"><a class="page-scroll" href="#subscribe">Inicio sesion</a></li>
                                      <form class="form-inline my-2 my-lg-0" action="publicidad.php">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                        
                                        <?php
                                               if(isset($_GET['msg'])){
                                               echo "<center><div class='alert alert-danger'><span>".$_GET['msg']."</span></div></center>";
                                                   }?>
                                      </form><br>
                                      <form1 class="form-inline my-2 my-lg-0">
                                           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                      </form1>

                                       
                                        <br><br><br>
                                        <?php
                                         $mysqli= new mysqli("localhost", "root", "", "rosly");
                                        if(isset($_GET['enviar'])){
                                            $busqueda = $_GET['busqueda'];
                                            $consulta = $mysqli->query("SELECT * FROM articulo WHERE Nombre_Art LIKE '%$busqueda%'");
                                            while ($row = $consulta->fetch_array()) {
                                                echo $row['Nombre_Art'].'<br>';
                                            
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div> <!-- navbar collapse -->
                            </nav> <!-- navbar -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- navbar area -->

        </header>
            <section class="container-fluid">
        <div class="row">
            <aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="list-group">
                    <ul class="nav flex-column">
                        <!--colocar logo de la empresa-->
                        <center class="mb-4 mt-2"><li class="nav-item justify-content-center"><a href=""><img src="../img/logos.png" alt="" width="100"></a></li></center>
                        <li class="nav-item"><a class="list-group-item list-group-item-action" href="principal.php?msg=<?php echo urlencode($user); ?>"><span data-feather="file"></span>IR A INICIO</a></li>
                        <li class="nav-item"><a class="list-group-item list-group-item-action" href="listaUsuarios.php?msg=<?php echo urlencode($user); ?>">MOSTRAR USUARIOS</a></li>
                        <li class="nav-item"><a class="list-group-item list-group-item-action" href="registrarUsuario.php">REGISTRAR USUARIOS</a></li>
                        <li class="nav-item"><a class="list-group-item list-group-item-action" href="categoria.php">CATEGORIA </a></li>
                        <li class="nav-item"><a class="list-group-item list-group-item-action" href="articulo.php">LISTA PRENDAS</a></li>
                        <li class="nav-item"><a class="list-group-item list-group-item-action" href="cliente.php">REGISTRO CLIENTE</a></li>
                        <li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php">SALIR DEL SISTEMA</a></li>
                    </ul>
                </div>
            </aside>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <article class="container mt-1 bg-light text-dark">
          <!--======ARTICULO DE PRESENTACION ========-->
         
          <hr class="featurette-divider">
          <!--==END OF ARTICULO DE PRESENTACION INSTITUTO==-->
          <!---DISE;O DE LA IMAGENES EN PUBLIICDAD -->
       <?php
       $mysqli= new mysqli("localhost", "root", "", "rosly");
       include '../lib/config.php';
       $reult=$mysqli->query("SELECT * FROM articulo") or die (mysqli_error());
       while ($f = mysqli_fetch_array($reult)) {
       ?>
       <div class="producto">
           <center>
              <img src="../img/<?php  echo $f['foto'];?>"><br>
               <span><?php echo $f['Nombre_Art']?></span>Cancelar</a><br>
                <a href="detalle.php?Id_Articulo = <?php echo $f['Id_Articulo'];?>">ver</a>
           </center>
       </div>
        <?php
         }
        ?>
       <!--END -->
        </article>
                
            </main> 
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
		<script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
		<script src="../js/count-up.min.js"></script>
		<script src="../js/wow.min.js"></script>
		<script src="../js/main.js"></script>
        <script src="../js/scripts.js"></script>
  </body>
</html>