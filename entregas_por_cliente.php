<?php 
session_start();
if(isset($_SESSION['usuario'])){
	// require'views/contenido_view.php';
}else{
	header('location: login.php');
}
$cliente = $_POST["cliente"];
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
			<tr>	<center>			
				<th colspan="9"> PEDIDOS de <?php echo $cliente ?></th>
				    </center>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>pedido n°</td>
				
				<td>vendedor</td>
				<td>referencia</td>
				<td>color</td>
                <td>metros ped</td>
                <td>metros ent</td>
                <td>por entregar</td>
				<td>estado</td>
				<td>fecha</td>
				
			</tr>
		
		
<?php
       
       
       
       try {
			 $conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
		$statement = $conexion->prepare("SELECT c.vendedor,e.numero_pedido, e.referencia,e.color,e.metros,e.metros_e,e.fecha,e.estado FROM clientes c,entregas e WHERE c.id=e.cliente AND  c.nombre= '$cliente' ORDER BY `e`.`fecha` ASC ");
		$statement->execute();
		$resultado = $statement->fetchAll();?>


		<?php
		foreach ($resultado as $row) {
		 	# code...
		$s = $row['metros'] + $s ;
		$y = $row['metros_e'] + $y ;
			
		 ?>

   <tr>
   	<td><?php echo $row["numero_pedido"]; ?></td>
   
   	<td><?php echo $row["vendedor"]; ?></td>
   	<td><?php echo $row["referencia"]; ?></td>
   	<td><?php echo $row["color"]; ?></td>
   	<td><?php echo $row["metros"]; ?></td>
   	<td><?php echo $row["metros_e"]; ?></td>
   	<td><?php echo ( $row["metros"]-$row["metros_e"]); ?></td>
   	<td><?php echo $row["estado"]; ?></td>
    <td><?php echo $row["fecha"]; ?></td>
   <?php
    // $_SESSION['id']= $row['id'];
     }
   
    ?>
     <tr>
    	<td colspan="4"  >total metros</td>
    	<td><?php echo $s ?></td>
    	<td><?php echo $y ?></td>
    </tr>

      </tbody>
	</table><br><br>
	<a href="cerrar.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>
	<a  href="consulta_admin.php" class="btn btn-sm btn-outline-info ">volver</a>
  </center>
</body>
</html>



