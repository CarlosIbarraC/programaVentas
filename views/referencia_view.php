<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="/css/estilos_cli.css">
	  <link rel="stylesheet" href="/css/estilos1.css">
	  <link rel="stylesheet" href="/css/bootstrap.min.css">
	 <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<title>referencia_view</title>
</head>
<body>
	<div class="logoc">
			<h3>Ibarra&desarrollos</h3>			
			</div>
	<center>
		<h1 class="h1 titulo">INGRESO REFERENCIA</h1>
		<div class="col-9 col-md-4">
		<form action="/referencia.php" class="form-horizontal" method="POST">	
       
			<br><br>
			<h6 class="h5">referencia
			<input type="text" REQUIRED name="referencia"  class="form-control"  value=""></h6>
			<h6 class="h5">descripcion
			<input type="text" REQUIRED name="descripcion" class="form-control"  value=""></h6>
			
			<input type="submit" class="btn btn-sm btn-info mb-3" value="guardar"/><br><a href="/consulta_admin.php" class="btn  btn-sm btn-outline-info mt-2">volver</a>
		</form>
	</div>
	</center>
</body>
</html>