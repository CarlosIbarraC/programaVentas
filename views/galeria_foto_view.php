<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos.css">
	 <link rel="stylesheet" href="css/estilos1.css">
	<title>Galeria</title>
</head>
<body>
	<div class="logoc">
      <h3>Ibarra&desarrollos</h3>     
      </div>
	<!-- <div class="contenedor"> -->
		<h1 class=" h1 titulo">Consultas Nerpel
    <a class="btn  btn-sm btn-info mt-1 mx-4" href="cerrar.php">Cerrar Sesion   </a>
<a class="btn  btn-sm btn-info mt-1 mx-4" href="consulta_admin.php">volver   </a></h1>
	<header>
		<div class="contenedor">
			<h1 class="titulo">Foto: <?php if (!empty($foto['titulo'])) {
				echo $foto['titulo'];
			} else {
				echo $foto['imagen'];
			} ?></h1>
		</div>
	</header>

	<div class="contenedor">
		<div class="foto">
			<img src="fotos/<?php echo $foto['imagen']; ?>" alt="">
			<p class="texto"><?php echo $foto['texto']; ?></p>
			<a href="catalogo.php" class="regresar"><i class="fa fa-long-arrow-left"></i> Regresar</a>
		</div>
	</div>

	<footer>
		<p class="copyright">Galeria creada por Carlos Arturo - FalconMasters</p>
	</footer>
</body>
</html>