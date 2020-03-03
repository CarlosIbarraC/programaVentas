
<?php 
session_start();

$titulo = $_POST['titulo'];
$_SESSION['id'] = $titulo ;
 ?>

<!DOCTYPE html>
<html>
<head>	
	 <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos_cli.css">
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	 <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<title>tabla</title>
</head>
<body>
	<a href=""><?php echo($_SESSION['id']) ?></a>
	<div class="logoc">
			<h3>Ibarra&desarrollos</h3>			
			</div>	
	<center>
		<h1 class=" h1 titulo">LISTADO DE  CLIENTES INSCRITOS</h1>

		<div class="alert alert-warning mt-3">
					<strong>Aviso</strong> Esta seguro que desea eliminar el registro...<strong><?php echo $titulo ?></strong> <button class="btn btn-warning btn-sm"><a href="trans_eliminar_color.php" class="alert-link">eliminar</a></button> <button class="btn btn-warning btn-sm"><a href="consulta_admin.php" class="alert-link">volver</a> </button>
		</div>
</body>