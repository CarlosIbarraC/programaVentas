<?php 
session_start();
if(isset($_SESSION['usuario'])){
	// require'views/contenido_view.php';
}else{
	header('location: login.php');
}
$vend = $_POST['estado'];
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
		<h1 class=" h1 titulo">LISTADO DEL ESTADO DE ENTREGAS</h1>
		
	<table class=" table table-striped table-border table-hover table-sm table-responsive">

		<thead>

			<tr>
			<th>  </th>				 				
				
				<th colspan="6"><center> Listado de Entregas <?php echo $vend ?></center></th>
				<th><center> <a href="cerrar_admin.php"  class=" btn  btn-sm btn-outline-info mb-2">Cerrar Sesion</a>	
	<a  href="consulta_admin.php" class="btn btn-sm btn-outline-info mb-2">volver</a></center> </th>
			</tr>
		
		
			<tr>
				<td>cliente</td>
				<td>pedido</td>
				<td>referencia</td>
				<td>color</td>
				<td>Metros Pedidos</td>
				<td>Metros Entregados</td>
				<td>fecha</td>
				<td>estado</td>
				
			</tr>
		</thead>
		<tbody>
		<?php 
		 	
?>
<?php
       
       $totalp=0;
       $totalm=0;
       $totald=0;
       $xx="diferencia  ";
       
        try {
			// 
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
		$statement = $conexion->prepare('SELECT c.nombre,e.numero_pedido,e.referencia,e.color,e.metros,e.metros_e,e.fecha,e.estado FROM entregas e,clientes c WHERE e.cliente=c.id and e.estado= :id');
		$statement->execute(array(':id'=> $vend));
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
		 	# code...
		$totalp=$row["metros"]+$totalp;
		$totale=$row["metros_e"]+$totale;

			
		 ?>

   <tr>
   	<td><?php echo $row["nombre"]; ?></td>
   	<td><?php echo $row["numero_pedido"]; ?></td>
   	<td><?php echo $row["referencia"]; ?></td>
   	<td><?php echo $row["color"]; ?></td>
   	<td><?php echo $row["metros"]; ?></td>
   	<td><?php echo $row["metros_e"]; ?></td>
   	<td><?php echo $row["fecha"]; ?></td>
   	<td><?php echo $row["estado"]; ?></td>   	
   </tr>
   <?php
      
     
    }
    ?>
     <tr>
     	<td colspan="4" ></td>
     	<td >
    <?php
     echo $totalp; 
    ?>
         </td>
     	<td>
    <?php
     echo $totale;
    ?>
         </td>
     	<td>
    <?php
     echo $xx ; echo  $totald=($totalp-$totale);
    ?>
         </td>
      </tr>
      </tbody>
	</table>
	<a href="cerrar_admin.php" class="btn btn-outline-info btn-sm mb-2">Cerrar Sesion</a>	
	<a  href="consulta_admin.php" class="btn btn-outline-info btn-sm mb-2">volver</a>
  </center>
</body>
</html>




