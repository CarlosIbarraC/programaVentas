<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos_cli.css">
	 <link rel="stylesheet" href="css/bootstrap.min.css">

<body>
	<div class="logoc">
			<h6>Ibarra&desarrollos...	
				FORMULARIO ENTREGAS <a class="btn btn-warning mx-5 btn-sm " href="cerrar.php">Cerrar Sesion</a></h6>
			
			</div>
<?php
session_start(); 
        
        $id = $_SESSION['pedido'];
            	
    try {
    	$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
			// $conexion = new PDO('mysql:host=localhost;dbname=pedidos', 'root', '');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

       
        

		 $statement = $conexion->prepare('SELECT* FROM entregas WHERE numero_pedido =:id');
		$statement->execute(array(':id'=> $id));
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row);
           $cliente=$row['cliente'];
          

         $statement1 = $conexion->prepare('SELECT* FROM clientes WHERE id =:id1');
		$statement1->execute(array(':id1'=>$cliente));
		$resultado1 = $statement1->fetchAll();
		foreach ($resultado1 as $row1){
           

         

 ?>
	<center>
<table class=" table table-striped table-border table-hover table-sm table-responsive">
	<tbody>
		<tr>
			
		
			<td bgcolor="#DEEAEE" colspan="1">Cliente :<h6><?php echo $row1['nombre']; ?></h6></td>
			<td bgcolor="#deeaee" colspan="2">Direccion :<h6><?php echo $row1['direccion']; ?></h6>				
			</td>
		
			<td bgcolor="#deeaee" colspan="2">Vendedor : <h6><?php echo $row1['vendedor']; ?></h6></td>
			<td bgcolor="#deeaee" >Telefono : <h6><?php echo $row1['telefono']; ?></h6></td>
			<td  bgcolor="#deeaee" >Ciudad : <h6><?php echo $row1['ciudad']; ?></h6></td>
			<td bgcolor="#deeaee" >Pedido:<center><h5 style="color:Tomato;"><?php echo $row['numero_pedido']; ?></h5></center></td>
			
		</tr>
         <?php 
     }
        $statement1 = $conexion->prepare('SELECT* FROM entregas WHERE numero_pedido =:id1');
		$statement1->execute(array(':id1'=>$id));
		$resultado1 = $statement1->fetchAll();
		foreach ($resultado1 as $row){

			require 'views/entrega_view.php';         
		}	           
             ?>   
		
               </form>
	</tbody>
</table>
	</center>
	
</body>