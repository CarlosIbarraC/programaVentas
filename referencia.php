<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="/css/estilos_cli.css">
	  <link rel="stylesheet" href="/css/estilos.css">
	  <link rel="stylesheet" href="/css/bootstrap.min.css">
	 <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<title>referencia_view</title>
</head>
<body>
	<div class="logoc">
			<h3>Ibarra&desarrollos</h3>			
			</div>	
	<center>
		<h3 class=" h3 titulo">VERIFICACION</h3></center>

<?php session_start();




  $referencia = $_POST['referencia'];
  $descripcion= $_POST['descripcion'];

		try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$statement = $conexion->prepare("SELECT * FROM referencias WHERE referencia = '$referencia' LIMIT 1");
		$statement->execute();
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$errores = '<li>El nombre de referencia ya existe</li>';
			?>
			 <div class="alert alert-info alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Info!</strong> ya existe esta referencia
  </div>
         <center> <a href="views/referencia_view.php" class="btn  btn-sm btn-info mt-2">volver</a> <a href="consulta_admin.php" class="btn  btn-sm btn-info mt-2">salir</a></center>
         <?php

			// header('Location:views/referencia_view.php');
		}

	

	if ($errores == '') {
		$statement = $conexion->prepare("INSERT INTO referencias (id_referencias, referencia, descripcion) VALUES (null, '$referencia', '$descripcion')");
		$statement->execute();

		header('Location:consulta_admin.php');
	}




?>
