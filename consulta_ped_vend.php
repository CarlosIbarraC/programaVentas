
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
				
				
				<th colspan="8"><center> Pedidos Por Cliente</center></th>
				<th colspan="1"><center> <a href="cerrar_admin.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>					
	            <a  href="consulta_admin.php" class="btn btn-sm btn-outline-info ">volver</a>
	            </center> </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="center">cliente</td>
				<td align="center">vendedor</td>
				<td align="center">pedido N</td>
				<td align="center">referencia</td>
				<td align="center">metros</td>
                <td align="center">color</td>
                <td align="center">precio</td>
				<td align="center">observaciones</td>
				<td align="center">fecha</td>
				
			</tr>
		
		<?php 
		 	
?>
<?php
       $id = $_REQUEST['id'];
       
       try {
			 $conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
		$statement = $conexion->prepare("SELECT c.nombre,c.vendedor,v.numero_pedido, v.referencia, v.metros,v.color,v.precio ,v.observaciones , v.fecha FROM clientes c,pedidos_ventas1 v WHERE c.id=v.id AND c.vendedor= '$id' ORDER BY `v`.`numero_pedido` DESC ");
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
		 	# code...
		
			$s = $row["metros"] + $s ;
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
    	<td><center><?php echo $s ?></center></td>
    </tr>
      </tbody>
	</table>
	<a href="cerrar_admin.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>
	<a  href="consulta_admin.php" class="btn btn-sm btn-outline-info ">volver</a>

  </center>
</body>
</html>



