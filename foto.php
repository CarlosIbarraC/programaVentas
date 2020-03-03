<?php 



try {
	
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if (!$id) {
	header('Location: index1.php');
}

$statement = $conexion->prepare('SELECT * FROM fotos WHERE id = :id');
$statement->execute(array(':id' => $id));

$foto = $statement->fetch();

if (!$foto) {
	header('Location: index1.php');
}

require 'views/foto.view.php';

?>