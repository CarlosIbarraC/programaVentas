<?php 
session_start();
if(isset($_SESSION['usuario'])){
	// require'views/contenido_view.php';
}else{
	header('location: login.php');
}
 $fechamin = $_POST["fechamin"];
 $fechamax = $_POST["fechamax"];

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
	<title>tabla</title>
</head>
<body>
	<div class="logoc">
			<h3>Ibarra&desarrollos</h3>
			
			</div>
	
	<center>
		<h1 class=" h1 titulo">ENTREGA PEDIDOS x FECHA</h1>
		
		
	<table class= "table table-striped table-border table-hover table-sm table-responsive">

		<thead>

			<tr>				 				
				
				<th colspan="9"><center> ENTREGAS POR PERIODO </center><a href="cerrar_admin.php" align="left" class="btn btn-outline-info mb-2">Cerrar Sesion</a>
	
	<a  href="consulta_admin.php" align="left" class="btn btn-outline-info mb-2">volver</a></th>
			</tr>
		
			<tr>
				<th>numero_pedido</th>
				<th>referencia</th>
				<th>color</th>
				<th>metros pedidos</th>				
                <th>metros Entregados</th>
                <th>faltante</th>
                 <th>fecha de entrega</th>               
				
			</tr>
		   </thead>
		<tbody>
		<?php 
		 	
?>
<?php
        $s=0;    
       try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
		$statement = $conexion->prepare("SELECT * FROM entregas WHERE fecha BETWEEN '$fechamin' AND '$fechamax' ORDER BY`numero_pedido`DESC ");
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
		 	# code...
		$s = $row['metros'] + $s ;
		$y = $row['metros_e'] + $y; 
		$x = $row['metros']-$row['metros_e'];
			
		 ?>

   <tr>
   	<td><?php echo $row["numero_pedido"]; ?></td>
   	<td><?php echo $row["referencia"]; ?></td>
   	<td><?php echo $row["color"]; ?></td>
   	<td><?php echo $row["metros"]; ?></td>
   	<td><?php echo $row["metros_e"]; ?></td>
   	<td><?php echo $x; ?></td>
   	<td><?php echo $row["fecha"]; ?></td>
   
   <?php
           
    // $_SESSION['id']= $row['id'];
     }
   
    ?>
      <tr>
    	<td colspan="3"  >total metros</td>
    	<td><?php echo $s ?></td>
    	<td><?php echo $y ?></td>
    </tr>
      </tbody>
	</table><br>
	<a href="cerrar_admin.php" class="btn btn-outline-info mb-2">Cerrar Sesion</a>
	
	<a  href="consulta_admin.php" class="btn btn-outline-info mb-2">volver</a>
  </center>
</body>
</html>



