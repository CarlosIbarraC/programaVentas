<?php 
try {
	
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}


		$carpeta = 'img/';
		opendir($carpeta);
		$destino = $carpeta.$_FILES['foto']['name'];
       if( @move_uploaded_file($_FILES['foto']['tmp_name'], $destino) ){
       	 echo "archivo subido ";
       }
       echo('FALLA');
       echo $_FILES['foto']['tmp_name'] , $carpeta;
       echo $carpeta ;
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
	
// 	$check = @getimagesize($_FILES['foto']['tmp_name']);
	
// 	if ($check !== false) {
// 		$carpeta_destino = 'fotos/';

// 		opendir($carpeta_destino);
// 		$archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
// 		print_r($archivo_subido);

// 		 @move_uploaded_file( $_FILES['foto']['tmp_name'] , $ "archivo_subido);
			
		

// 		$statement = $conexion->prepare('
// 			INSERT INTO fotos (titulo, imagen, texto)
// 			 VALUES (:titulo, :imagen, :texto)
// 		');

// 		$statement->execute(array(
// 			':titulo' => $_POST['titulo'],
// 			':imagen' => $_FILES['foto']['name'],
// 			':texto' => $_POST['texto']
// 		));

// 		//header('Location: index1.php');
// 	} else {
// 		$error = "El archivo no es una imagen o el archivo es muy pesado";
// 	}
// }

// require 'views/subir.view.php';

// ?>