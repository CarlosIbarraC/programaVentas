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
		<h1 class=" h1 titulo">LISTADO DE USUARIOS</h1>
		
	<table class=" table  table-bordered table-condesed table-striped table-border table-hover table-sm table-responsive">

		<thead>

			<tr>				 				
				
				<th colspan="3"><center> lista de usuarios con acceso a pedidos</center></th>
				<th colspan="1"><center> <a href="cerrar_admin.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>					
	            <a  href="consulta_admin.php" class="btn btn-sm btn-outline-info ">volver</a>
	            </center> </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="center">id</td>
				<td align="center">nombre</td>
				<td align="center">control</td>
				<td align="center">documento</td>
				
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
       
		$statement = $conexion->prepare('SELECT * FROM usuarios ');
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
		 	# code...
		
			
		 ?>

   <tr>
   	<td align="center"><?php echo $row["id"]; ?></td>
   	<td align="center"><?php echo $row["vendedor"]; ?></td>
   
   	<td align="center"><a href="consulta_admin.php?id=<?php echo $row['id'];?>"><i class="fas fa-reply"></i> volver</a></td>
   	<td align="center"><a href="consulta_ped_vend.php?id=<?php echo $row['vendedor'];?>"><i class="fa fa-folder" aria-hidden="true"></i> pedidos</a></td>
   </tr>
   <?php
    $_SESSION['id']= $row['id'];
    $_SESSION['usuario']=$row['id'];    
     
    }
   
    ?>

      </tbody>
	</table><br><br>
	<a href="cerrar_admin.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>					
	<a  href="consulta_admin.php" class="btn btn-sm btn-outline-info ">volver</a>
  </center>
</body>
</html>




