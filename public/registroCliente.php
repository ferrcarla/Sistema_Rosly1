<?php
  include "../lib/config.php";
  include "../lib/sesion.php";
  include "../lib/Database.php";
?>
<?php
  $db = new Database();
  if(isset($_POST['submit'])){
  	$ci_cliente = mysqli_real_escape_string($db->link, $_POST['ci_cliente']);
  	$nombre=mysqli_real_escape_string($db->link, $_POST['nombre']);
  	$apellido=mysqli_real_escape_string($db->link, $_POST['apellido']);
  	$direccion =mysqli_real_escape_string($db->link, $_POST['direccion']);
  	$correo= mysqli_real_escape_string($db->link, $_POST['correo']);
  	$telefono=mysqli_real_escape_string($db->link, $_POST['telefono']);
   
  	if($ci_cliente == '' || $nombre == '' || $apellido == '' || $direccion == '' || $correo == '' || $telefono == ''){
  		$error = "Los campos no deben estar vacios!!!";
  	}else{
      $query = "INSERT INTO cliente(CI_Cliente, Nombre_Cli, Apellido_Cli, Direccion, Correo, Telefono) values ('$ci_cliente','$nombre','$apellido','$direccion','$correo','$telefono')";
      $create =$db->registerCli($query);
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
  <link rel="stylesheet" href="../css/principal2.css">
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
          <li class="nav-item"><a class="nav-link text-white" href="publicidad.php">Publicidad </a></li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tienda</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="publicidad.php">Catalogo existentes </a></li>
              <li><a class="dropdown-item" href="publicidad.php">Prendas</a></li>
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
            <li class="nav-item"><a class="list-group-item list-group-item-action font-wight-bold bg-light text-warning" href="listaPersonal.php">MOSTRAR USUARIO</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="registroCliente.php">MOSTRAR PRENDAS</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="categoria.php">CATEGORIA</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">REGISTRO CLIENTE</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR ACTIVOS DE LA EMPRESA</a></li>
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
                            <h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s"> REGISTRO DEL CLIENTE </h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">.</p>
                            <div class="header-date pull-left font-size:12px;">
                            <strong><?php echo date("F j, Y, G:i:s T Y"); ;?></strong>
                            </div>
                        </div>
                    </div>
                <hr class="featurette-divider bg-danger">
      </article>
      <article class="row">
       <div class="col-xl-5 col-lg-5 col-md-5">
      <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Registro del Cliente</span>
            </strong>
            <hr class="featurette-divider bg-success">
          </div>
          <form class="login" action="registroCliente.php" method="POST" >
            <?php
             if(isset($error)){
              echo "<center><div class='alert alert-danger'><span>".$error."</span></div></center>";
             }
            ?>
             <?php 
            error_reporting(E_ALL ^ E_NOTICE);
            if ($_GET["error"]=="si") {
              echo  '<div class="alert alert-danger" role="alert"><center><strong>Ops!-Verifica tus datos.</strong></center></div>';
            }
            else{echo "";}
            ?>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Introduzca su cedula" name="ci_cliente" id="ci_cliente">
            </div><br>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir el nombre " name="nombre" id="nombre">
            </div><br>            
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir su apellido" name="apellido" id="apellido">
            </div><br>
             <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir Direccion actual" name="direccion" id="direccion">
            </div>
            <br>
             <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir su celular" name="telefono" id="telefono">
            </div>
            <br>
            <div class="form-group">
              <input type="text" name="correo" id="correo" class="form-control" placeholder="introduzca su Correo">
            </div><br>
            <div class="form-group">
              <center>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Registrar</button>
                <a href="registrarUsuario.php" class="btn btn-success">Limpiar</a>
                <a href="principal.php" class="btn btn-danger">Cancelar</a>
              </center>
            </div>
          </form>
        </div>
      </div>      
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6">
      <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Lista del Cliente</span>
            </strong>
            <hr class="featurette-divider bg-success">
          </div>
          <div class="col-sm-6">
              <?php
              $db = new Database();
              $query = "SELECT * FROM cliente";
              $read = $db->select($query);
              if(isset($_GET['msg'])){
              echo "<div class='alert alert-success'><span>".$_GET['msg']."</span></div>";
              }
              ?>
          </div>
          <div class="col-sm-6">
            <table id="tabla_dinamica" class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">CI_CLIENTE</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">DIRECCION</th>
                <th scope="col">CORREO</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($read as $row) {?>
                <tr>
                  <td><?php echo $row['CI_Cliente']; ?></td>
                  <td><?php echo $row['Nombre_Cli']; ?></td>
                  <td><?php echo $row['Apellido_Cli']; ?></td>
                  <td><?php echo $row['DIreccion']; ?></td>
                  <td><?php echo $row['Correo']; ?></td>
                  <td><?php echo $row['Telefono']; ?></td>
                  <td><a href="edit_cli.php?ci_cliente=<?php echo urlencode($row['CI_Cliente']); ?>" class="btn btn-primary btn-sm">Editar</a></td>
                </tr>
              <?php }  ?>
            </tbody>
          </table>
          </div>
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