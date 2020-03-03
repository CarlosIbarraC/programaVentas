<!DOCTYPE html>
<html>
<head>
	<title>tabla</title>
</head>
<body>
	<center>
	<table bgcolor="#fff" border="#000">
		<thead>
			<tr>
				
				<th colspan="8"> lista pedido</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>id</td>
				<td>cliente</td>
				<td>referencia</td>
				<td>color</td>
				<td>metros</td>
				<td>precio</td>
				<td>observaciones</td>
				<td colspan="3" ><center>edicion</center></td>
			</tr>
		
		<?php 
		session_start();
		

		include "conexion.php";
	     $id =   $_SESSION["cliente"] ;     
           
       try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
       
		$statement = $conexion->prepare('SELECT * FROM pedidos_ventas1 WHERE id=:id');
		$statement->execute(array(':id'=> $id));
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row)
		
	     
		// $datos = "SELECT * FROM pedidos_ventas1 WHERE id=$id";
		// $resultado = $conexion->query($datos);
		// while ($row = $resultado ->fetch_assoc()) {
			# code...
	     {		 ?>

   <tr>
   	
   	<td><?php echo $row["id_pedido"]; ?></td>
   	<td><?php echo $row["id"]; ?></td>
   	<td><?php echo $row["referencia"]; ?></td>
   	<td><?php echo $row["color"]; ?></td>
   	<td><?php echo $row["metros"]; ?></td>
   	<td><?php echo $row["precio"]; ?></td>
   	<td><?php echo $row["observaciones"]; ?></td>
   	<td><a href="modificar_pedido.php?id_pedido=<?php echo$row['id_pedido'];?>">Modificar</a></td>
   	<td><a href="eliminar_pedido.php?id_pedido=<?php echo $row['id_pedido'];?>">Eliminar</a></td>
   	 <th colspan="1"><a href="form_pedidos.php?id=<?php echo $row['id'];?>">Nuevo</a></th>
   </tr>
   <?php
     }
       ?>
     <a href="form_pedidos.php?id=<?php echo $row['id']; ?>">Nuevo</a>
  

      </tbody>
	</table>
  </center>
</body>
</html>