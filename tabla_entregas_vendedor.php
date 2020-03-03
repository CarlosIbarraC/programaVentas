<?php 
session_start();
if(isset($_SESSION['usuario'])){
	// require'views/contenido_view.php';
}else{
	header('location: login.php');
}



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
		
		<h1 class="h1 titulo">ENTREGAS POR VENDEDOR</h1>
		
	<table class=" table table-striped table-border table-hover table-sm table-responsive">

		<thead>

			<tr>				 				
				
				<th colspan="6"><center> Listado de Entregas por vendedor</center></th>
				<th><center> <a href="cerrar_admin.php"  class=" btn  btn-sm btn-outline-info mb-2">Cerrar Sesion</a>	
	<a  href="consulta_admin.php" class="btn btn-sm btn-outline-info mb-2">volver</a></center> </th>
			</tr>
			</tr>
		
		
			<tr>
				<th>vendedor</th>
				<th>pedido</th>
				<th>referencia</th>
				<th>color</th>
				<th>Metros Pedidos</th>
				<th>Metros Entregados</th>
				<th>diferencia</th>
				<th>fecha</th>
				<th>estado</th>
				
			</tr>
			</thead>
		<tbody>
		<?php 
		 	
?>
<?php
       $pen="";
        try {
			// 
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
		$statement = $conexion->prepare('SELECT c.vendedor,e.numero_pedido,e.referencia,e.color,e.metros,e.metros_e,e.fecha,e.estado FROM entregas e,clientes c WHERE e.cliente=c.id ORDER BY`vendedor`DESC');
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
		 	# code...
		  $pen= ($row["metros"]-$row["metros_e"]);
		 
			
		 ?>

   <tr>
   	<td><?php echo $row["vendedor"]; ?></td>
   	<td><?php echo $row["numero_pedido"]; ?></td>
   	<td><?php echo $row["referencia"]; ?></td>
   	<td><?php echo $row["color"]; ?></td>
   	<td><?php echo $row["metros"]; ?></td>
   	<td><?php echo $row["metros_e"]; ?></td>
   	<td><?php echo $pen; ?></td>
   	<td><?php echo $row["fecha"]; ?></td>
   	<td><?php echo $row["estado"]; ?></td>
   
   	
   </tr>
   <?php
      
     
    }
   
    ?>

      </tbody>
	</table><br><br>

	<a href="cerrar_admin.php" class="btn btn-outline-info mb-2">Cerrar Sesion</a>
	
	<a  href="consulta_admin.php" class="btn btn-outline-info mb-2">volver</a>
  </center>
  <script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>




