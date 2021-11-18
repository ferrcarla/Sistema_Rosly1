<?php
 include "../lib/config.php";
 include "../lib/dataBase.php";
 include "../lib/sesion.php";
 header("Content-type: application/vnd.ms-excel");
 header("Content-Disposition: attachment; filename=reporte.xls");
?>
<?php
	$db = new Database();
 	$query = "select * from inventario";
 	$read = $db->select($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inicial-scale=1.0">
	<title>Document</title>
</head>
<body>
<table>
	<center><h3>REPORTE DE INVENTARIO</h3></center>
	<hr>
	<thead>
		<tr style="background-color:black; color:white; ">
			<th scope="col">Id_Inventario</th>
			<th scope="col">Id_Articulo</th>
			<th scope="col">Id_NIT</th>
			<th scope="col">Cantidad</th>
			<th scope="col">Descripcion</th>
			<th scope="col">Fecha</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($read as $row) {?>
	        <tr>
				<td><?php echo $row['Id_Inventario']; ?></td>
				<td><?php echo $row['Id_Articulo']; ?></td>
				<td><?php echo $row['Id_NIT']; ?></td>
				<td><?php echo $row['cantidad']; ?></td>
				<td><?php echo $row['descripcion']; ?></td>
									
				<td><?php echo $row['fecha_creacion']; ?></td>
									
			</tr>
		<?php }  ?>
	</tbody>
</table>
</body>
</html>