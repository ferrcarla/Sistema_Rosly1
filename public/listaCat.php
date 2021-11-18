<?php
include "../lib/config.php";
include "../lib/dataBase.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="img/avatar.png">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/update.css">
	<title>CATEGORIA </title>
  <link rel="stylesheet" type="text/css" href="../datatable/cssTabla/da">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/LineIcons.2.0.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/stile.css">
  <link rel="stylesheet" href="../css/principal1.css">
</head>
<body>
	<!----------- NAV BAR ---------- -->
    <!----------- END NAV BAR.------ -->
<section class="container my-5">
	<div class="col-sm-12">
		<?php
		$db =  new Database();
		$query = "SELECT * FROM categoria";
		$read  = $db ->select($query);

		if(isset($_GET['msg'])){
			echo "<div class='alert alert-success'<span>".$_GET['msg']."</span></div>";
		}
		?>
	</div>
	<div class="col-sm-12">
		<table id="tabla_dinamica" class="table table-hover">
			<thead class="thead-dark">
				<tr>
					<th scope="col">id_unico</th>
					<th scope="col">NOMBRE</th>
					<th scope="col">DESCRIPCION</th>
					<th scope="col">Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($read as $row) {?>
					<tr>
					    <td><?php echo $row['Id_Categoria']; ?></td>
						<td><?php echo $row['Nombre']; ?></td>
						<td><?php echo $row['Descripcion']; ?></td>
						<td><a href="updateCat.php?id_Categoria=<?php echo urlencode($row['Id_Categoria']); ?>" class="btn btn-primary btn-sm">Editar</a></td>
					</tr>
				<?php }  ?>
			</tbody>
		</table>
	</div>
</section>
	<!------------PIE DE LA PAGINA--------------->	
	<!------------END PIE DE LA PAGINA----------->
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/jquery-3.5.1.min.js"></script>
</body>
</html> 