<?php 
 try {
      // $conexion = new PDO('mysql:host=localhost;dbname=pedidos', 'root', '');
      $conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

if (!$conexion) {
	die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
	$check = @getimagesize($_FILES['foto']['tmp_name']);
	if ($check !== false) {
		$carpeta_destino = 'fotos/';
		$archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
		@move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);
       
		$statement = $conexion->prepare('
			INSERT INTO fotos (titulo, imagen, texto)
			 VALUES (:titulo, :imagen, :texto)
		');

		$statement->execute(array(
			':titulo' => $_POST['titulo'],
			':imagen' => $_FILES['foto']['name'],
			':texto' => $_POST['texto']
		));

		//header('Location: views/subir.php');
	} else {
		$error = "El archivo no es una imagen o el archivo es muy pesado";
		echo $_FILES['foto']['tmp_name'].$archivo_subido  ;
	}
}

require 'views/subir.view.php';

?>