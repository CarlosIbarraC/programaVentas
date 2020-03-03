<?php 
session_start();
if(isset($_SESSION['usuario'])){
	// require'views/contenido_view.php';
}else{
	header('location: login.php');
}
 $fechamin = $_POST["fechamin"];
 $fechamax = $_POST["fechamax"];

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
		<h1 class=" h1 titulo">LISTADO PEDIDOS x FECHA</h1>
		
		
	<table class=" table  table-bordered table-condesed table-striped table-border table-hover table-sm table-responsive">

		<thead>

			<tr>			
				
				<th colspan="8"><center> Pedidos Por Fecha</center></th>
				<th colspan="1"><center> <a href="cerrar_admin.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>					
	            <a  href="consulta_admin.php" class="btn btn-sm btn-outline-info ">volver</a>
	            </center> </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="center"><strong>item </strong> </td>
				<td align="center"> <strong> pedido </strong></td>
				<td align="center"> <strong> id-vendedor </strong></td>
				<td align="center"> <strong> referencia </strong></td>				
                <td align="center"> <strong> color </strong></td>
                <td align="center"> <strong> metros </strong></td>
                <td align="center"> <strong> precio </strong></td>
				<td align="center"> <strong> observaciones </strong></td>
				<td align="center"> <strong> fecha </strong></td>
				
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
       
		$statement = $conexion->prepare("SELECT * FROM pedidos_ventas1 WHERE fecha BETWEEN '$fechamin' AND '$fechamax' ORDER BY`fecha`DESC ");
		$statement->execute();
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row) {
		 	# code...
		$s = $row['metros'] + $s ;
			
		 ?>

   <tr>
   	<td align="center"><?php echo $row["id_pedido"]; ?></td>
   	<td align="center"><?php echo $row["numero_pedido"]; ?></td>
   	<td align="center"><?php echo $row["id"]; ?></td>
   	<td align="center"><?php echo $row["referencia"]; ?></td>
   	<td align="center"><?php echo $row["color"]; ?></td>
   	<td align="center"><?php echo $row["metros"]; ?></td>
   	<td align="center"><?php echo $row["precio"]; ?></td>
   	<td align="center"><?php echo $row["observaciones"]; ?></td>
    <td align="center"><?php echo $row["fecha"]; ?></td>
   <?php
    // $_SESSION['id']= $row['id'];
     }
   
    ?>
      <tr>
    	<td colspan="5" align="center" >total metros</td>
    	<td><?php echo $s ?></td>
    </tr>
      </tbody>
	</table><br>
	<a href="cerrar_admin.php"  class=" btn  btn-sm btn-outline-info ">Cerrar Sesion</a>
	 <a  href="consulta_admin.php" class="btn btn-sm btn-outline-info ">volver</a>
  </center>
</body>
</html>



