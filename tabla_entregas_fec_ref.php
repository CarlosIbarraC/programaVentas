<?php 
session_start();
if(isset($_SESSION['usuario'])){
	// require'views/contenido_view.php';
}else{
	header('location: login.php');
}
$fechamin = $_POST["fechamin"];
$fechamax = $_POST["fechamax"];
$ref = $_POST["referencia"];
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
	
	<div style="text-align:center;">
		<h1 class=" h1 titulo"> ESTADO DE ENTREGAS POR REF.</h1>
		
	<table class=" table table-striped table-border table-hover table-sm table-responsive">

		<thead>

			<tr>
			<th>  </th>				 				
				
				<th colspan="6"><center> Listado de Entregas por ref = <?php echo $ref ?></center></th>
				<th><center> <a href="cerrar.php"  class=" btn  btn-sm btn-outline-info mb-2">Cerrar Sesion</a>	
	<a  href="consulta_admin.php" class="btn btn-sm btn-outline-info mb-2">volver</a></center> </th>
			</tr>
		
		
			<tr>
				
				
				<td>referencia</td>
				<td>color</td>
				<td>Metros Pedidos</td>
				<td>Metros Entregados</td>	
				<td>diferencia</td>			
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
       $totale=0;
      
       
        try {
			// 
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		if ($ref == "todas") {
			$statement = $conexion->prepare("SELECT referencia , color , metros , metros_e , estado FROM entregas WHERE fecha BETWEEN '$fechamin' AND '$fechamax' ORDER BY'fecha' DESC ");
		$statement->execute();
		$resultado = $statement->fetchAll();
		      	}
               else{
			$statement = $conexion->prepare("SELECT referencia , color , metros , metros_e , estado FROM entregas WHERE fecha BETWEEN '$fechamin' AND '$fechamax' ORDER BY'fecha'DESC ");
		        $statement = $conexion->prepare("SELECT * FROM entregas WHERE fecha BETWEEN '$fechamin' AND '$fechamax' AND referencia =:id ORDER BY`fecha`DESC ");
		        $statement->execute(array(':id'=> $ref));
		        $resultado = $statement->fetchAll();
	            }

		foreach ($resultado as $row) {
		$totald=0;
		$totalp=$row["metros"]+$totalp;
		$totale=$row["metros_e"]+$totale;
		$totald=($row["metros"]-$row["metros_e"])

			
		 ?>

   <tr>
   	<td><?php echo $row["referencia"]; ?></td>
   	<td><?php echo $row["color"]; ?></td>   	
   	<td><?php echo $row["metros"]; ?></td>
   	<td><?php echo $row["metros_e"]; ?></td> 
   	<td><?php echo  $totald; ?></td>   
   	<td><?php echo $row["estado"]; ?></td>   	
   </tr>
   <?php
      
     
    }

    ?>
     <tr>
     	<td colspan="1" ></td>
     	<td>TOTALES</td>
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
     echo  $totald=($totalp-$totale);
    ?>
         </td>
      </tr>
      </tbody>
	</table>
</div>
	<a href="cerrar_admin.php" class="btn btn-outline-info btn-sm mb-2">Cerrar Sesion</a>	
	<a  href="consulta_admin.php" class="btn btn-outline-info btn-sm mb-2">volver</a>
 
</body>
</html>




