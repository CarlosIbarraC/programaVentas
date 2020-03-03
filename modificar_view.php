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
	<title>Iniciar Sesión </title>
	<title>Guardar</title>
</head>
<body>
	<div class="logoc">
			<h3>Ibarra&desarrollos</h3>			
			</div>
	<center>
		<h1 class="h2 titulo">MODIFICAR DATOS CLIENTE</h1>
		<form action="ope_modificar.php?id=<?php echo $row['id']; ?>" method="POST" class="form-horizontal">
				<div class="form-group">
				<div class="col-10 col-sm-6">
			<input type="text" REQUIRED name="nombre" placeholder="nombre" class="form-control " value="<?php echo $row['nombre'];?>">
			<input type="text" REQUIRED name="direccion" placeholder="direccion" class="form-control mt-2" value="<?php echo $row['direccion'];?>">
			<input type="text" REQUIRED name="ciudad" placeholder="ciudad"  class="form-control mt-2"value="<?php echo $row['ciudad'];?>">
			<input type="text" REQUIRED name="telefono" placeholder="telefono" class="form-control mt-2" value="<?php echo $row['telefono'];?>">
			<input type="text" REQUIRED name="observaciones" placeholder="observaciones" class="form-control mt-2" value="<?php echo $row['observaciones'];?>">
			<input type="submit"  class=" btn  btn-sm btn-outline-info mt-2" value="modificar"/>
		     </div>
	        </div>
		</form>
	</center>
	<center>
		
		<a href="Cerrar.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>
	<a href="tabla_clientes_admin.php"  class=" btn  btn-sm btn-outline-info ">volver</a>
	</center>
</body>
</html>