<?php 
session_start();
if(isset($_SESSION['usuario'])){
	// require'views/contenido_view.php';
}else{
	header('location: login.php');
}
 $fechamin = $_POST["fechamin"];
 $fechamax = $_POST["fechamax"];
 $referencia = $_POST["referencia"];
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
		<h1 class="h1 titulo">LISTADO PEDIDOS x REFERENCIA</h1>
		
	<table class=" table table-striped table-border table-hover table-sm table-responsive">

		<thead>

			<tr>				 				
				
				<th colspan="3"><center> Pedidos por Referencia del <?php echo $fechamin ?> al <?php echo $fechamax?></center>
				</th>
				<th colspan="2" >
					<a href="cerrar.php" class="btn btn-outline-info btn-sm mb-2">Cerrar Sesion</a>	
	                <a  href="consulta_admin.php" class="btn btn-outline-info btn-sm mb-2">volver</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				
				<td align="center">pedido</td>				
				<td align="center">referencia</td>				
                <td align="center">color</td>
                <td align="center">metros</td>               			
				<td align="center">fecha</td>
				
			</tr>
		
		<?php 
		 	
?>
<?php
       $s=0;
          
       try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       if ($referencia == "todas") {
       	     $statement = $conexion->prepare("SELECT numero_pedido,referencia,color,metros,fecha FROM pedidos_ventas1 WHERE  fecha BETWEEN '$fechamin'  AND '$fechamax'  ORDER BY referencia ASC  ");
       	# code...
       } 
       else{ 
		$statement = $conexion->prepare("SELECT numero_pedido,referencia,color,metros,fecha FROM pedidos_ventas1 WHERE referencia = '$referencia' AND  fecha BETWEEN '$fechamin'  AND '$fechamax'  ORDER BY fecha ASC  ");}
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {		 
		
		$s = $row["metros"] + $s ;
	
		 ?>

   <tr>
   	
   	<td align="center"><?php echo $row["numero_pedido"]; ?></td>   	
   	<td align="center"><?php echo $row["referencia"]; ?></td>
   	<td align="center"><?php echo $row["color"]; ?></td>
   	<td align="center"><?php echo $row["metros"]; ?></td>     	
    <td align="center"><?php echo $row["fecha"]; ?></td></tr>
   <?php
    // $_SESSION['id']= $row['id'];
     }
   	 
    ?>
    <tr>
    	<td align="center" colspan="3"  >total metros</td>
    	<td align="center"><?php echo $s ?></td>
    </tr>
             </tbody>
	</table><br><br>
	
	<a href="cerrar.php" class="btn btn-outline-info btn-sm mb-2">Cerrar Sesion</a>	
	<a  href="consulta_admin.php" class="btn btn-outline-info btn-sm mb-2">volver</a>
  </center>
</body>
</html>



