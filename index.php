<?php 
	session_start(); 

	if ($_SERVER['SCRIPT_NAME'] != '/prueba1/index.php' && !isset($_SESSION['user'])) {
	header('Location: index.php'); 
	} elseif( $_SERVER['SCRIPT_NAME'] == '/prueba1/index.php' && isset($_SESSION['user']) ) {
	header('Location: inicio.php'); 
	}




	if($_GET) {
	if(isset($_GET['mensaje'])) {
		$mensajeDesdeRegistro = $_GET['mensaje'];
		echo $mensajeDesdeRegistro;
	}
}

	if($_POST){
		if(isset($_POST['username']) && isset($_POST['password'])){
		$user = $_POST['username']; 
		$password1 = $_POST['password'];

		$conn = new mysqli('localhost', 'root', '', 'pruebab1');
		$sql = "SELECT * FROM tienda WHERE Usuario = '$user' AND  Password= MD5('$password1')";
		$res = $conn->query($sql); 
			if($res->num_rows > 0){
				

				while ($row = $res->fetch_assoc()){
				$_SESSION['user'] = ['username'=> $row['Usuario'], 'id'=> $row['ID']];
				//print_r($_SESSION['user']);

		
				header('Location: inicio.php'); 
				exit;
			}

			}else{
				echo 'Usuario o contraseña incorrecto'; 
			}
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesion</title>
</head>
<body>

	<h1>Iniciar Sesión</h1>

<form  method="POST">
<input type="text" name="username"  placeholder="Usuario" required="required">
<br><br>
<input type="password" name="password"  placeholder="Contraseña" required="required">
<br><br>
<button>Ingresar</button>
<a href="registro_tienda.php">Registrarse</a>
<br><br>
</form>




</body>
</html>

