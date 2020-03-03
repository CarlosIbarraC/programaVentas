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
		<h1 class=" h1 titulo">LISTADO DE  CLIENTES INSCRITOS</h1>
		
	<table class=" table  table-bordered table-condesed table-striped table-border table-hover table-sm table-responsive">

		<thead>

			<tr>				 				
				<th  colspan="2"><center><a href="formulario_clientes_admin.php" class="btn btn-outline-info btn-sm"><i class="fas fa-coffee"></i> Inscribir Nuevo Cliente </a></center></th>
				<th colspan="3"><center> lista de clientes</center></th>
				<th colspan="4"><center> <a href="cerrar.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>					
	            <a  href="consulta_admin.php" class="btn btn-sm btn-outline-info ">volver</a>
	            </center> </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<strong>
				<td align="center"> <strong>vendedor </strong></td>
				<td align="center"> <strong>cliente </strong></td>
				<td align="center"> <strong>nit </strong></td>
				<td align="center"> <strong>direccion </strong></td>
				<td align="center"> <strong>ciudad </strong></td>
				<td align="center"> <strong>telefono </strong></td>
				<td align="center"> <strong>observaciones </strong></td>
				<td colspan="3" ><center> <strong>edicion </strong></center></td>
			</strong>
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
       
		$statement = $conexion->prepare('SELECT * FROM clientes order by vendedor');
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
		 	# code...
		
			
		 ?>
 
   <tr>
   	<td align="center"><?php echo $row["vendedor"]; ?></td>
   	<td align="center"><?php echo $row["nombre"]; ?></td>
   	<td align="center"><?php echo $row["nit"]; ?></td>
   	<td align="center"><?php echo $row["direccion"]; ?></td>
   	<td align="center"><?php echo $row["ciudad"]; ?></td>
   	<td align="center"><?php echo $row["telefono"]; ?></td>
   	<td align="center"><?php echo $row["observaciones"]; ?></td>
   	<td align="center"><a href="modificar.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i> editar</a></td>
   	<td align="center"><a href="alertacli.php?id=<?php echo $row['id']; ?>"><i class="fa fa-user-times" aria-hidden="true"></i> eliminar</a></td>   	
   	<td align="center"><a href="trans_pedido.php?id=<?php echo $row['id'];?>"><i class="fas fa-file-alt"></i>..<i class="far fa-handshake"></i> pedido</a></td>
   </tr>
   <?php
    $_SESSION['id']= $row['id'];
    
     }
   
    ?>

      </tbody>
	</table>
	<br><br>
	<a class="btn btn-outline-info btn-sm mb-2" href="cerrar.php">Cerrar Sesion</a>
	<a class="btn btn-outline-info btn-sm mb-2" href="consulta_admin.php">volver</a>
  </center>
</body>
</html>



