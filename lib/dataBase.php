<?php 
	class DataBase{
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $dbname = DB_NAME;

		public $link;
		public $error;

		public function __construct(){
			$this->connectDB();
		}

		private function connectDB(){
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if (!$this->link) {
				$this->error = "Conexion fallida".$this->link->connect_error;
				return false;
			}
		}
		public function select($query){
			$result = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($result->num_rows > 0) {
				return $result;
			}
			else{
				return false;
			}
		}
		public function signIn($query, $user){
			$sign_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($sign_row) {
				header("Location:../public/principal.php?msg=".urlencode('Datos Correctos - Bienvenidos !!!' . $user));
				exit();
			}else{
				die("Error:(".$this->link->errno.")".$this->link-error);
			}
		}
		public function registerUser($query){
			$sign_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($sign_row) {
				header("Location:../public/listaUsuario.php?msg=".urlencode('Datos Registrados correctamente!!'));
				exit();
			}else{
				die("Error:(".$this->link->errno.")".$this->link-error);
			}
		}
		public function registerA($query){
			$sign_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($sign_row) {
				header("Location:../public/articulo.php?msg1=".urlencode('Datos Registrados correctamente!!'));
				exit();
			}else{
				die("Error:(".$this->link->errno.")".$this->link-error);
			}
		}

		public function updateA($query){
			$update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($update_row) {
				header("Location:../public/articuloCrud.php?msg1=".urlencode('Los datos han sido actualizados correctamente'));
				exit();
			}else{
				die("Error:(".$this->link->errno.")".$this->link-error);
			}
		}
		public function deleteA($query){
			$delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($delete_row) {
				header("Location:../public/articulo.php?msg1=".urlencode('Los datos han sido eliminados correctamente'));
				exit();
			}else{
				die("Error:(".$this->link->errno.")".$this->link-error);
			}
		}
		public function updateUser($query){
			$update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($update_row) {
				header("Location:../public/listaUsuario.php?msg=".urlencode('Los datos han sido actualizados correctamente'));
				exit();
			}else{
				die("Error:(".$this->link->errno.")".$this->link-error);
			}
		}
		public function deleteUser($query){
			$delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($delete_row) {
				header("Location:../public/listaUsuario.php?msg1=".urlencode('Los datos han sido eliminados correctamente'));
				exit();
			}else{
				die("Error:(".$this->link->errno.")".$this->link-error);
			}
		}
		public function registerCli($query){
			$sign_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($sign_row) {
				header("Location:../public/listaUsuario.php?msg=".urlencode('Datos Registrados correctamente!!'));
				exit();
			}else{
				die("Error:(".$this->link->errno.")".$this->link-error);
			}
		}
		public function registerCateg($query){
			$sign_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($sign_row) {
				header("Location:../public/listaCat.php?msg=".urlencode('Categoría agregada exitosamente!!'));
				exit();
			}else{
				die("Error:(".$this->link->errno.")".$this->link-error);
			}
		}
		public function registerC($query){
			$sign_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if ($sign_row) {
				header("Location:../public/agreCat.php?msg=".urlencode('Datos Registrados correctamente!!'));
				exit();
			}else{
				die("Error:(".$this->link->errno.")".$this->link-error);
			}
		}
		/*--------------------------------------------------------------*/
 /* Function for Remove escapes special
 /* characters in a string for use in an SQL statement
 /*--------------------------------------------------------------*/
 public function escape($str){
   return $this->con->real_escape_string($str);
 }
	}

?>