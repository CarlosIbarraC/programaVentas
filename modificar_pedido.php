
	<?php   
       session_start();

        if (isset($_SESSION['usuario'])) {
	     
          }
           else{
                header('Location: index.php');
                  }



       $id = $_REQUEST['id_pedido'];
		
       try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
        $statement = $conexion->prepare('SELECT* FROM pedidos_ventas1 WHERE id_pedido =:id');
		$statement->execute(array(':id'=> $id));
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row);

        require 'views/modificar_pedido_view.php'
			
		 ?>
		
		