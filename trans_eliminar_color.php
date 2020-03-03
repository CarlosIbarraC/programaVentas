 <?php
session_start();

 $id = $_SESSION['id'];
 

     

try {
	
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		 if ($id == 'todas') {
      	$statement = $conexion->prepare("DELETE FROM fotos");
		$statement->execute();
      }

		$statement = $conexion->prepare("DELETE FROM fotos  WHERE titulo = '$id' ");
		$statement->execute();

	

    if($statement){
    	header("location: consulta_admin.php");
    }
    else{
    	echo("operacion no exitosa");
    }
 // ?>