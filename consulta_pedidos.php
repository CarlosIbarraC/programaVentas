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
	<title>tabla</title>
</head>
<body>
	
	<center>
		<h1 class="titulo">LISTADO PEDIDOS</h1>
		
	<table bgcolor=" #d5f4e6" border="#d5f4e6">

		<thead>

			<tr>				 				
				
				<th colspan="9"> PEDIDOS POR CLIENTE</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>cliente</td>
				<td>vendedor</td>
				<td>pedido N</td>
				<td>referencia</td>
				<td>metros</td>
                <td>color</td>
                <td>precio</td>
				<td>observaciones</td>
				<td>fecha</td>
				
			</tr>
		
		<?php 
		 	
?>
<?php
       $id = $_REQUEST['id'];
       echo $id;
       try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
		$statement = $conexion->prepare("SELECT c.nombre,c.vendedor,v.numero_pedido, v.referencia, v.metros,v.color,v.precio ,v.observaciones , v.fecha FROM clientes c,pedidos_ventas1 v WHERE c.id=v.id AND c.vendedor= '$id' ORDER BY `c`.`nombre` ASC ");
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
		 	# code...
		
			
		 ?>

   <tr>
   	<td><?php echo $row["nombre"]; ?></td>
   	<td><?php echo $row["vendedor"]; ?></td>
   	<td><?php echo $row["numero_pedido"]; ?></td>
   	<td><?php echo $row["referencia"]; ?></td>
   	<td><?php echo $row["metros"]; ?></td>
   	<td><?php echo $row["color"]; ?></td>
   	<td><?php echo $row["precio"]; ?></td>
   	<td><?php echo $row["observaciones"]; ?></td>
    <td><?php echo $row["fecha"]; ?></td>
   <?php
    // $_SESSION['id']= $row['id'];
     }
   
    ?>

      </tbody>
	</table>
	<a href="cerrar.php">Cerrar Sesion</a>
  </center>
</body>
</html>



