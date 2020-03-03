<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="stylesheet" href="css/estilos.css">
	<title>Iniciar Sesión </title>
</head>
<body>
	<div class="container ">
	   <div class=" d-flex justify-content-center ">
	   <img src="img/baner-nerpel-4.jpg" alt="" class="img-fluid">	   
	   </div>
		<div class="contenedor1 mt-5">
			<h1 class="titulo mt-5">Iniciar Sesión Nerpel</h1>
			<hr class="border">
	
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario mt-5" name="login">
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="vendedor">
				</div>
	
				<div class="form-group">
					<i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña">
					<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
				</div>
	
				<?php if(!empty($errores)): ?>
					<div class="error">
						<ul>
							<?php echo $errores; ?>
						</ul>
					</div>
				<?php endif; ?>
			</form>
	
			<p class="texto-registrate">
				<!-- ¿ Aun no tienes cuenta ?
				<a href="registrate.php">Regístrate</a><br><br> -->
				<a href="administracion.php">administracion</a>
			</p>
		</div>
	</div>
</body>
</html>