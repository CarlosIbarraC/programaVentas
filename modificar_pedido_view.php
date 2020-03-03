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
		<h1 class="h1">MODIFICAR PEDIDO</h1>
		<form action="ope_modif_pedido.php?id_pedido=<?php echo $row['id_pedido']; ?>" class="form-horizontal" method="POST">	
       
			<br><br>
			<h6>referencia</h6>
			<input type="text" REQUIRED name="referencia"  class="form-control" placeholder="referencia" value="<?php echo $row['referencia'];?>">
			<h6>color</h6>
			<input type="text" REQUIRED name="color" class="form-control" placeholder="color" value="<?php echo $row['color'];?>">
			<h6>metros</h6>
			<input type="text" REQUIRED name="metros" class="form-control" placeholder="metros" value="<?php echo $row['metros'];?>">
			<h6>precio</h6>
			<input type="text" REQUIRED name="precio" class="form-control" placeholder="precio" value="<?php echo $row['precio'];?>">
			<h6>obsevaciones</h6>
			<input type="text" REQUIRED name="observaciones" class="form-control" placeholder="observaciones" value="<?php echo $row['observaciones'];?>"><br>
			<input type="submit" class="btn btn-sm btn-outline-info " value="modificar"/>
		</form>
	</center>
</body>
</html>