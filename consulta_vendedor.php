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
	 <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<title>tabla</title>
</head>
<body>
	<div class="logoc">
			<h3>Ibarra&desarrollos</h3>			
			</div>	
	
	<center>
		<h1 class=" h1 titulo">LISTADO PEDIDOS</h1>
		
	<table class=" table  table-bordered table-condesed table-striped table-border table-hover table-sm table-responsive">
		<thead>

			<tr>				 				
				<th colspan="7"><center> Pedidos por cliente de <?php echo($_SESSION['usuario']) ?></center></th>
				<th colspan="2"><center> <a href="cerrar_admin.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>					
	            <a  href="tabla_clientes.php" class="btn btn-sm btn-outline-info ">volver</a>
	            </center> </th>
				
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="center"><strong>cliente</strong></td>
				<td align="center"><strong>vendedor</strong></td>
				<td align="center"><strong>pedido N°</strong></td>
				<td align="center"><strong>referencia</strong></td>
				<td align="center"><strong>metros</strong></td>
                <td align="center"><strong>color</strong></td>
                <td align="center"><strong>precio</strong></td>
				<td align="center"><strong>observaciones</strong></td>
				<td align="center"><strong>fecha</strong></td>
				
			</tr>
		
		<?php 
		 	
?>
<?php
       $vend = $_SESSION['usuario'];
       
       try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
		$statement = $conexion->prepare("SELECT c.nombre,c.vendedor,v.numero_pedido, v.referencia, v.metros,v.color,v.precio ,v.observaciones , v.fecha FROM clientes c,pedidos_ventas1 v WHERE c.id=v.id AND c.vendedor = '$vend' ORDER BY v. numero_pedido DESC ");
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
		 	# code...
		$s = $row['metros'] + $s ;
			
		 ?>

   <tr>
   	<td align="center"><?php echo $row["nombre"]; ?></td>
   	<td align="center"><?php echo $row["vendedor"]; ?></td>
   	<td align="center"><?php echo $row["numero_pedido"]; ?></td>
   	<td align="center"><?php echo $row["referencia"]; ?></td>
   	<td align="center"><?php echo $row["metros"]; ?></td>
   	<td align="center"><?php echo $row["color"]; ?></td>
   	<td align="center"><?php echo $row["precio"]; ?></td>
   	<td align="center"><?php echo $row["observaciones"]; ?></td>
    <td align="center"><?php echo $row["fecha"]; ?></td>
   <?php
    // $_SESSION['id']= $row['id'];
     }
   
    ?>
     <tr>
    	<td colspan="4"  >total metros</td>
    	<td><?php echo $s ?></td>
    </tr>

      </tbody>
	</table><br>
	 <a  href="cerrar.php" class="btn btn-sm btn-outline-info ">Cerrar</a>
	  <a  href="tabla_clientes.php" class="btn btn-sm btn-outline-info ">volver</a>
	
  </center>
</body>
</html>



