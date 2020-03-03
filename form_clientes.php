<?php 
session_start();
$vendedor = $_SESSION ['usuario'];


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos_cli.css">
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	 <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<title>Guardar</title>
</head>
<body>
	<div class="logoc">
			<h3>Ibarra&desarrollos</h3>			
			</div>	
	<center>
		<h1 class="h2 titulo">FORMULARIO CLIENTE NUEVO NERPEL</h1>
		<form action="guardar_cli.php" method="POST" class="form-horizontal">
			<div class="form-group">
				<div class="col-10 col-sm-6">
			<input type="hidden" name="vendedor" class="form-control" value="<?php echo $vendedor; ?>">
			<input type="text" REQUIRED name="nombre" placeholder="nombre"  class="form-control mt-2" values="">
			<input type="text" REQUIRED name="nit" placeholder="nit"  class="form-control mt-2" values="">
			<input type="text" REQUIRED name="direccion" placeholder="direccion" class="form-control mt-2" values="">
			<input type="text" REQUIRED name="ciudad" placeholder="ciudad" class="form-control mt-2" values="">
			<input type="text" REQUIRED name="telefono" placeholder="telefono" class="form-control mt-2" values="">
			<input type="text" REQUIRED name="observaciones" placeholder="observaciones" class="form-control mt-2" values="">
			<input type="submit" class=" btn  btn-sm btn-outline-info mt-2" value="G U A R D A R"/>
		        </div>
		    </div>
		</form>
	</center>
	<center>
		
		<a href="Cerrar.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>
	<a href="tabla_clientes.php"  class=" btn  btn-sm btn-outline-info ">volver</a>
	</center>

</body>
</html>
