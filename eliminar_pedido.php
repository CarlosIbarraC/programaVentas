<?php


 $id = $_REQUEST["id_pedido"];
 
 try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$statement = $conexion->prepare("DELETE FROM pedidos_ventas1  WHERE id_pedido ='$id'");
		$statement->execute();
		$statement1 = $conexion->prepare("DELETE FROM entregas  WHERE id_item ='$id'");
		$statement1->execute();

    if($statement){
    	header("location: form_pedidos.php");
    }
    else{
    	echo("Insersion no exitosa");
    }
 ?>