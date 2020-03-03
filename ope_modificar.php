<?php
session_start();

       if (isset($_SESSION['usuario'])) {
	    
       }
              else{
                header('Location: index.php');
                  }

 $id = $_REQUEST["id"];
 $nombre = $_POST["nombre"];
 $direccion = $_POST["direccion"];
 $ciudad = $_POST["ciudad"];
 $telefono = $_POST["telefono"];
 $observaciones = $_POST["observaciones"];

 ;
    try {
    	$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
			// $conexion = new PDO('mysql:host=localhost;dbname=pedidos', 'root', '');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$statement = $conexion->prepare("UPDATE clientes SET nombre='$nombre',direccion='$direccion',ciudad='$ciudad',telefono='$telefono',observaciones='$observaciones' WHERE id = :id ");
		$statement->execute(array(':id' => $id));
		$resultado = $statement->fetch();

    if($statement){
    	header("location: tabla_clientes_admin.php");
    }
    else{
    	echo("Insersion no exitosa");
    }
 ?>