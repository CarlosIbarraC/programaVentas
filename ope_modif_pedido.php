<?php
session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
}


 $ip = $_REQUEST["id_pedido"];

 $referencia = $_POST["referencia"];
 $color = $_POST["color"];
 $metros = $_POST["metros"];
 $precio = $_POST["precio"];
 $observaciones = $_POST["observaciones"];

 
 try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$statement = $conexion->prepare("UPDATE pedidos_ventas1 SET referencia='$referencia',color='$color',metros='$metros',precio='$precio',observaciones='$observaciones' WHERE id_pedido =:id");
		$statement->execute(array(':id' => $ip));
		$resultado = $statement->fetch();

		$statement1 = $conexion->prepare("UPDATE entregas SET referencia='$referencia',color='$color',metros='$metros',precio='$precio' WHERE id_item =:id");
		$statement1->execute(array(':id' => $ip));
		$resultado1 = $statement->fetch();

    if($statement){
    	header("location:form_pedidos.php");
    }
    else{
    	echo("Insersion no exitosa");
    }
 ?>