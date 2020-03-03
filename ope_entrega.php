<?php
session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
}


 $ip = $_POST["id_item"];
 $referencia = $_POST["referencia"];
 $color = $_POST["color"];
 $entrega = "";
 $precio = $_POST["precio"]; 
 $observaciones = $_POST["observaciones"];
 $estado = $_POST["estado"];
 $mt_entregado = ( $_POST["entrega"]+$_POST["metros_e"]);

 
 try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
 	    // $conexion = new PDO('mysql:host=localhost;dbname=pedidos', 'root', '');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$statement = $conexion->prepare("UPDATE entregas SET referencia='$referencia',color='$color',metros_e='$mt_entregado',entrega='$entrega',precio='$precio',observaciones='$observaciones',estado='$estado' WHERE id_item =:id");
		$statement->execute(array(':id' => $ip));
		$resultado = $statement->fetchAll();

		

    if($statement){

    	header("location:tabla_prueba.php");
    }
    else{
    	echo("Insersion no exitosa");
    }
 ?>