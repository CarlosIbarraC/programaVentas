<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
   <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

	 <link rel="stylesheet" href="css/estilos1.css">
	 <link rel="stylesheet" href="css/estilos.css">
	<title>Galeria</title>
</head>
<body>
	<header>
		<div class="logoc">
      <h3>Ibarra&desarrollos</h3>     
      </div>
	<!-- <div class="contenedor"> -->
		<h1 class=" h1 titulo">Consultas Nerpel
    <a class="btn  btn-sm btn-info mt-1 mx-4" href="cerrar.php">Cerrar Sesion   </a>
    <a class="btn  btn-sm btn-info mt-1 mx-4" href="consulta_admin.php">volver   </a></h1>
	<header>
		
		<div class="contenedor">
			<h3 class="titulo">Subir Foto a Catalogo</h3>
		</div>
	</header>

	<div class="contenedor">
		<form class="formulario2" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<label for="foto">Selecciona tu foto</label>
			<input type="file" id="foto" name="foto">

			<label for="titulo">Titulo de la foto</label>
			<input type="text" id="titulo" name="titulo">

			<label for="texto">Descripcion:</label>
			<textarea name="texto" id="texto" placeholder="Ingresa una descripcion"></textarea>

			<?php if (isset($error)): ?>
				<p class="error"><?php echo $error; ?></p>
			<?php endif ?>

			<input type="submit" class="submit" value="Subir Foto">

		</form>
	</div>

	<footer>
		<p class="copyright">Galeria creada Ibarra&Desarrollos</p>
	</footer>
</body>
</html>