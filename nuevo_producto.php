<?php
session_start();
if($_SERVER['SCRIPT_NAME'] == '/prueba1/nuevo_producto.php' && !isset($_SESSION['user'])){
    header('Location: index.php');
    exit(); 
}

if($_GET){
    $idUs = $_GET['identi'];
}

if($_POST){
    if(isset($_POST['cod']) && isset($_POST['nomprod']) && isset($_POST['combo']) && isset($_POST['cantidad']) && isset($_POST['precio'])){
        $codigo = $_POST['cod'];
        $nombreproducto = $_POST['nomprod'];
        $tipo = $_POST['combo'];
        $cantidad = $_POST['cantidad']; 
        $precio = $_POST['precio'];
        
        $conn = new mysqli('localhost', 'root', '', 'pruebab1');
        $sql_insert = "INSERT INTO productos
		(codigo, Nombre, Tipo, Cantidad, Precio, id_us)
        VALUES ('$codigo', '$nombreproducto', '$tipo', '$cantidad', '$precio', '$idUs')";
        $conn->query($sql_insert);	
    }else{
        echo 'Ingrese todos los campos :C' ; 
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Producto</title>
</head>
<body>
	<h1>Registro de producto</h1>

<form method="POST">
<input type="text" name="cod"  placeholder="Código" required="required" >
<br> <br>
<input type="text" name="nomprod"  placeholder="Nombre" required="required">
<br> <br>

<select name="combo">
    <option value = "Alimento">Alimento</option>
    <option value = "Vestimenta">Vestimenta</option>
    <option value = "Salud">Salud</option>
</select>

<br> <br>
<input type="number" name="cantidad"  placeholder="Cantidad" required="required">
<br> <br>
<input type="number" name="precio"  placeholder="Precio" required="required">
<br> <br>
<button>Registrar</button>
<br> <br>
</form>
</body>
</html>
