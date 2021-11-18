<?php
  include "lib/config.php";
  //include "lib/sesion.php";
  include "lib/Database.php";
?>
<?php
  $db = new Database();
  if(isset($_POST['submit'])){
    $nombrep = mysqli_real_escape_string($db->link, $_POST['nombrep']);
    $idcat=mysqli_real_escape_string($db->link, $_POST['idcat']);
    $color=mysqli_real_escape_string($db->link, $_POST['color']);
    $talla =mysqli_real_escape_string($db->link, $_POST['talla']);
    $detalle= mysqli_real_escape_string($db->link, $_POST['detalle']);
    $cantidad=mysqli_real_escape_string($db->link, $_POST['cantidad']);
    $precio=mysqli_real_escape_string($db->link, $_POST['precio']);
    $foto =(isset($_FILES['foto']['name']))?$_FILES['foto']['name']:"";//agregar ubicacion de la imagen

    if($nombrep == '' || $idcat == '' || $color == '' || $talla == '' || $detalle == '' || $cantidad == '' || $precio == '' ||$foto ==''){
      $error = "Los campos no deben estar vacios!!!";
    }else{
      /*codigo para almacenar el tiempo que se guardo la imagen para que no exista duplicidad en nombre de archivo*/
      $fecha = new DateTime();
      $nomArchivo = ($foto!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"avatar.png";
      $tmpfoto=$_FILES["foto"]["tmp_name"];
      $query = "INSERT INTO articulo(Id_Categoria,Nombre_Art, Color_Art, Talla_Art, detalle, catidad, foto, precio) values('$idcat','$nombrep','$color','$talla','$detalle','$cantidad','$precio','$nomArchivo')";
      /*mover la imagen hcia la ruta especificada en este caso llevar la imagen a la carpeta img*/
      if($tmpfoto !=""){
        move_uploaded_file($tmpfoto, "../img/".$nomArchivo);
      }
      $create = mysqli_insert_id($db->registerA($query));
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
 <h1>Registro de prendas</h1>
  <form class="login" action="prendas.php" method="POST" >
            <?php
             if(isset($error)){
              echo "<center><div class='alert alert-danger'><span>".$error."</span></div></center>";
             }
            ?>
            <?php
       $mysqli= new mysqli("localhost", "root", "", "rosly");
       include '../lib/config.php';
       $reult=$mysqli->query("SELECT * FROM articulo") or die (mysqli_error());
       while ($f = mysqli_fetch_array($reult)) {
       ?>
       <div class="producto">
           <center>
               <img src="../img/<?php  echo $f['foto'];?>"><br>
               <span><?php echo $f['Nombre_Art']?></span><br>
           </center>
       </div>
        <?php
         }
        ?>
            <div class="form-group">
              <select name="idcat" id="idcat" class="form-control" required="">
                <option>-Seleccionar </option>
                <option value="1">APantalones</option>
                <option value="2">Abrigos</option>
                <option value="3">Bleizer</option>
              </select>
            </div><br>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Introducir el nombre completo" name="nombrep" id="nombrep">
            </div><br>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Color" name="color" id="color">
            </div><br>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Talla" name="talla" id="talla">
            </div><br>
             <div class="form-group">
              <input type="text" class="form-control" placeholder="Detalle" name="detalle" id="detalle">
            </div>
            <br>
            <div class="form-group">
              <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="canta">
            </div><br>
            <div class="form-group">
              <label class="imagen">imagen:(*) </label>
              <input type="file" accept="image/*" name="foto" id="foto" class="form-control">
             </div>
            <div class="form-group">
              <input type="text" name="precio" id="precio" class="form-control" placeholder="precio">
            </div><br>
            <div class="form-group">
              <center>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Registrar</button>
                <a href="registrarUsuario.php" class="btn btn-success">Limpiar</a>
                <a href="listaUsuario.php" class="btn btn-info">Ver lista</a>
                <a href="principal.php" class="btn btn-danger">Cancelar</a>
              </center>
            </div>
          </form>    
    <hr>
    <footer class="blockquote-footer text-center">
    <address>
      <small class="font-weight-bold text-uppercase">&copy;todos los derechos reservados</small><br>
      <p class="lead font-weight-bold">Sonia Marlene Tinta Chambi <br> LA PAZ - BOLIVIA <br> 2021</p>
    </address>
  </footer> 
</body>
</html>