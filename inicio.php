<?php
	session_start();
	if($_SERVER['SCRIPT_NAME'] == '/prueba1/inicio.php' && !isset($_SESSION['user'])){
		header('Location: index.php');
		exit;
	}

	if($_GET){
		if(isset($_GET['nom']) and isset($_GET['tien'])){
			$nom= $_GET['nom']; 
			$ti = $_GET['tien']; 
			$idUser = $_GET['id'];

			//echo $nom . ' ' . $ti; 
		}

	}

	$connx = mysqli_connect('localhost', 'root', '', 'pruebab1');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tiendas</title>
</head>
<body>

	<a href = "Salir.php">Salir</a>

	<h1>Tiendas EC</h1>
	<p>Bienvenido: <b><?php echo $nom?></b></p>
	<p>Nombre de la tienda: <b><?php echo $ti?></b></p>
	<p>Productos de la tienda: </p>

	<table border ="1">
		<tr>
			<td>ID</td>
			<td>CODIGO</td>
			<td>NOMBRE</td>
			<td>TIPO</td>
			<td>STOCK</td>
			<td>PRECIO</td>
			<td>CODIGO USUARIO</td>
		</tr>

		<?php
			$sql = "SELECT * FROM productos WHERE id_us = '$idUser'";
			$result = mysqli_query($connx, $sql); 

			while($mostrar = mysqli_fetch_array($result)){
		?>




		<tr>
			<td><?php echo $mostrar['id']  ?></td>
			<td><?php echo $mostrar['codigo']  ?></td>
			<td><?php echo $mostrar['Nombre']  ?></td>
			<td><?php echo $mostrar['Tipo']  ?></td>
			<td><?php echo $mostrar['Cantidad']  ?></td>
			<td><?php echo $mostrar['Precio']  ?></td>
			<td><?php echo $mostrar['id_us']  ?></td>
		</tr>
		<?php
			}
		?>


	
	
	</table>

	<br>
	<?php
	echo "<a href='nuevo_producto.php?identi=$idUser'>Registrar nuevo producto</a>"
	?>



</body>
</html>