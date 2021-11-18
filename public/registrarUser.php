<?php
  //include 'sesion.php'
  include "../lib/config.php";
  //include "../lib/sesion.php";
  include "../lib/Database.php";
?>
<?php
  $db = new Database();
  if(isset($_POST['submit'])){
  	$rol_i = mysqli_real_escape_string($db->link, $_POST['rol']);
    $nombre = mysqli_real_escape_string($db->link, $_POST['nombres']);
  	$ci = mysqli_real_escape_string($db->link, $_POST['ci']);
  	$dire = mysqli_real_escape_string($db->link, $_POST['direc']);
  	$telefon = mysqli_real_escape_string($db->link, $_POST['telefono']);
	$correo = mysqli_real_escape_string($db->link, $_POST['user']);
  	$contra = mysqli_real_escape_string($db->link, $_POST['pass']);
  	
  	if($rol_i == '' $nombre == '' || $ci == '' || $dire == '' || $telefon == '' || $correo == '' || $contra == ''){
  		$error = "Los campos no deben estar vacios !!!";
  	}else{
  		//encriptacion la contraseña//
  		$pass_cifrado = password_hash($contra, PASSWORD_DEFAULT);//encriptacion contrase;a//
  		$query = "INSERT INTO login(id_rol, Nombre, CI, Direccion, Telefono,User, Password) values ('$rol_i',$nombre','$ci','$dire','$telefon','$correo','$pass_cifrado')";
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
	<link rel="stylesheet" type="text/css" href="../css/estilos123.css">
	<title>Registro de Usuario</title>
</head>
<body>
  <section class="container">
  	<div class="row my-5">
  		<div class="col-sm-12">
  			<form class="login" action="registraUsuario.php" method="POST">
  				<?php
  				 if(isset($error)){
  				 	echo "<center><div class='alert alert-danger'> <span>".$error."</span></div></center>";
  				 }
  				?>
  				<h2><center>Registrar Usuario</center></h2>
  				 <select name="rol" id="rol" class="form-control">
                 	<option value=""> - Selecionar los roles del nuevo usuario - </option>
                 	<option value="1">Administrador</option>
                 	<option value="2">Colaborador</option>
                 	<option value="3">Invitado</option>
                 </select><br>
                 <input type="text" class="form-control" placeholder="Registrar Nombre" name="nombres" id="nombres">
                 <input type="text" class="form-control" placeholder="Registrar su cedula" name="ci" id="ci">
                 <input type="text" class="form-control" placeholder="Registrar ubicacion" name="direc" id="direc">
                 <input type="text" class="form-control" placeholder="Registrar celular" name="telefono" id="telefono">
                 <input type="text" class="form-control" placeholder="Registrar correo" name="user" id="user">
                 <input type="password" class="form-control" placeholder="Registrar contraseña" name="pass" id="pass">
                
                 <center>
                 	<button type="submit" name="submit" id="submit" class="btn btn-primary">Registrar</button>
                 	<a href="registraUsuario.php" class="btn btn-success">Limpiar</a>
                 	<a href="listaUsuario.php" class="btn btn-info">Ver lista</a>
                 	<a href="../index.php" class="btn btn-danger">Cancelar</a>
                 </center>

  			</form>
  		</div>
  	</div>
  </section>
  <footer><div class="jumbotrom text-center mb-0">
		<small class="lead">&copy; Todos los derechos reservados</small><p class="lead mb-0">Sonia Tinta Chambi</p><br>La Paz - Bolivia <br>Gestion 2020</div>
		
	</footer>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>