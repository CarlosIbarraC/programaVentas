<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos.css">
	 <link rel="stylesheet" href="css/estilos_cli.css">
	<title>Registrate</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Consultas Nerpel</h1>
    
		<hr class="border">		    
			<form action="tabla_entrega_fecha.php" method="POST" class="formulario" name="login">
			<div class="form-group">
				<center><p class="fol" ><i class="fa fa-folder" aria-hidden="true"></i> Entregas por fecha</p></center><br>
				<p >fecha inicial</p>
				<input type="date" required name="fechamin" class="usuario" placeholder="fecha inicial">
				<p >fecha final</p>
				<input type="date" required name="fechamax" class="usuario" placeholder="fecha final">
				<input class="inp"  type="submit" value="cargar" name="submit"/>
		
			</div>
		</form>
		
		<hr class="border">
		<center>
         <div class="form-group formulario">
		<a class="fol" href="tabla_entregas_vendedor.php"><i class="fa fa-folder-open" aria-hidden="true"></i>Entregas por Vendedor</a>
          </div>
         </center>
         <hr class="border">
         <center>
         <div class="form-group formulario">
		<a class="fol" href="tabla_entregas_cliente.php"><i class="fa fa-folder-open" aria-hidden="true"></i>Entregas por Clientes</a>
          </div>
         </center>
          <hr class="border">
         
         <hr class="border">
         <form action="consulta_por_referencia.php" method="POST" class="formulario" name="login">
			<div class="form-group">
				<center><p class="fol" ><i class="fa fa-folder-open" aria-hidden="true"></i>Entrega por referencia</p></center><br>
				<p >fecha inicial</p>
				<input REQUIRED type="date" name="fechamin" class="usuario" placeholder="fecha inicial">
				<p >fecha final</p>
				<input REQUIRED type="date" name="fechamax" class="usuario" placeholder="fecha final">
				 <select REQUIRED name="referencia"><br>
  	<option value="" disabled selected>SELECCIONE LA REFERENCIA</option>
    <option value="1919">1989</option>
    <option value="1187">1187</option>
    <option value="1185">1185</option>
    <option value="1188">1188</option>
    <option value="1178">1178</option>
    <option value="1919">1919</option>
    <option value="1183">1183</option>
    <option value="1181">1181</option>
    <option value="1180">1180</option>
    <option value="1320">1320</option>
    <option value="1182">1182</option>
    <option value="1499">1499</option>
    <option value="1184">1184</option>
    <option value="1186">1186</option>
    <option value="1292">1292</option>
    <option value="1714">1714</option>
    <option value= "333" >todas</option>
  </select>
				<input class="inp"  type="submit" value="cargar" name="submit"/>
		
			</div>
		</form>
         <center>
		<a class="cerrar" href="cerrar.php">Cerrar Sesion</a>
		</center>
		</body>
</html>