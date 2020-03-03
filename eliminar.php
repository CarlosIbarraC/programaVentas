<?php
session_start();

       if (isset($_SESSION['usuario'])) {
	    
       }
              else{
                header('Location: index.php');
                  }

 $id = $_SESSION["clie"];
 
try {
	
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$statement = $conexion->prepare("DELETE FROM clientes  WHERE id = '$id' ");
		$statement->execute();

	

    if($statement){
    	header("location: tabla_clientes_admin.php");
    }
    else{
    	echo("Insersion no exitosa");
    }
 // ?>