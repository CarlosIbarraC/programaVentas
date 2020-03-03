<?php session_start();

if (isset($_SESSION['usuario'])) {
	
}
else{
                header('Location: index.php');
                  }

    $pedido = $_POST['numero_pedido'] ;            

    

    print_r($pedido);

    if (isset($pedido)) {
	

     
         try {
         	$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
			// $conexion = new PDO('mysql:host=localhost;dbname=pedidos', 'root', '');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT numero_pedido FROM entregas WHERE numero_pedido = :usuario');
	$statement->execute(array(
		':usuario' => $pedido
	));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['pedido'] = $pedido;
		echo $pedido;
		header("Location: tabla_prueba.php");
	} else {
		 header('Location: consulta_admin.php');
	}
    }
	else {
         header('Location: consulta_admin.php');
     }

    // if ($pedido == "") {
    // 	header('location: consulta_admin.php');
    // }

    // header('Location: tabla_prueba.php');
                  