<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>AÑADIR AL CARRITO</title>
	<link rel="stylesheet" type="text/css" href="css/publicidad.css">
	<script type="text/javascript"href="./js/scripts.js"></script>
</head>
<body>
<header>
	<h1>DETALLE</h1>
	<a href="./carrito.php" title="Ver carrito">
		<img src="./img/carrito.png">
	</a>
</header>
<section>
	<!---DISE;O DE LA IMAGENES EN PUBLIICDAD -->
       <?php
    
	   $mysqli= new mysqli("localhost", "root", "", "rosly");
      
       $re=$mysqli->query("SELECT * FROM articulo WHERE Id_Articulo=".$_GET['Id_Articulo']) or die(mysql_error());
       while ($f = mysqli_fetch_array($res)) {
       ?>
       
           <center>
               <img src="../img/<?php  echo $f['foto'];?>"><br>
               	<label>Nombre</label>
               <span><?php echo $f['Nombre_Art'];?></span><br>
               <label>Color</label>
               <span><?php echo $f['Color_Art'];?></span><br>
               <label>Talla</label>
               <span><?php echo $f['Talla_Art'];?></span><br>
               <label>Detalle de la prenda</label>
               <span><?php echo $f['detalle'];?></span><br>	
               <label>Cantidad disponible</label>
               <span><?php echo $f['catidad'];?></span><br>
               <LABEL>Precio Unitario</LABEL>
               <span><?php echo $f['precio'];?></span>
               <a href="../detalle.php?Id_Articulo=<?php echo $f['Id_Articulo'];?>">ver</a>
           <br>
           </center>
       </div>
        <?php
         }
        ?>
       <!--END -->
</section>
</body>
</html>