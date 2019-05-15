<?php

if($_POST){
	if(isset($_POST['nomtienda']) && isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2'])){
		$user = $_POST['username']; 
		$nomTi = $_POST['nomtienda'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2']; 

		$conn = new mysqli('localhost', 'root', '', 'pruebab1');

		$sql_insert = "INSERT INTO tienda
		(NomTienda, Usuario, Password)
		VALUES ('$nomTi', '$user', MD5('$password1'))";	
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<body>
	<h1>REGISTRO DE TIENDA</h1>

<form method="POST">
<input type="text" name="nomtienda"  placeholder="Nombre de la tienda" required="required" >
<br> <br>
<input type="text" name="username"  placeholder="Usuario" required="required">
<br> <br>
<input type="password" name="password1"  placeholder="Contraseña" required="required">
<br> <br>
<input type="password" name="password2"  placeholder="Repita su Contraseña" required="required">
<br> <br>
<button>Registrar</button>
<br> <br>

<p><?php 
	if($_POST){
	if($password1 == $password2){
			$sql = "SELECT * FROM tienda WHERE Usuario = '$user'";
			$res = $conn->query($sql); 
			//echo (string) $res->num_rows;
			if($res->num_rows > 0){
				echo 'Ya existe el usuario en el sistema'; 
			}else{
				$conn->query($sql_insert);
				header('Location: index.php?mensaje=Tienda registrada correctamente, puede iniciar sesion');
				exit; 
			}
		}else{
			echo 'Las contraseñas no coinciden'; 
		}
	}
?></p>
</form>
</body>
</html>