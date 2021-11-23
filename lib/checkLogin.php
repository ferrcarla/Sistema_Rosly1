<?php
include('config.php');
include('dataBase.php');

$db = new DataBase();

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']=='POST'){

	$user = mysqli_real_escape_string($db->link, $_POST['user']);
	$pass = mysqli_real_escape_string($db->link, $_POST['pass']);

	if(empty($user) || empty($pass)){
		header('Location:../index.php?msg='.urlencode('Debe llenar los campos'));
	}
	else{
		$query = "SELECT * FROM usuario Where User='$user'";
		$result = $db->select($query);
		if(mysqli_num_rows($result)){
			while ($row = mysqli_fetch_array($result)) {
				if ( password_verify($pass, $row["Password"]) ) {
					session_start();
					$_SESSION['user_sesion'] = $user;
					$_SESSION['pass_sesion'] = $pass;
					// poniendo en sesion el nombre del usuario
					$_SESSION['id_rol'] = $row["id_rol"];
					$_SESSION['nombre'] = $row["Nombre"];
					$_SESSION['ci'] = $row["CI"];
					$_SESSION['direcccion'] = $row["Direcccion"];
					$_SESSION['telefono'] = $row["Telefono"];
					$_SESSION['email'] = $row["User"];
					$_SESSION['id_usuario'] = $row["Id_Usuario"];

					$login = $db->signIn($query, $_SESSION['user_sesion']);
				} else {				
					header("Location: ../index.php?error=si");
				}
			}
		}
		else{
			header("Location:../index.php?error=si");
		}

	}
}
?>