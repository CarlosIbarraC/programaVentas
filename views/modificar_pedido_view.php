<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos_cli.css">
	  <link rel="stylesheet" href="css/estilos.css">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	 <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<title>modificar pedido</title>
</head>
<body>
	<div class="logoc">
			<h3>Ibarra&desarrollos</h3>			
			</div>
	<center>
		<h1 class="h1 titulo">MODIFICAR PEDIDO</h1>
		<div class="col-9 col-md-4">
		<form action="ope_modif_pedido.php?id_pedido=<?php echo $row['id_pedido']; ?>" class="form-horizontal" method="POST">	
       
			<br><br>
			<h6 class="h5">referencia
			<input type="text" REQUIRED name="referencia"  class="form-control"  value="<?php echo $row['referencia'];?>"></h6>
			<h6 class="h5">color
			<input type="text" REQUIRED name="color" class="form-control"  value="<?php echo $row['color'];?>"></h6>
			<h6 class="h5">metros
			<input type="text" REQUIRED name="metros" class="form-control"  value="<?php echo $row['metros'];?>"></h6>
			<h6 class="h5">precio
			<input type="text" REQUIRED name="precio" class="form-control" value="<?php echo $row['precio'];?>"></h6>
			<h6 class="h5">obsevaciones
			<input type="text" REQUIRED name="observaciones" class="form-control"  value="<?php echo $row['observaciones'];?>"></h6><br>
			<input type="submit" class="btn btn-sm btn-outline-info mb-3" value="modificar"/><br>
		</form>
	</div>
	</center>
</body>
</html>