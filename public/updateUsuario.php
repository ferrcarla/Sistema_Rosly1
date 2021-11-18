<?php
include "../lib/config.php";
include "../lib/dataBase.php";
include "../lib/sesion.php";
?>
<?php
$id = $_GET['id_usuario'];
$db = new Database();
$query = "SELECT * FROM usuario WHERE id_usuario=$id";
$getData= $db->select($query)->fetch_assoc();

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
   }
else{
  $pass_cifrado = password_hash($contra, PASSWORD_DEFAULT);//encriptacion contrase;a//
      $query = "INSERT INTO usuario(id_rol,Nombre, CI, Direccion, Telefono, User, Password) values ('$rol','$nombre','$ci','$direccion','$telefono','$correo','$pass_cifrado')";
      //=========ACTUALIZAR DATOS ===============//
      $query = "UPDATE usuario SET id_rol = '$rol',
                                   Nombre = '$nombre',
                                   CI = '$ci',
                                   Direccion = '$direccion',
                                   Telefono='$telefono',
                                   User = '$correo',
                                   Password= '$pass_cifrado'
                                   WHERE Id_Usuario = '$id'";
                                  
                            $update = $db->updateUser($query);
       }
}
//===========ELIMINAR DATOS=================//
if(isset($_POST['delete'])){
  $query = "DELETE FROM usuario WHERE Id_Usuario='$id'";
  $deleteData = $db->deleteUser($query);
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
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </div>
    </section>
  </nav>

<!-----------------END NAV BAR.----------->
  <!--==================END NAV BAR=========================-->
  <div class="container-fluid">
  <div class="row"> 
    <!--===============SIDEBAR IZQUIERDO==========-->
    <nav id="colapsador1" class="col-md-3 col-lg-2 d-md-block background-color: rgb(255, 153, 0); sidebar collapse">
        <div class="list-group">
          <ul class="nav flex-column">
            <center class="mb-4"><li class="nav-item justify-content-center"><a href=""><img src="../img/punto.jpg" alt="" width="100"></a></li></center>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="principal.php"><span data-feather="file"></span>IR A INICIO</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action font-wight-bold bg-light text-warning" href="listaPersonal.php">MOSTRAR PERSONAL</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="registro.php">REGISTRAR PERSONAL</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="listaUsuario.php">MOSTRR USUARIOS</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR ESTADISTICAS</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR ACTIVOS DE LA EMPRESA</a></li>
            <li class="nav-item"><a class="list-group-item list-group-item-action font-wight-bold" href="../logout.php">SALIR</a></li>
          </ul>
        </div>
      </nav>
      <!--================END SIDEBAR IZQUIERDO=========-->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <article class="container mt-1 bg-dark text-light">
          <!--======ARTICULO DE PRESENTACION ========-->
         <div class="row featurette">
            <div class="col-md-9">
              <h3 class="featurette-heading">Instituto Marcelo Quiroga Santa Cruz</h3>
              <h3 class="featurette-heading text-warning">Carrera:</h3>
              <p class="lead">Sistemas Informaticos</p>
              <h3 class="featurette-heading text-warning">Docente:</h3>
              <p class="lead">Mg. Sc. Marco Antonio Dorado Gomez</p>
            </div>
            <div class="col-lg-3 col-md-12">
              <img src="../img/avatar.png" alt="" class="img-fluit mt-3" width="180">
            </div>
          </div>
          <hr class="featurette-divider">
          <!--==END OF ARTICULO DE PRESENTACION INSTITUTO==-->
        </article>
        <article class="container p-2 bg-light">
          <!--======DESARROLLO DE LA TABLA DINAMICA======-->
           <section class="container">
      <div class="row my-5">
        <div class="col-sm-12">
          <form class="login" action="updateUsuario.php?Id_Usuario=<?php echo $id;?>" method="POST" >
            <?php
             if(isset($error)){
              echo "<center><div class='alert alert-danger'><span>".$error."</span></div></center>";
             }
            ?>
            <h2 class="display-5"><center>ACTUALIZAR DATOS</center></h2>
            <div class="form-group">
              <select name="rol" id="rol" class="form-control" required="">
                <option value="<?php echo $getData['id_rol'] ?>"><?php echo $getData['id_rol'] ?></option>
                <option>-Seleccionar el rol del nuevo usuario</option>
                <option value="Administrador">Administracion</option>
                <option value="Colaborador">Colaborador</option>
                <option value="Cliente">Cliente</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir el nombre completo" name="nombre" id="nombre" value="<?php echo $getData['Nombre'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Introduzca su cedula" name="ci" id="ci" value="<?php echo $getData['CI'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir su direccio actual" name="direccion" id="direccion" value="<?php echo $getData['Direccion'] ?>">
            </div>
             <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir su Celular actual" name="telefono" id="telefono" value="<?php echo $getData['Telefono'] ?>">
            </div>
            
            <div class="form-group">
              <input type="text" name="correo" id="correo" class="form-control" placeholder="introduzca su Correo" value="<?php echo $getData['User'] ?>">
            </div>
            <div class="form-group">
              <input type="password" name="pass" id="pass" class="form-control" placeholder="introduzca su clave " value="<?php echo $getData['Password'] ?>">
            </div>
            <div class="form-group">
              <center>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Guardar
                </button>
                <button type="submit" name="delete" id="delete" value="delete" class="btn btn-danger">Eliminar</button>
                <a href="listaUsuario.php" class="btn btn-info">ir a la lista</a>
                <a href="principal.php" class="btn btn-danger">Cancelar</a>
              </center>
            </div>
          </form>
        </div>
      </div>      
    </section>
          <!--====END OF DESARROLLO DE LA TABLA DINAMICA ====-->
        </article>
        <!--=====END INFORMACION PRINCIPAL=====-->
      </main>
      </div>
    <hr>
    <footer class="text-white text-center">
       <address>
          <small class="font-weight-bold text-uppercase">&copy; todos los derechos reservados</small><br>
          <p class="lead font-weight-bold">EDIFICIO HANDAL </p>
          <p class="lead font-weight-bold ">GALERIA EL PUNTO BOLIVANO </p>
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