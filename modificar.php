
		<?php 
        
		session_start();

       if (isset($_SESSION['usuario'])) {
	    
       }
              else{
                header('Location: index.php');
                  }

       $id = $_REQUEST['id'];
		try {
			$conexion = new PDO('mysql:host=50.62.209.223;dbname=pedidos', 'carlos', 'salome1961');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
        $statement = $conexion->prepare('SELECT * FROM clientes WHERE id= :id');
		$statement->execute(array(':id'=> $id));
		$resultado = $statement->fetchAll();
		foreach ($resultado as $row);		
		 ?>
		<?php 

        require 'views/modificar_view.php'

		 ?>