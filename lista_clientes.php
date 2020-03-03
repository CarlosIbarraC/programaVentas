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
		<h1 class="titulo">LISTADO DE USUARIOS</h1>
		
	<table bgcolor=" #d5f4e6" border="#d5f4e6">

		<thead>

			<tr>				 				
				
				<th colspan="6"> lista de clientes</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>vendedor</td>
				<td>cliente</td>				
				<td>ciudad</td>
				<td>telefono</td>
				<td>control</td>
				<td>documento</td>
				
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
       
		$statement = $conexion->prepare("SELECT  `vendedor`, `nombre`, `direccion`, `ciudad`, `telefono` FROM `clientes` WHERE 1 ");
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
		 	# code...
		
			
		 ?>

   <tr>
   	<td><?php echo $row["vendedor"]; ?></td>
   	<td><?php echo $row["nombre"]; ?></td>
   	<td><?php echo $row["ciudad"]; ?></td>
   	<td><?php echo $row["telefono"]; ?></td>
   	
   
   	<td><a href="consulta_admin.php"><i class="fa fa-external-link-square" aria-hidden="true"></i> volver</a></td>
   	<td><a href="consulta_ped_cliente.php?id=<?php echo $row['nombre'];?>"><i class="fa fa-folder" aria-hidden="true"></i> pedidos</a></td>
   </tr>
   <?php
    $_SESSION['id']= $row['id'];
    $_SESSION['usuario']=$row['nombre'];    
     
    }
   
    ?>

      </tbody>
	</table><br><br>
	<a class="cerrar"   href="cerrar.php">Cerrar Sesion</a>
	<br><br>
	<a class="cerrar"   href="consulta_admin.php">volver</a>
  </center>
</body>
</html>




